<?php

/**
 * Person
 *
 * @author Cristian
 */
class Person {

    private static $pop_stab = 60.0;
    private static $max_growth_pop = 2.0;
    private static $food_need = 8.0;
    private $preferenze = [];
    private $wealth;
    private $health = [];
    private $eaten = [];
    private $speso = 0;

    public function __construct($deviation_of_preference, $tendency, $product_collection, $wealth, $ricchezza_media) {

        $this->eaten[0] = 0.0;
        $this->eaten[1] = 0.0;
        $this->health[0] = 0.0;
        $this->health[1] = 0.0;

        $this->wealth = $wealth;

        /*
         * Preferences
         */

        $preferenze_tmp = [];
        $tot_prod = System::$n_meat + System::$n_veg;

        $mean = 1 / $tot_prod;
        $mean_meat = $mean + $tendency / 2;
        $mean_veg = $mean + $tendency / 2;
        $sum = 0;
        for ($i = 0; $i < $tot_prod; $i++) {
            if ($product_collection->getProductTypeByIndex($i) == 'meat') {
                $mean_to_use = $mean_meat;
            } elseif ($product_collection->getProductTypeByIndex($i) == 'veg') {
                $mean_to_use = $mean_veg;
            }

            //$gauss = stats_dens_normal(0, $mean_to_use, $deviation_of_preference);
            /*
             * stats_rand_gen_normal()
             */
            $gauss = (rand(0, 10000) / 10000 ) * $mean_to_use * 2;
            $preferenze_tmp[$i] = ($gauss > 0 ? $gauss : 0);
            $sum += $preferenze_tmp[$i];
        }

        /*
         * Correction value
         */

        $correction_value = (1 - $sum) / $tot_prod;
        for ($i = 0; $i < $tot_prod; $i++) {
            $preferenze_tmp[$i] += $correction_value;
        }

        /*
         * Filtro
         */

        $q = $tot_prod / 2;
        $m = ($this->wealth - $ricchezza_media) / $ricchezza_media;
        for ($i = 0; $i < $tot_prod; $i++) {
            $preferenze_tmp[$i] += $m * $i - $q;
        }

        /*
         * Preferenze (vere)
         */

        $this->preferenze[0] = $preferenze_tmp[0];
        for ($i = 1; $i < $tot_prod; $i++) {
            $this->preferenze[$i] = $this->preferenze[$i - 1] + $preferenze_tmp[$i];
        }
    }

    public function health_evaluate() {
        $this->health[1] = $this->health[0] + ($this->eaten[1] / self::$food_need - self::$pop_stab) * self::$max_growth_pop / self::$pop_stab;
    }

    /*
     * Setter
     */

    public function set_wealth($wealth) {
        $this->wealth = $wealth;
    }

    public function set_health($health, $index) {
        $this->health[$index] = $health;
    }

    public function set_eaten($eaten, $index) {
        $this->eaten[$index] = $eaten;
    }

    public function set_speso($speso) {
        $this->speso = $speso;
    }

    /*
     * Getter
     */

    public function get_wealth() {
        return $this->wealth;
    }

    public function get_food_need() {
        return self::$food_need;
    }

    public function get_health($index) {
        return $this->health[$index];
    }

    public function get_eaten($index) {
        return $this->eaten[$index];
    }

    public function get_preferenza($index) {
        return $this->preferenze[$index];
    }

    public function get_speso() {
        return $this->speso;
    }

}
