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

    public function impact_from_product(Product $product) {

        $this->GHGS[1] += $product->get_impact_on_GHGS() * $product->get_production(1);
        $this->NH3[1] += $product->get_impact_on_NH3() * $product->get_production(1);
        $this->PM[1] += $product->get_impact_on_PM() * $product->get_production(1);
    }

    public function temperature_evaluation() {
        $this->temperature[1] = self::$mean_temp + self::$width_temp * cos(( (System::$current_month - 8) % 12) / 12 * 2 * pi());
    }

    public function getGHGS() {
        return $this->GHGS[1];
    }

    public function getNH3() {
        return $this->NH3[1];
    }

    public function getPM() {
        return $this->PM[1];
    }

    public function getTemperature() {
        return $this->temperature[1];
    }

}
