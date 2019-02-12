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

        $products = [];

        $products['Pollo'] = [];
        $products['Pollo']['impact_on_GHGS'] = 13.0;
        $products['Pollo']['impact_on_NH3'] = 1.0;
        $products['Pollo']['impact_on_PM'] = 5.0;
        $products['Pollo']['production'] = 8.0;
        $products['Pollo']['capacity'] = 8.0;
        $products['Pollo']['price'] = 80.0;
        $products['Pollo']['ideal_temperature'] = 23.0;
        $products['Pollo']['tolerance_temperature'] = 48.0;
        $products['Pollo']['sold'] = 7.0;
        $products['Pollo']['type'] = 'meat';
        $products['Pollo']['ideal_GHGS'] = 3;
        $products['Pollo']['ideal_NH3'] = 4;
        $products['Pollo']['ideal_PM'] = 5;
        $products['Pollo']['tolerance_GHGS'] = 3;
        $products['Pollo']['tolerance_NH3'] = 4;
        $products['Pollo']['tolerance_PM'] = 5;

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
