<?php

/**
 * Collection of Product(s)
 *
 * @author Cristian
 */
class Products {

    private $products = [];

    public function __construct() {

        $default_products = $this->buildDefaultProducts();

        foreach ($default_products as $product_name) {
            $product = new Product();
            $product->set_impact_on_GHGS($product[$product_name]['impact_on_GHGS']);
            $product->set_impact_on_NH3($product[$product_name]['impact_on_NH3']);
            $product->set_impact_on_PM($product[$product_name]['impact_on_PM']);
            $product->set_production($product[$product_name]['production'], 0);
            $product->set_production($product[$product_name]['production'], 1);

            array_push($this->products, $product);
        }
    }

    private function buildDefaultProducts() {

        $products = [];

        $products['Pollo'] = [];
        $products['Pollo']['impact_on_GHGS'] = 0.0;
        $products['Pollo']['impact_on_NH3'] = 0.0;
        $products['Pollo']['impact_on_PM'] = 0.0;
        $products['Pollo']['production'] = 0.0;

        return $products;
    }
    
    public function getProducts() {
        return $this->products;
    }

}
