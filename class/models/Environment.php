<?php

/**
 * Environment
 *
 * @author Cristian
 */
class Environment {

    private $mean_temp = 0.0;
    private $width_temp = 0.0;
    private $temperature = [];
    private $GHGS = [];
    private $NH3 = [];
    private $PM = [];

    public function __construct($params) {

        $this->mean_temp = $params['oscillazioni_temperatura_media'];
        $this->width_temp = $params['oscillazioni_temperatura_ampiezza'];
        $this->GHGS[0] = $params['valore_iniziale_ghgs'];
        $this->GHGS[1] = $this->GHGS[0];
        $this->NH3[0] = $params['valore_iniziale_nh3'];
        $this->NH3[1] = $this->NH3[0];
        $this->PM[0] = $params['valore_iniziale_pm'];
        $this->PM[1] = $this->PM[0];

        $this->temperature[1] = 0.0;
        $this->temperature_evaluation();
        $this->temperature[0] = $this->temperature[1];
    }

    private function impact_from_product(Product $product) {

        $this->GHGS[1] = $this->GHGS[0] + $product->get_impact_on_GHGS() * $product->get_production(1) + $extern_GHGS;
        $this->NH3[1] = $this->NH3[0] + $product->get_impact_on_NH3() * $product->get_production(1) + $extern_NH3;
        $this->PM[1] = $this->PM[0] + $product->get_impact_on_PM() * $product->get_production(1) + $extern_PM ;
    }                     //////gli "extern_" glie li passa direttamente l'user dai parametri di sistema

    public function temperature_evaluation() {
        $this->temperature[1] = $this->mean_temp + $this->width_temp * cos(( (System::$current_month - 8) % 12) / 12 * 2 * pi());
    }

    public function impact_from_products($products) {
        foreach ($products as $product) {
            $this->impact_from_product($product);
        }
    }

    public function endIteration() {

        $this->set_temperature($this->get_temperature(1), 0);
        $this->set_temperature(0.0, 1);

        $this->set_GHGS($this->get_GHGS(1), 0);
        $this->set_GHGS(0.0, 1);

        $this->set_NH3($this->get_NH3(1), 0);
        $this->set_NH3(0.0, 1);

        $this->set_PM($this->get_PM(1), 0);
        $this->set_PM(0.0, 1);
    }

    /*
     * Setters
     */

    public function set_GHGS($index) {
        return $this->GHGS[$index];
    }

    public function set_NH3($index) {
        return $this->NH3[$index];
    }

    public function set_PM($index) {
        return $this->PM[$index];
    }

    public function set_temperature($index) {
        return $this->temperature[$index];
    }

    /*
     * Getters
     */

    public function get_GHGS($index) {
        return $this->GHGS[$index];
    }

    public function get_NH3($index) {
        return $this->NH3[$index];
    }

    public function get_PM($index) {
        return $this->PM[$index];
    }

    public function get_temperature($index) {
        return $this->temperature[$index];
    }

}
