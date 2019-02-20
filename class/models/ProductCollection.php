<?php

/**
 * Collection of Product(s)
 *
 * @author Cristian
 */
class ProductCollection {

    private $products = [];

    public function __construct($params) {

        //$default_products = $this->buildDefaultProducts();

        $products = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane', 'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];

        foreach ($products as $product) {

            $prefix = $product . '_';

            $new_product = new Product();

            $new_product->set_name($product);
            $new_product->set_type($params[$prefix . 'tipo']);
            $new_product->set_price($params[$prefix . 'prezzo']);

            $new_product->set_capacity($params[$prefix . 'produttivita'], 0);
            $new_product->set_capacity($params[$prefix . 'produttivita'], 1);

            $new_product->set_impact_on_GHGS($params[$prefix . 'impatto_ghgs']);
            $new_product->set_impact_on_PM($params[$prefix . 'impatto_pm']);
            $new_product->set_impact_on_NH3($params[$prefix . 'impatto_nh3']);

            $new_product->set_ideal_GHGS($params[$prefix . 'ghgs_ideale']);
            $new_product->set_tolerance_GHGS($params[$prefix . 'tolleranza_ghgs']);

            $new_product->set_ideal_PM($params[$prefix . 'pm_ideale']);
            $new_product->set_tolerance_PM($params[$prefix . 'tolleranza_pm']);

            $new_product->set_ideal_NH3($params[$prefix . 'nh3_ideale']);
            $new_product->set_tolerance_NH3($params[$prefix . 'tolleranza_nh3']);

            $new_product->set_ideal_temperature($params[$prefix . 'ideal_temperature']);
            $new_product->set_tolerance_temperature($params[$prefix . 'tolerance_temperature']);

            array_push($this->products, $new_product);
        }
    }

    public function getProductTypeByIndex($index) {

        $counter = 0;
        foreach ($this->products as $product) {
            if ($index == $counter) {
                return $product->get_type();
            }
            $counter++;
        }

        return null;
    }

    private function buildDefaultProducts() {

        $products_name = ['Manzo', 'Pollo', 'Maiale', 'Cavallo', 'Tacchino', 'Patate', 'Zucchine', 'Peperoni', 'Melanzane', 'Pomodori', 'Grano', 'Riso', 'Melo', 'Pero', 'Arancio'];
        $products = [];

        foreach ($products_name as $product) {
            $products[$product] = [];
            $products[$product]['impact_on_GHGS'] = 2.0;
            $products[$product]['impact_on_NH3'] = 1.0;
            $products[$product]['impact_on_PM'] = 5.0;
            $products[$product]['production'] = 20.0;
            $products[$product]['capacity'] = 80.0;
            $products[$product]['price'] = 8.0;
            $products[$product]['ideal_temperature'] = 23.0;
            $products[$product]['tolerance_temperature'] = 48.0;
            $products[$product]['sold'] = 7.0;
            $products[$product]['type'] = 'meat';
            $products[$product]['ideal_GHGS'] = 3.0;
            $products[$product]['ideal_NH3'] = 4.0;
            $products[$product]['ideal_PM'] = 5.0;
            $products[$product]['tolerance_GHGS'] = 60.0;
            $products[$product]['tolerance_NH3'] = 60.0;
            $products[$product]['tolerance_PM'] = 60.0;
        }

        return $products;
    }

    public function step_productions($environment) {
        foreach ($this->products as $product) {
            $product->step_production($environment);
        }
    }

    public function growth_evaluations() {
        foreach ($this->products as $product) {
            $product->growth_evaluate();
        }
    }

    public function getProducts() {
        return $this->products;
    }

    public function getProduct($index) {
        return $this->products[$index];
    }

}
