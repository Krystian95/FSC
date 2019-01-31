<?php

/**
 * Person
 *
 * @author Cristian
 */
class Person {

    private static $pop_stab = 0.0;
    private static $max_growth_pop = 0.0;
    private static $food_need = 0.0;
    private $preferenze = [];
    private $wealth;
    private $health = [2];
    private $eaten = [2];

    public function __construct() {

        //$this->preferenze[System::$n_meat + System::$n_veg]; // array_push a runtime
        $this->eaten[0] = 0;
        $this->eaten[1] = 0;
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

    /*
     * Getter
     */

    public function get_wealth() {
        return $this->wealth;
    }

    public function get_health($index) {
        return $this->health[$index];
    }

    public function get_eaten($index) {
        return $this->eaten[$index];
    }

}
