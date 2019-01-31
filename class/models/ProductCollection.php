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

        foreach ($default_products as $default_product) {
            $product = new Product();
            $product->set_impact_on_GHGS($default_product['impact_on_GHGS']);
            $product->set_impact_on_NH3($default_product['impact_on_NH3']);
            $product->set_impact_on_PM($default_product['impact_on_PM']);
            $product->set_production($default_product['production'], 0);
            $product->set_production($default_product['production'], 1);

            array_push($this->products, $product);
        }
    }

    private function buildDefaultProducts() {

        $products = [];

        $products['Pollo'] = [];
        $products['Pollo']['impact_on_GHGS'] = 13.0;
        $products['Pollo']['impact_on_NH3'] = 1.0;
        $products['Pollo']['impact_on_PM'] = 5.0;
        $products['Pollo']['production'] = 8.0;

        return $products;
    }

    public function getProducts() {
        return $this->products;
    }

}
