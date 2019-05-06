<?php

/**
 * Description of Environment
 *
 * @author Cristian
 */
class System {

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

        //error_log('-----------------------------------------------------------------');

        $return = [];

        // Popolazione
        //error_log($this->person_collection->getCountPeople());
        $return['Charts']['Popolazione']['Popolazione'] = $this->person_collection->getCountPeople();

        $return['Charts']['Nati e morti']['Nati'] = $this->person_collection->getCountNati();
        $return['Charts']['Nati e morti']['Morti'] = $this->person_collection->getCountMorti();
        $return['Charts']['Salute media']['Salute media'] = $this->person_collection->getMeanHealth();

        $return['Charts']['Distribuzione della salute']['0-9'] = 0;
        $return['Charts']['Distribuzione della salute']['10-19'] = 0;
        $return['Charts']['Distribuzione della salute']['20-29'] = 0;
        $return['Charts']['Distribuzione della salute']['30-39'] = 0;
        $return['Charts']['Distribuzione della salute']['40-49'] = 0;
        $return['Charts']['Distribuzione della salute']['50-59'] = 0;
        $return['Charts']['Distribuzione della salute']['60-69'] = 0;
        $return['Charts']['Distribuzione della salute']['70-79'] = 0;
        $return['Charts']['Distribuzione della salute']['80-89'] = 0;
        $return['Charts']['Distribuzione della salute']['90-100'] = 0;

        for ($i = 0; $i < $this->person_collection->getCountPeople(); $i++) {

            $health = $this->person_collection->getPerson($i)->get_health(0);

            switch ($health) {
                case ($health >= 0 && $health <= 9):
                    $return['Charts']['Distribuzione della salute']['0-9'] ++;
                    break;
                case ($health >= 10 && $health <= 19):
                    $return['Charts']['Distribuzione della salute']['10-19'] ++;
                    break;
                case ($health >= 20 && $health <= 29):
                    $return['Charts']['Distribuzione della salute']['20-29'] ++;
                    break;
                case ($health >= 30 && $health <= 39):
                    $return['Charts']['Distribuzione della salute']['30-39'] ++;
                    break;
                case ($health >= 40 && $health <= 49):
                    $return['Charts']['Distribuzione della salute']['40-49'] ++;
                    break;
                case ($health >= 50 && $health <= 59):
                    $return['Charts']['Distribuzione della salute']['50-59'] ++;
                    break;
                case ($health >= 60 && $health <= 69):
                    $return['Charts']['Distribuzione della salute']['60-69'] ++;
                    break;
                case ($health >= 70 && $health <= 79):
                    $return['Charts']['Distribuzione della salute']['70-79'] ++;
                    break;
                case ($health >= 80 && $health <= 89):
                    $return['Charts']['Distribuzione della salute']['80-89'] ++;
                    break;
                case ($health >= 90 && $health <= 100):
                    $return['Charts']['Distribuzione della salute']['90-100'] ++;
                    break;

                default:
                    break;
            }
        }

        // Prodotti
        foreach ($this->product_collection->getProducts() as $product) {

            $product_name = $product->get_name();
            $return['Charts']['Capacità produttiva'][$product_name] = $product->get_capacity(0);
            /*
             * la capacità mostrata è capacita(0), perchè production -e sold- sono calcolate a partire da quella
             * mentre capacita(1) svolge il ruolo di capacità produttiva dell'iterazione successiva -dopo la crescita
             */
            $return['Charts']['Produzione'][$product_name] = $product->get_production(1);
            $return['Charts']['Vendite'][$product_name] = $product->get_sold(1);
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
        //setta production[1]
        /*
         * impact_from_product
         */
        $products = $this->product_collection->getProducts();
        $this->environment->impact_from_products($products);
        //setta agentiatmosferici[1]
        /*
         * temperature_evaluation
         */
        $this->environment->temperature_evaluation();
        //setta temperatura[1]

        /*
         * Buy & Sell
         */

        $this->buyAndSell();
        //setta sold[1]
        //setta bought[1]

        /*
         * health_evaluate
         */
        //error_log(count($this->person_collection->getPersons()));
        $this->person_collection->grow_pops($this->product_collection);
        //error_log(count($this->person_collection->getPersons()));
        //setta tutti gli healt[1]
        //nasce e uccide i pops

        /*
         * growth_evaluate
         */
        $this->product_collection->growth_evaluations();
        //setta capacity[1] per il nuovo ciclo

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
        /*
          foreach($product_indexes as $j){
          $product = $this->product_collection->getProduct($j)
          if($product->get_production(1)==0){
          unset($products_indexes[$j])
          }
          }
         */
        while (count($persons_indexes) > 0 && count($products_indexes) > 0) {
            /* error_log('');
              error_log('');
              error_log('New while cicle');
              error_log('$persons_indexes = ' . count($persons_indexes)); */

            foreach ($persons_indexes as $i) {
                if (count($products_indexes) == 0) {
                    break;
                }

                /* error_log('$persons_indexes = ' . count($persons_indexes));
                  error_log('$products_indexes = ' . count($products_indexes));
                  error_log('New for cicle i = ' . $i); */
                $person = $this->person_collection->getPerson($i);

                $rnd = Utils::rand(0.0, 1.0);
//$rnd = 1.0;

                $j = 0;

//               error_log('ENTER while');
//error_log('Rand (' . $rnd . ') > Preferenza j=' . $j . ' (' . $person->get_preferenza($j) . ')');
                while ($rnd > $person->get_preferenza($j)) {
//    error_log('Rand (' . $rnd . ') > Preferenza j=' . $j . ' (' . $person->get_preferenza($j) . ')');
//    error_log($j . ' == ' . $this->product_collection->n_meat + $this->product_collection->n_veg - 1);
                    if ($j == ($this->product_collection->n_meat + $this->product_collection->n_veg - 1)) {
//        error_log('break');
                        //commento: qui tecnicamente non dovrebbe arrivarci perch nel caso limite rnd=1=preferenza(n_meat+n_veg - 1)       
                        break;
                        /////questo nel caso in cui le preferenze siano state generate bene *** questo if break non serve 
                        /////ed in caso contrario significa che preferenza(n_meat+n_veg - 1) < 1, cosa che non dovrebbe essere
                    } else {
                        $j++;
                        //error_log('Rand (' . $rnd . ') > Preferenza j=' . $j . ' (' . $person->get_preferenza($j) . ')');
                    }
                }
//error_log('EXIT while con  j=' . $j);

                /*
                 * Recupera un prodotto in caso j non sia pi disponibile
                 */
                $t = $j;
                while (!in_array($j, $products_indexes)) {
                    if ($j == 0) {
                        $j = $t;
                        while (!in_array($j, $products_indexes)) {
                            if ($j == ($this->product_collection->n_meat + $this->product_collection->n_veg - 1)) {
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
