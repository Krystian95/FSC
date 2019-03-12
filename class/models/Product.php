<?php

/**
 * Product
 *
 * @author Cristian
 */
class Product {

    private $name;
    private $impact_on_GHGS;
    private $impact_on_NH3;
    private $impact_on_PM;
    private $production = [];
    private $capacity = [];
    private $price;
    private $ideal_temperature;
    private $tolerance_temperature;
    private $sold = [];
    private $ideal_GHGS;
    private $ideal_NH3;
    private $ideal_PM;
    private $tolerance_GHGS;
    private $tolerance_NH3;
    private $tolerance_PM;
    private $type;

    public function __construct() {

        $this->production[0] = 0.0;
        $this->production[1] = 0.0;
        $this->sold[0] = 0.0;
        $this->sold[1] = 0.0;
    }

    public function step_production($environment) {

        $min_required_production = 2 / 10;
        $this->production[1] = $this->capacity[0] * (1 - ($environment->get_temperature(0) - $this->ideal_temperature) / $this->tolerance_temperature) * ($environment->get_GHGS(0) - $this->ideal_GHGS / $this->tolerance_GHGS) * ($environment->get_NH3(0) - $this->ideal_NH3 / $this->tolerance_NH3) * ($environment->get_PM(0) - $this->ideal_PM / $this->tolerance_PM);

        $this->production[1] = $this->production[1] <= ($this->production[1] * $min_required_production) ? 0 : $this->production[1];
    }

    public function growth_evaluate($prod_stab, $max_growth_prod) {

        if ($this->production[1] <= 0) {
            $this->capacity[1] = $this->capacity[0] - $prod_stab / 100 * $max_growth_prod / $prod_stab;
        } else {
            $this->capacity[1] = $this->capacity[0] + ($this->sold[1] / $this->production[1] - $prod_stab / 100 ) * $max_growth_prod / $prod_stab;
        }

        $this->capacity[1] = $this->capacity[1] <= 0 ? 1 : $this->capacity[1];
    }

    /*
     * Setters
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
     * Getters
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

    public function get_capacity($index) {
        return $this->capacity[$index];
    }

    public function get_price() {
        return $this->price;
    }

}
