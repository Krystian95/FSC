<?php

/**
 * Product
 *
 * @author Cristian
 */
class Product {

    private static $prod_stab = 0.0;
    private static $max_growth_prod = 0.0;
    private $impact_on_GHGS;
    private $impact_on_NH3;
    private $impact_on_PM;
    private $production = [2];

    public function __construct() {
        
    }

    /*
     * Setter
     */

    public function set_impact_on_GHGS($impact_on_GHGS) {
        $this->impact_on_GHGS = $impact_on_GHGS;
    }

    public function set_impact_on_NH3($impact_on_NH3) {
        $this->impact_on_NH3 = $impact_on_NH3;
    }

    public function set_impact_on_PM($impact_on_PM) {
        $this->impact_on_PM = $impact_on_PM;
    }

    public function set_production($production, $index) {
        $this->production[$index] = $production;
    }

    /*
     * Getter
     */

    public function get_impact_on_GHGS() {
        return $this->impact_on_GHGS;
    }

    public function get_impact_on_NH3() {
        return $this->impact_on_NH3;
    }

    public function get_impact_on_PM() {
        return $this->impact_on_PM;
    }

    public function get_production($index) {
        return $this->production[$index];
    }

}
