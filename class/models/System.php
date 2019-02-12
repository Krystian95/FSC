<?php

/**
 * Description of Environment
 *
 * @author Cristian
 */
class System {

    public static $n_meat = 5;
    public static $n_veg = 15;
    public static $current_month;
    public static $step = 0;
    private $environment;
    private $product_collection;
    private $person_collection;

    public function __construct() {

        $this->environment = new Environment();
        $this->product_collection = new ProductCollection();
        $this->person_collection = new PersonCollection($this->product_collection);
    }

    /*
     * Setup params with provided or by default
     */

    public function setupParams($params) {
        
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
        $this->person_collection->grow_pops();
        //error_log(count($this->person_collection->getPersons()));

        /*
         * growth_evaluate
         */
        $this->product_collection->growth_evaluations();

        self::$step++;


        /*
         * Test
         */
        $return['Charts']['Chart 1']['Linea 1'] = $this->person_collection->getMeanHealth();
        $return['Charts']['Chart 1']['Linea 2'] = $this->environment->getNH3(1);

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
            for ($i = 0; $i < count($persons_indexes); $i++) {

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

                $product = $this->product_collection->getProduct($j);

                // TODO controlla che persons abbia abbastanza soldi per acquistare quel prodotto

                $val = 1;
                $person->set_eaten($person->get_eaten() + $val, 1);
                $product->set_sold($product->get_sold(1) + $val, 1);
                $person->set_speso($person->get_speso() + $product->get_price() * $val);

                if ($person->get_eaten(1) >= $person->get_food_need() || $person->get_speso() >= $person->get_wealth()) {
                    unset($persons_indexes[$i]);
                }
                if ($person->get_sold(1) >= $product->get_production(1)) {
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
