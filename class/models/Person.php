<?php

/**
 * Person
 *
 * @author Cristian
 */
class Person {

    private $food_need;
    private $preferenze = [];
    private $wealth;
    private $health = [];
    private $eaten = [];
    private $speso = 0;

    public function __construct($tendency, $product_collection, $wealth, $health, $ricchezza_media, $fabbisogno_cibo, $wealth_influence_factor, $tot_prod) {

        $this->eaten[0] = 0.0;
        $this->eaten[1] = 0.0;
        $this->health[0] = $health;
        $this->health[1] = $health;
        $this->food_need = $fabbisogno_cibo;

        $this->wealth = $wealth;
        $wealth_influence = $wealth_influence_factor / (1000 * $tot_prod);

        /*
         * Preferences
         */

        $preferenze_tmp = [];

        $mean = 1.0 / $tot_prod;
        $mean_meat = $mean + $mean * $tendency / 100;
        $mean_veg = $mean - $mean * $tendency / 100;
        for ($i = 0; $i < $tot_prod; $i++) {
            error_log($product_collection->getProductTypeByIndex($i));
            if ($product_collection->getProductTypeByIndex($i) == 'meat') {
                $preferenze_tmp[$i] = Utils::rand(0, ($mean_meat * 2));
            } elseif ($product_collection->getProductTypeByIndex($i) == 'veg') {
                $preferenze_tmp[$i] = Utils::rand(0, ($mean_veg * 2));
            }
        }

        /*
         * Filter
         */

        $q = $tot_prod / 2;
        $m = ($this->wealth - $ricchezza_media) / $ricchezza_media * $wealth_influence;
        for ($i = 0; $i < $tot_prod; $i++) {
            if (($preferenze_tmp[$i] + ($i - $q) * $m) > 0) {
                $preferenze_tmp[$i] += ($i - $q) * $m;
            }
        }

        /*
         * Correction value
         */

        $sum = 0;
        for ($i = 0; $i < $tot_prod; $i++) {
            $sum += $preferenze_tmp[$i];
        }
        $correction_rate = 1.0 / $sum;
        for ($i = 0; $i < $tot_prod; $i++) {
            $preferenze_tmp[$i] *= $correction_rate;
        }

        /*
         * Preferences (reals)
         */

        $this->preferenze[0] = $preferenze_tmp[0];
        for ($i = 1; $i < $tot_prod; $i++) {
            $this->preferenze[$i] = $this->preferenze[$i - 1] + $preferenze_tmp[$i];
        }
    }

    public function health_evaluate($pop_stab, $max_growth_pop) {
        if ($this->eaten[1] >= $this->food_need) {
            $this->eaten[1] = $this->food_need;
        } else {
            $this->health[1] = $this->health[0] + $max_growth_pop * ($this->eaten[1] / $this->food_need - $pop_stab / 100) / (1 - $pop_stab / 100);
        }

        $this->health[1] = $this->health[1] >= 100 ? 100 : $this->health[1];
    }

    /*
     * Setters
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
     * Getters
     */

    public function get_wealth() {
        return $this->wealth;
    }

    public function get_food_need() {
        return $this->food_need;
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
