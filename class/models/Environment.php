<?php

/**
 * Environment
 *
 * @author Cristian
 */
class Environment {

    private static $mean_temp = 0.0;
    private static $width_temp = 0.0;
    private $temperature = [2];
    private $GHGS = [2];
    private $NH3 = [2];
    private $PM = [2];

    public function __construct() {
        $this->temperature[0] = 0.0; // TODO set via UI
        $this->temperature[1] = 0.0; // TODO set via UI
        $this->GHGS[0] = 0.0;
        $this->GHGS[1] = 0.0;
        $this->NH3[0] = 0.0;
        $this->NH3[1] = 0.0;
        $this->PM[0] = 0.0;
        $this->PM[1] = 0.0;
    }

    private function impact_from_product(Product $product) {

        $this->GHGS[1] = $this->GHGS[0] + $product->get_impact_on_GHGS() * $product->get_production(1);
        $this->NH3[1] = $this->NH3[0] + $product->get_impact_on_NH3() * $product->get_production(1);
        $this->PM[1] = $this->PM[0] + $product->get_impact_on_PM() * $product->get_production(1);
    }

    public function temperature_evaluation() {
        $this->temperature[1] = self::$mean_temp + self::$width_temp * cos(( (System::$current_month - 8) % 12) / 12 * 2 * pi());
    }

    public function getGHGS($index) {
        return $this->GHGS[$index];
    }

    public function getNH3($index) {
        return $this->NH3[$index];
    }

    public function getPM($index) {
        return $this->PM[$index];
    }

    public function getTemperature($index) {
        return $this->temperature[$index];
    }

    public function impact_from_products($products) {
        foreach ($products as $product) {
            $this->impact_from_product($product);
        }
    }

}
