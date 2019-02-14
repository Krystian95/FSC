<?php

/**
 * Collection of Product(s)
 *
 * @author Cristian
 */
class ProductCollection {

    private $products = [];

    public function __construct() {

        $default_products = $this->buildDefaultProducts();

        foreach ($default_products as $default_product_name => $default_product) {

            $product = new Product();

            $product->set_name($default_product_name);
            $product->set_impact_on_GHGS($default_product['impact_on_GHGS']);
            $product->set_impact_on_NH3($default_product['impact_on_NH3']);
            $product->set_impact_on_PM($default_product['impact_on_PM']);
            $product->set_production($default_product['production'], 0);
            $product->set_production($default_product['production'], 1);
            $product->set_capacity($default_product['capacity'], 0);
            $product->set_capacity($default_product['capacity'], 1);
            $product->set_price($default_product['price']);
            $product->set_ideal_temperature($default_product['ideal_temperature']);
            $product->set_tolerance_temperature($default_product['tolerance_temperature']);
            $product->set_sold($default_product['sold'], 0);
            $product->set_sold($default_product['sold'], 1);
            $product->set_type($default_product['type']);
            $product->set_ideal_GHGS($default_product['ideal_GHGS']);
            $product->set_ideal_NH3($default_product['ideal_NH3']);
            $product->set_ideal_PM($default_product['ideal_PM']);
            $product->set_tolerance_GHGS($default_product['tolerance_GHGS']);
            $product->set_tolerance_NH3($default_product['tolerance_NH3']);
            $product->set_tolerance_PM($default_product['tolerance_PM']);

            array_push($this->products, $product);
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
