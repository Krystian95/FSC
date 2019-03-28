<?php

/**
 * Description of Environment
 *
 * @author Cristian
 */
class System {

    public static $n_meat = 5;
    public static $n_veg = 10;
    public static $current_month;
    public static $step = 0;
    private $environment;
    private $product_collection;
    private $person_collection;

    public function __construct($params) {

        $this->environment = new Environment($params);
        $this->product_collection = new ProductCollection($params);
        $this->person_collection = new PersonCollection($params, $this->product_collection);
    }

    private function getCharts() {

        $return = [];

        // Popolazione
        //error_log($this->person_collection->getCountPeople());
        $return['Charts']['Popolazione']['Popolazione'] = $this->person_collection->getCountPeople();

        $return['Charts']['Nati e morti']['Nati'] = $this->person_collection->getCountNati();
        $return['Charts']['Nati e morti']['Morti'] = $this->person_collection->getCountMorti();

        $return['Charts']['Salute media']['Salute media'] = $this->person_collection->getMeanHealth();

        // Prodotti
        foreach ($this->product_collection->getProducts() as $product) {

            $product_name = $product->get_name();
            /* $return['Charts']['Capacità produttiva'][$product_name] = $product->get_capacity(1);
              $return['Charts']['Produzione'][$product_name] = $product->get_production(1);
              $return['Charts']['Vendita'][$product_name] = $product->get_sold(1); */
            /*
             * TODO Grafico a barre mese per mese per ogni prodotto: capacità, produzione, venduto (tipo istogramma dove ogni barra è divisa per tre)
             */
        }

        // Ambiente
        $return['Charts']['Temperatura']['Temperatura'] = $this->environment->get_temperature(1);

        $return['Charts']['Agenti atmosferici']['GHGS'] = $this->environment->get_GHGS(1);
        $return['Charts']['Agenti atmosferici']['PM'] = $this->environment->get_PM(1);
        $return['Charts']['Agenti atmosferici']['NH3'] = $this->environment->get_NH3(1);

        /*
         * TODO Tipologie di cibo in relazione alla ricchezza
         */

        return $return;
    }

    /*
     * Compute the period passed (eg. "05/2019").
     * Returns the next period.
     */

    public function iteratePeriod($period) {

        //error_log('START iteratePeriod(' . $period . ')');

        $this->setCurrentMonth($period);
        $this->person_collection->setCountMorti(0);
        $this->person_collection->setCountNati(0);

        /*
         * step_productions
         */
        $this->product_collection->step_productions($this->environment);

        /*
         * impact_from_product
         */
        $products = $this->product_collection->getProducts();
        $this->environment->impact_from_products($products);

        /*
         * temperature_evaluation
         */
        $this->environment->temperature_evaluation();

        /*
         * Buy & Sell
         */

        $this->buyAndSell();

        /*
         * health_evaluate
         */
        //error_log(count($this->person_collection->getPersons()));
        $this->person_collection->grow_pops($this->product_collection);
        //error_log(count($this->person_collection->getPersons()));

        /*
         * growth_evaluate
         */
        $this->product_collection->growth_evaluations();

        self::$step++;

        $return = [];

        /*
         * Charts
         */

        $return = $this->getCharts();

        /*
         * Terminal operations of the cicle
         */
        $this->product_collection->endIteration();
        $this->person_collection->endIteration();
        $this->environment->endIteration();

        /*
         * Extra
         */
        $next_period = $this->calculateNextPeriod($current_period = $period);
        $return['Next_Period'] = $next_period;

        //error_log('END iteratePeriod(' . $period . ')');

        return $return;
    }

    public function getInitialValues($period) {

        $return = [];

        /*
         * Charts
         */
        $return = $this->getCharts();

        /*
         * Terminal operations of the cicle
         */
        $this->product_collection->endIteration();
        $this->person_collection->endIteration();
        $this->environment->endIteration();

        /*
         * Extra
         */
        $next_period = $this->calculateNextPeriod($current_period = $period);
        $return['Next_Period'] = $next_period;

        return $return;
    }

