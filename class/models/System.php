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

        /*
         * Terminal operations of the cicle
         */
        $this->product_collection->endIteration();
        $this->person_collection->endIteration();
        $this->environment->endIteration();

        self::$step++;


        /*
         * Test
         */
        $return['Charts']['Chart 1']['Linea 1'] = $this->person_collection->getCountPeople();
        $return['Charts']['Chart 1']['Linea 2'] = $this->person_collection->getMeanHealth();

        /*
         * Extra
         */
        $next_period = $this->calculateNextPeriod($current_period = $period);

        $return['Next_Period'] = $next_period;

        /* $return['Charts']['Chart 1']['Linea 1'] = random_int(0, 500);
          $return['Charts']['Chart 1']['Linea 2'] = random_int(0, 500); */

        return $return;
    }

    private function buyAndSell() {

        $persons_indexes = array_keys($this->person_collection->getPersons());
        $products_indexes = array_keys($this->product_collection->getProducts());

        while (count($persons_indexes) > 0 && count($products_indexes) > 0) {
            /* error_log('New while cicle');
              error_log('$persons_indexes = ' . count($persons_indexes));
              error_log(''); */
            for ($i = 0; $i < count($persons_indexes) && count($products_indexes) > 0; $i++) {
                /* error_log('$persons_indexes = ' . count($persons_indexes));
                  error_log('$products_indexes = ' . count($products_indexes));
                  error_log('');
                  error_log('New for cicle i = ' . $i); */
                $person = $this->person_collection->getPerson($i);
                $rnd = rand(0, 1);

                $j = 0;
                while ($rnd >= $person->get_preferenza($j)) {
                    //j indicizza il cibo acquistato
                    if (($j + 1) == (self::$n_meat + self::$n_veg)) {
                        break;
                    } else {
                        $j++;
                    }
                }

                /*
                 * Recupera un prodotto (sia che sia sotto che sopra)
                 */
                $t = $j;
                while (!in_array($j, $products_indexes)) {
                    if ($j == 0) {
                        $j = $t;
                        while (!in_array($j, $products_indexes)) {
                            if ($j == (self::$n_meat + self::$n_veg) - 1) {
                                break;
                            } else {
                                $j++;
                            }
                        }
                    } else {
                        $j--;
                    }
                }

                $product = $this->product_collection->getProduct($j);

                // TODO controlla che persons abbia abbastanza soldi per acquistare quel prodotto

                $val = 1;
                $person->set_eaten($person->get_eaten(1) + $val, 1);
                $product->set_sold($product->get_sold(1) + $val, 1);
                $person->set_speso($person->get_speso() + $product->get_price() * $val);

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
