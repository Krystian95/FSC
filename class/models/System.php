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

    /*
     * Compute the period passed (eg. "05/2019").
     * Returns the next period.
     */

    public function iteratePeriod($period) {

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

        /*
         * Charts
         */

        // Popolazione
        $return['Charts']['Popolazione']['Popolazione Totale'] = $this->person_collection->getCountPeople();

        $return['Charts']['Nati e morti']['Nati'] = $this->person_collection->getCountNati();
        $return['Charts']['Nati e morti']['Morti'] = $this->person_collection->getCountMorti();

        $return['Charts']['Salute media']['Salute media'] = $this->person_collection->getMeanHealth();

        // Prodotti
        // Ambiente



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
    
        ////!!!andrebbe aggiunto un commento al momento dell'acquisto 
        ////   che stampi tutti i parametri coinvolti (quelli interni di prod e pop)
        
        ////***sarebbe da controllare se le preferenze vengono generate come dovrebbero:
        ////   ovverosia: preferenze(j) di ogni persona sono comprese tra 0 ed 1 e strettamente crescenti
        ////   quindi: preferenza(0) >0 ; preferenza(j)<preferenza(j+1); preferenza(N_meat+N-veg - 1) =1
                
        /* A) considerazioni:
         * 1) while e for hanno le stesse condizioni, se si blocca lì dentro significa che 
         * non si raggiunge la condizione in cui nessuno dei due array (persone e prodotti) raggiunge per tutti i suoi elementi la condizione di unset
         * 2) basta che uno dei due _indexes sia vuoto per far finire il ciclo, e che durante il ciclo
         * i parametri interni degli oggetti DOVREBBERO AUMENTARE MONOTONAMENTE fino a che non raggiungono la condizione di unset
         * 
         * B) aggiungendo il commento per i parametri interni degli oggetti al momento dell'acquisto, si dovrebbe osservare che: 
         * 1) tutti i valori sono >0
         * 2) tutti i valori sono < del valore max che possono raggiungere: 
         *    person.speso < person.wealth; person.eaten < person. fabbisogno; product.sold < product.production
         * 3) l'unico momento in cui la (2) non è vera è quando una persona o prodotto ha raggiunto uno dei "limiti di unset"
         *    quindi i casi in cui la (2) non si verifica dovrebbero esser seguiti da "rimosso prodotto tot" o "rimossa persona tot"
         *    e dopo di quello quella persona o quel prodotto non dovrebbero più comparire nel commento
         *
         *C) secondo me gli errori possibili sono:                
         *1) il ciclo è eccessivamente lento a fare quel che deve, il che eventualmente significa
         *   un valore troppo alto tra fabbisogno, wealth, produzione dell'industria
         *   un valore troppo basso di cibo acquistato (val), e prezzi
         *   con !!! e (B) si dovbrebbe poter vedere che quando il programma si arresta stava tuttavia facendo cose sensate
         *2) ci sono casini strani nei parametri interni di persone e/o prodotti, tali per cui non si raggiungono le condizioni di unset
         *   ma in tal caso aggiungendo quel commento al momento dell'acquisto (B) si dovrebbe capire dove sta l'errore
         *3) le preferenze vengono generate in maniera strana, per cui se non è (1) o (2) conviene *** 
         *   tecnicamente l'algoritmo dovrebbe funzionare anche con preferenze a casaccio, 
         *   perché il while(!in_array (...) ) funziona sul solo indice a prescindere dalle preferenze e quindi qualcosa becca sicuro
         *   tuttavia potrebbe darsi che delle preferenze costruite male rallentino la funzione o chi sa che diavolo    
         *4) cose di sintassi/codice di cui non ho la minima idea, ad esempio il funzionamento di count, unset, assegnamenti, boh
         *   o comunque qualche stranezza nelle condizioni dei cicli che tuttavia non mi sembra di notare
         *5) mi sta sfuggendo qualcosa di palesissimo e bah
         *
         *
         */
        while (count($persons_indexes) > 0 && count($products_indexes) > 0) {
            /* error_log('New while cicle');
              error_log('$persons_indexes = ' . count($persons_indexes));
              error_log(''); */
            
            /////aggiungerei un commento qui per capire quante volte il ciclo for riparte da capo
            /////nb il ciclo for riparte da capo significa: "tutti hanno comprato un prodotto, ora chi è rimasto compra quel che è rimasto"
            for ($i = 0; $i < count($persons_indexes) && count($products_indexes) > 0; $i++) {
                /* error_log('$persons_indexes = ' . count($persons_indexes));
                  error_log('$products_indexes = ' . count($products_indexes));
                  error_log('');
                  error_log('New for cicle i = ' . $i); */
                $person = $this->person_collection->getPerson($i);
                $rnd = rand(0, 1);

                $j = 0;
                while ($rnd > $person->get_preferenza($j)) {
                    //j indicizza il cibo acquistato
                    if ( $j == (self::$n_meat + self::$n_veg - 1)) {
                        //commento: qui tecnicamente non dovrebbe arrivarci perché nel caso limite rnd=1=preferenza(n_meat+n_veg - 1)
                        //break;
                        /////questo nel caso in cui le preferenze siano state generate bene *** questo if break non serve 
                        /////ed in caso contrario significa che preferenza(n_meat+n_veg - 1) < 1, cosa che non dovrebbe essere
                    } else {
                        $j++;
                    }
                }

                /*
                 * Recupera un prodotto in caso j non sia più disponibile
                 */
                $t = $j;
                while (!in_array($j, $products_indexes)) {
                    if ($j == 0) {
                        $j = $t;
                        while (!in_array($j, $products_indexes)) {
                            if ($j  == (self::$n_meat + self::$n_veg - 1)) {
                                break;
                                //commento: qui ci arriva solo se l'ultimo cibo rimasto è quello più costoso
                                //Il che è plausibile ma se finisce sistematicamente qui forse c'è qualcosa di strano
                            } else {
                                $j++;
                            }
                        }
                    } else {
                        $j--;
                    }
                }

                $product = $this->product_collection->getProduct($j);

                $val = 1;  //questo val è una costante è può esser tranquillamente messa prima dell'inizio del ciclo
                
                ///NB: qui get_eaten legge lo stesso indirizzo di memoria che set eaten va a scrivere
                ///non ne so molto ma potrebbe causare conflitti nella memorizzazione ????
                $person->set_eaten($person->get_eaten(1) + $val, 1);
                $product->set_sold($product->get_sold(1) + $val, 1);
                $person->set_speso($person->get_speso() + $product->get_price() * $val);
        ///!!!//////commento: "persona 'i' ( spesa attuale 'get_speso(1)' su 'get_wealth'; mangiato 'get_eaten(1)' su 'get_fabbisogno )
        ///!!!//////           ha comprato 'val' del prodotto 'j' ( nome: 'get_nome' : venduto 'get_sold(1)' su 'get_production(1) )"

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