    private function buyAndSell() {

        $persons_indexes = array_keys($this->person_collection->getPersons());
        $products_indexes = array_keys($this->product_collection->getProducts());

        //error_log('Count $persons_indexes = ' . count($persons_indexes));
        ////!!!andrebbe aggiunto un commento al momento dell'acquisto 
        ////   che stampi tutti i parametri coinvolti (quelli interni di prod e pop)
        ////***sarebbe da controllare se le preferenze vengono generate come dovrebbero:
        ////   ovverosia: preferenze(j) di ogni persona sono comprese tra 0 ed 1 e strettamente crescenti
        ////   quindi: preferenza(0) >0 ; preferenza(j)<preferenza(j+1); preferenza(N_meat+N-veg - 1) =1

        /* A) considerazioni:
         * 1) while e for hanno le stesse condizioni, se si blocca l dentro significa che 
         * non si raggiunge la condizione in cui nessuno dei due array (persone e prodotti) raggiunge per tutti i suoi elementi la condizione di unset
         * 2) basta che uno dei due _indexes sia vuoto per far finire il ciclo, e che durante il ciclo
         * i parametri interni degli oggetti DOVREBBERO AUMENTARE MONOTONAMENTE fino a che non raggiungono la condizione di unset
         * 
         * B) aggiungendo il commento per i parametri interni degli oggetti al momento dell'acquisto, si dovrebbe osservare che: 
         * 1) tutti i valori sono >0
         * 2) tutti i valori sono < del valore max che possono raggiungere: 
         *    person.speso < person.wealth; person.eaten < person. fabbisogno; product.sold < product.production
         * 3) l'unico momento in cui la (2) non  vera  quando una persona o prodotto ha raggiunto uno dei "limiti di unset"
         *    quindi i casi in cui la (2) non si verifica dovrebbero esser seguiti da "rimosso prodotto tot" o "rimossa persona tot"
         *    e dopo di quello quella persona o quel prodotto non dovrebbero pi comparire nel commento
         *
         * C) secondo me gli errori possibili sono:                
         * 1) il ciclo  eccessivamente lento a fare quel che deve, il che eventualmente significa
         *   un valore troppo alto tra fabbisogno, wealth, produzione dell'industria
         *   un valore troppo basso di cibo acquistato (val), e prezzi
         *   con !!! e (B) si dovbrebbe poter vedere che quando il programma si arresta stava tuttavia facendo cose sensate
         * 2) ci sono casini strani nei parametri interni di persone e/o prodotti, tali per cui non si raggiungono le condizioni di unset
         *   ma in tal caso aggiungendo quel commento al momento dell'acquisto (B) si dovrebbe capire dove sta l'errore
         * 3) le preferenze vengono generate in maniera strana, per cui se non  (1) o (2) conviene *** 
         *   tecnicamente l'algoritmo dovrebbe funzionare anche con preferenze a casaccio, 
         *   perch il while(!in_array (...) ) funziona sul solo indice a prescindere dalle preferenze e quindi qualcosa becca sicuro
         *   tuttavia potrebbe darsi che delle preferenze costruite male rallentino la funzione o chi sa che diavolo    
         * 4) cose di sintassi/codice di cui non ho la minima idea, ad esempio il funzionamento di count, unset, assegnamenti, boh
         *   o comunque qualche stranezza nelle condizioni dei cicli che tuttavia non mi sembra di notare
         * 5) mi sta sfuggendo qualcosa di palesissimo e bah
         *
         *
         */
        while (count($persons_indexes) > 0 && count($products_indexes) > 0) {
            /* error_log('');
              error_log('');
              error_log('New while cicle');
              error_log('$persons_indexes = ' . count($persons_indexes)); */

            /////aggiungerei un commento qui per capire quante volte il ciclo for riparte da capo
            /////nb il ciclo for riparte da capo significa: "tutti hanno comprato un prodotto, ora chi  rimasto compra quel che  rimasto"
            //for ($i = 0; $i < $persons_indexes_size && count($products_indexes) > 0; $i++) {
            foreach ($persons_indexes as $i) {
                if (count($products_indexes) == 0) {
                    break;
                }

                /* error_log('$persons_indexes = ' . count($persons_indexes));
                  error_log('$products_indexes = ' . count($products_indexes));
                  error_log('New for cicle i = ' . $i); */
                $person = $this->person_collection->getPerson($i);
                $rnd = Utils::rand(0, 1);

                $j = 0;

                //error_log('ENTER while');
                while ($rnd > $person->get_preferenza($j)) {
                    //error_log('Rand (' . $rnd . ') > Preferenza j=' . $j . ' (' . $person->get_preferenza($j) . ')');
                    if ($j == (self::$n_meat + self::$n_veg - 1)) {
                        //commento: qui tecnicamente non dovrebbe arrivarci perch nel caso limite rnd=1=preferenza(n_meat+n_veg - 1)
                        //break;
                        /////questo nel caso in cui le preferenze siano state generate bene *** questo if break non serve 
                        /////ed in caso contrario significa che preferenza(n_meat+n_veg - 1) < 1, cosa che non dovrebbe essere
                    } else {
                        $j++;
                    }
                }
                //error_log('EXIT while');

                /*
                 * Recupera un prodotto in caso j non sia pi disponibile
                 */
                $t = $j;
                while (!in_array($j, $products_indexes)) {
                    if ($j == 0) {
                        $j = $t;
                        while (!in_array($j, $products_indexes)) {
                            if ($j == (self::$n_meat + self::$n_veg - 1)) {
                                break;
                                //commento: qui ci arriva solo se l'ultimo cibo rimasto  quello pi costoso
                                //Il che  plausibile ma se finisce sistematicamente qui forse c' qualcosa di strano
                            } else {
                                $j++;
                            }
                        }
                    } else {
                        $j--;
                    }
                }

                $product = $this->product_collection->getProduct($j);

                $val = 1;  //questo val  una costante  pu esser tranquillamente messa prima dell'inizio del ciclo
                ///NB: qui get_eaten legge lo stesso indirizzo di memoria che set eaten va a scrivere
                ///non ne so molto ma potrebbe causare conflitti nella memorizzazione ????
                $person->set_eaten($person->get_eaten(1) + $val, 1);
                $product->set_sold($product->get_sold(1) + $val, 1);
                $person->set_speso($person->get_speso() + $product->get_price() * $val);
                /* error_log('persona i=' . $i . ' speso(' . $person->get_speso() . '), wealth (' . $person->get_wealth() . '), eaten (' . $person->get_eaten(1) . '), fabbisogno (' . $person->get_food_need() . ')');
                  error_log('ha comprato val (' . $val . ') del prodotto j=' . $j . '(nome: ' . $product->get_name() . ', venduto ' . $product->get_sold(1) . ', production ' . $product->get_production(1) . ')'); */
                if ($person->get_eaten(1) >= $person->get_food_need() || $person->get_speso() >= $person->get_wealth()) {
                    //error_log('Removed Person i = ' . $i);
                    unset($persons_indexes[$i]);
                }
                if ($product->get_sold(1) >= $product->get_production(1)) {
                    //error_log('Removed Product j = ' . $j);
                    unset($products_indexes[$j]);
                }
            }
        }
    }

    private function setCurrentMonth($current_period) {

        $explode = explode('/', $current_period);
        $period_current['month'] = (int) $explode[0];
        $period_current['year'] = (int) $explode[1];

        self::$current_month = $period_current['month'];
    }

    /*
     * Return the next period providing the current.
     * Eg. $current_period = "12/2019" will return $next_period = "01/2020"
     */

    private function calculateNextPeriod($current_period) {

        $explode = explode('/', $current_period);
        $period_current['month'] = (int) $explode[0];
        $period_current['year'] = (int) $explode[1];

        if ($period_current['month'] == 12) {
            $period_next['month'] = '01';
            $period_next['year'] = $period_current['year'] + 1;
        } else {
            $period_next['month'] = $period_current['month'] + 1;
            if ($period_next['month'] < 10) {
                $period_next['month'] = '0' . $period_next['month'];
            }
            $period_next['year'] = $period_current['year'];
        }

        return $period_next['month'] . '/' . $period_next['year'];
    }

}
