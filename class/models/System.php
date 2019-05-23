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
        $return['Charts']['Salute media']['Salute media'] = Utils::round($this->person_collection->getMeanHealth());

        $ranges_distr_salute = [
            ['min' => 0, 'max' => 4],
            ['min' => 5, 'max' => 9],
            ['min' => 10, 'max' => 14],
            ['min' => 15, 'max' => 19],
            ['min' => 20, 'max' => 24],
            ['min' => 25, 'max' => 29],
            ['min' => 30, 'max' => 34],
            ['min' => 35, 'max' => 39],
            ['min' => 40, 'max' => 44],
            ['min' => 45, 'max' => 49],
            ['min' => 50, 'max' => 54],
            ['min' => 55, 'max' => 59],
            ['min' => 60, 'max' => 64],
            ['min' => 65, 'max' => 69],
            ['min' => 70, 'max' => 74],
            ['min' => 75, 'max' => 79],
            ['min' => 80, 'max' => 84],
            ['min' => 85, 'max' => 89],
            ['min' => 90, 'max' => 94],
            ['min' => 95, 'max' => 100]
        ];

        $ranges = [
            ['min' => 0, 'max' => 9],
            ['min' => 10, 'max' => 19],
            ['min' => 20, 'max' => 29],
            ['min' => 30, 'max' => 39],
            ['min' => 40, 'max' => 49],
            ['min' => 50, 'max' => 59],
            ['min' => 60, 'max' => 69],
            ['min' => 70, 'max' => 79],
            ['min' => 80, 'max' => 89],
            ['min' => 90, 'max' => 100]
        ];

        /*
         * Distribuzione della salute
         */
        foreach ($ranges_distr_salute as $range) {
            $range_text = $range['min'] . '-' . $range['max'];
            $return['Charts']['Distribuzione della salute'][$range_text] = 0;
        }

        /*
         * Distribuzione cibi acquistati/ricchezza.
         * imposta tutti i prodotti acquistati a 0.
         */
        foreach ($ranges as $range) {
            $range_text = $range['min'] . '-' . $range['max'];
            foreach ($this->product_collection->getProducts() as $product) {
                $return['Charts']['Distribuzione cibi acquistati/ricchezza'][$range_text][$product->get_name()] = 0;
            }
        }

        //error_log('----------------------');

        for ($i = 0; $i < $this->person_collection->getCountPeople(); $i++) {

            $person = $this->person_collection->getPerson($i);

            /*
             * Distribuzione della salute
             */
            $health = Utils::round($person->get_health(1));
            //error_log('health = ' . $health);

            foreach ($ranges_distr_salute as $range) {
                if ($health >= $range['min'] && $health <= ($range['max'] + 0.99)) {
                    $range_text = $range['min'] . '-' . $range['max'];
                    //error_log('range (SI) = ' . $range_text);
                    $return['Charts']['Distribuzione della salute'][$range_text] ++;
                }
            }

            /*
             * Distribuzione cibi acquistati/ricchezza
             */
            $wealth = Utils::round($person->get_wealth());

            foreach ($ranges as $range) {
                /*
                 * Test if extist sub set with the name of the product. If not create it and then add 1 to it.
                 */
                if ($wealth >= $range['min'] && $wealth <= ($range['max'] + 0.99)) {
                    $range_text = $range['min'] . '-' . $range['max'];
                    //error_log($range_text);
                    $products_bought = $person->get_bought();
                    foreach ($products_bought as $product_bought) {
                        //error_log($product_bought);
                        if (!isset($return['Charts']['Distribuzione cibi acquistati/ricchezza'][$range_text][$product_bought])) {
                            $return['Charts']['Distribuzione cibi acquistati/ricchezza'][$range_text][$product_bought] = 0;
                        }
                        $return['Charts']['Distribuzione cibi acquistati/ricchezza'][$range_text][$product_bought] ++;
                    }
                }
            }
        }

        // Prodotti
        $return['Charts']['Industria carni/industria vegetali']['Capacità produttiva (Carni)'] = 0;
        $return['Charts']['Industria carni/industria vegetali']['Produzione (Carni)'] = 0;
        $return['Charts']['Industria carni/industria vegetali']['Vendite (Carni)'] = 0;
        $return['Charts']['Industria carni/industria vegetali']['Capacità produttiva (Vegetali)'] = 0;
        $return['Charts']['Industria carni/industria vegetali']['Produzione (Vegetali)'] = 0;
        $return['Charts']['Industria carni/industria vegetali']['Vendite (Vegetali)'] = 0;
        //error_log('--------------------');

        $mode_random_params = $this->product_collection->getModeRandomParams();
        $products = [];

        if ($mode_random_params) {
            for ($i = 0; $i < $this->product_collection->getNProducts(); $i++) {
                array_push($products, $i);
            }
        } else {
            $products = $this->product_collection->getDefaultProducts();
            $products = array_map('ucfirst', $products);
        }

        foreach ($products as $product_name) {

            if ($mode_random_params) {
                $product_name = 'Prodotto ' . $product_name;
            }

            $product = $this->product_collection->getProductByName($product_name);

            //error_log($product_name);
            $return['Charts']['Capacità produttiva'][$product_name] = Utils::round($product->get_capacity(0));
            /*
             * la capacità mostrata è capacita(0), perchè production -e sold- sono calcolate a partire da quella
             * mentre capacita(1) svolge il ruolo di capacità produttiva dell'iterazione successiva -dopo la crescita
             */
            $return['Charts']['Produzione'][$product_name] = Utils::round($product->get_production(1));
            $return['Charts']['Vendite'][$product_name] = Utils::round($product->get_sold(1));

            $return['Charts']['Capacità, produzione e vendita mensile'][$product_name]['Capacità produttiva'] = Utils::round($product->get_capacity(0));
            $return['Charts']['Capacità, produzione e vendita mensile'][$product_name]['Produzione'] = Utils::round($product->get_production(1));
            $return['Charts']['Capacità, produzione e vendita mensile'][$product_name]['Vendite'] = Utils::round($product->get_sold(1));

            switch ($product->get_type()) {
                case 'meat':
                    $return['Charts']['Industria carni/industria vegetali']['Capacità produttiva (Carni)'] += $product->get_capacity(0);
                    $return['Charts']['Industria carni/industria vegetali']['Produzione (Carni)'] += $product->get_production(1);
                    $return['Charts']['Industria carni/industria vegetali']['Vendite (Carni)'] += $product->get_sold(1);

                    break;

                case 'veg':
                    $return['Charts']['Industria carni/industria vegetali']['Capacità produttiva (Vegetali)'] += $product->get_capacity(0);
                    $return['Charts']['Industria carni/industria vegetali']['Produzione (Vegetali)'] += $product->get_production(1);
                    $return['Charts']['Industria carni/industria vegetali']['Vendite (Vegetali)'] += $product->get_sold(1);
                    break;

                default:
                    break;
            }
        }

        $return['Charts']['Industria carni/industria vegetali']['Capacità produttiva (Carni)'] = Utils::round($return['Charts']['Industria carni/industria vegetali']['Capacità produttiva (Carni)']);
        $return['Charts']['Industria carni/industria vegetali']['Produzione (Carni)'] = Utils::round($return['Charts']['Industria carni/industria vegetali']['Produzione (Carni)']);
        $return['Charts']['Industria carni/industria vegetali']['Vendite (Carni)'] = Utils::round($return['Charts']['Industria carni/industria vegetali']['Vendite (Carni)']);
        $return['Charts']['Industria carni/industria vegetali']['Capacità produttiva (Vegetali)'] = Utils::round($return['Charts']['Industria carni/industria vegetali']['Capacità produttiva (Vegetali)']);
        $return['Charts']['Industria carni/industria vegetali']['Produzione (Vegetali)'] = Utils::round($return['Charts']['Industria carni/industria vegetali']['Produzione (Vegetali)']);
        $return['Charts']['Industria carni/industria vegetali']['Vendite (Vegetali)'] = Utils::round($return['Charts']['Industria carni/industria vegetali']['Vendite (Vegetali)']);

        // Ambiente
        $return['Charts']['Temperatura']['Temperatura'] = Utils::round($this->environment->get_temperature(1));

        $return['Charts']['Agenti atmosferici']['GHGS'] = Utils::round($this->environment->get_GHGS(1));
        $return['Charts']['Agenti atmosferici']['PM'] = Utils::round($this->environment->get_PM(1));
        $return['Charts']['Agenti atmosferici']['NH3'] = Utils::round($this->environment->get_NH3(1));

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


        $val = 1.0;
        $persons_indexes = array_keys($this->person_collection->getPersons());
        $products_indexes = array_keys($this->product_collection->getProducts());
        $n_products = count($products_indexes);

        for ($i = 0; $i < $n_products; $i++) {
            $product = $this->product_collection->getProduct($products_indexes[$i]);
            if ($product->get_production(1) == 0) {
                unset($products_indexes[$i]);
            }
        }

        while (count($persons_indexes) > 0 && count($products_indexes) > 0) {
            /* error_log('');
              error_log('');
              error_log('New while cicle');
              error_log('$persons_indexes = ' . count($persons_indexes)); */
            
            $bought=Utils::rand(0.0, $val)
            
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
                //error_log("Product bought: " . $product->get_name());

                $person->set_eaten($person->get_eaten(1) + $bought, 1);
                $product->set_sold($product->get_sold(1) + $bought, 1);
                $person->set_speso($person->get_speso() + $product->get_price() * $bought);
                $person->add_to_bought($product->get_name());
                //error_log('persona i=' . $i . ' speso(' . $person->get_speso() . '), wealth (' . $person->get_wealth() . '), eaten (' . $person->get_eaten(1) . '), fabbisogno (' . $person->get_food_need() . ')');
                //error_log('ha comprato val (' . $val . ') del prodotto j=' . $j . '(nome: ' . $product->get_name() . ', venduto ' . $product->get_sold(1) . ', production ' . $product->get_production(1) . ')');
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
