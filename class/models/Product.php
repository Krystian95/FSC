<?php

/**
 * Product
 *
 * @author Cristian
 */
class Product {

    private $name;
    private static $prod_stab = 15.0;
    private static $max_growth_prod = 90.0;
    private $impact_on_GHGS;
    private $impact_on_NH3;
    private $impact_on_PM;
    private $production = [2];
    private $capacity = [2];
    private $price;
    private $ideal_temperature;
    private $tolerance_temperature;
    private $sold = [2];
    private $ideal_GHGS;
    private $ideal_NH3;
    private $ideal_PM;
    private $tolerance_GHGS;
    private $tolerance_NH3;
    private $tolerance_PM;
    private $type;

    public function __construct() {
        
    }

    public function step_production($environment) {
        $this->production[1] = $this->capacity[1] * (1 - ($environment->getTemperature(0) - $this->ideal_temperature) / $this->tolerance_temperature) * ($environment->getGHGS(0) - $this->ideal_GHGS / $this->tolerance_GHGS) * ($environment->getNH3(0) - $this->ideal_NH3 / $this->tolerance_NH3) * ($environment->getPM(0) - $this->ideal_PM / $this->tolerance_PM);
    }

    public function growth_evaluate() {
        $this->capacity[1] = $this->capacity[0] + ($this->sold[1] / $this->production[1] - self::$prod_stab) * self::$max_growth_prod / self::$prod_stab;
    }

    /*
     * Setter
     */

    public function set_name($name) {
        $this->name = $name;
    }

    public function set_type($type) {
        $this->type = $type;
    }

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

    public function set_capacity($capacity, $index) {
        $this->capacity[$index] = $capacity;
    }

    public function set_price($price) {
        $this->price = $price;
    }

    public function set_ideal_temperature($ideal_temperature) {
        $this->ideal_temperature = $ideal_temperature;
    }

    public function set_tolerance_temperature($tolerance_temperature) {
        $this->tolerance_temperature = $tolerance_temperature;
    }

    public function set_sold($sold, $index) {
        $this->sold[$index] = $sold;
    }

    public function set_ideal_GHGS($ideal_GHGS) {
        $this->ideal_GHGS = $ideal_GHGS;
    }

    public function set_ideal_NH3($ideal_NH3) {
        $this->ideal_NH3 = $ideal_NH3;
    }

    public function set_ideal_PM($ideal_PM) {
        $this->ideal_PM = $ideal_PM;
    }

    public function set_tolerance_GHGS($tolerance_GHGS) {
        $this->tolerance_GHGS = $tolerance_GHGS;
    }

    public function set_tolerance_NH3($tolerance_NH3) {
        $this->tolerance_NH3 = $tolerance_NH3;
    }

    public function set_tolerance_PM($tolerance_PM) {
        $this->tolerance_PM = $tolerance_PM;
    }

    /*
     * Getter
     */

    public function get_name() {
        return $this->name;
    }

    public function get_type() {
        return $this->type;
    }

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

    public function get_sold($index) {
        return $this->sold[$index];
    }

    public function get_price() {
        return $this->price;
    }

}
