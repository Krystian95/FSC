<?php

/**
 * Collection of Product(s)
 *
 * @author Cristian
 */
class ProductCollection {

    public $n_meat;
    public $n_veg;
    private $products = [];
    private $prod_stab;
    private $max_growth_prod;
    private $default_products = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane', 'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];
    private $mode_random_params = false;

    public function __construct($params) {

        $this->prod_stab = $params['valore_capacita_stabile'];
        $this->max_growth_prod = $params['massima_crescita_capacita'];

        $this->mode_random_params = (isset($params['selectModProd']) && $params['selectModProd'] == '1') ? true : false;

        if ($this->mode_random_params) {

            $n_products = $params['numero_prodotti'];
            $percent_type = $params['percentuale_carne_vegetali'];

            $this->n_meat = round($n_products / 100 * $percent_type);
            $this->n_veg = $n_products - $this->n_meat;

            for ($i = 0; $i < $n_products; $i++) {

                $new_product = new Product();

                $new_product->set_name('Prodotto ' . $i);

                if ($i < $this->n_veg) {
                    $tipo = 'veg';
                } else {
                    $tipo = 'meat';
                }

                $new_product->set_type($tipo);

                $prefix = $tipo . '_';

                $price = Utils::rand($params[$prefix . 'prezzo_min'], $params[$prefix . 'prezzo_max']);
                $new_product->set_price($price);

                $capacity = Utils::rand($params[$prefix . 'produttivita_min'], $params[$prefix . 'produttivita_max']);
                $new_product->set_capacity($capacity, 0);
                $new_product->set_capacity($capacity, 1);

                $impact_on_GHGS = Utils::rand($params[$prefix . 'impatto_ghgs_min'], $params[$prefix . 'impatto_ghgs_max']);
                $new_product->set_impact_on_GHGS($impact_on_GHGS);

                $impact_on_PM = Utils::rand($params[$prefix . 'impatto_pm_min'], $params[$prefix . 'impatto_pm_max']);
                $new_product->set_impact_on_PM($impact_on_PM);

                $impact_on_NH3 = Utils::rand($params[$prefix . 'impatto_nh3_min'], $params[$prefix . 'impatto_nh3_max']);
                $new_product->set_impact_on_NH3($impact_on_NH3);

                $ideal_GHGS = Utils::rand($params[$prefix . 'ideal_ghgs_min'], $params[$prefix . 'ideal_ghgs_max']);
                $new_product->set_ideal_GHGS($ideal_GHGS);

                $tolerance_GHGS = Utils::rand($params[$prefix . 'toll_infl_prod_ghgs_min'], $params[$prefix . 'toll_infl_prod_ghgs_max']);
                $new_product->set_tolerance_GHGS($tolerance_GHGS);

                $ideal_PM = Utils::rand($params[$prefix . 'ideal_pm_min'], $params[$prefix . 'ideal_pm_max']);
                $new_product->set_ideal_PM($ideal_PM);

                $tolerance_PM = Utils::rand($params[$prefix . 'toll_infl_prod_pm_min'], $params[$prefix . 'toll_infl_prod_pm_max']);
                $new_product->set_tolerance_PM($tolerance_PM);

                $ideal_NH3 = Utils::rand($params[$prefix . 'ideal_nh3_min'], $params[$prefix . 'ideal_nh3_min']);
                $new_product->set_ideal_NH3($ideal_NH3);

                $tolerance_NH3 = Utils::rand($params[$prefix . 'toll_infl_prod_nh3_min'], $params[$prefix . 'toll_infl_prod_nh3_max']);
                $new_product->set_tolerance_NH3($tolerance_NH3);

                $ideal_temperature = Utils::rand($params[$prefix . 'ideal_temp_min'], $params[$prefix . 'ideal_temp_max']);
                $new_product->set_ideal_temperature($ideal_temperature);

                $tolerance_temperature = Utils::rand($params[$prefix . 'toll_infl_prod_temp_min'], $params[$prefix . 'toll_infl_prod_temp_max']);
                $new_product->set_tolerance_temperature($tolerance_temperature);

                array_push($this->products, $new_product);
            }
        } else {

            $this->n_meat = 5;
            $this->n_veg = 10;

            foreach ($this->default_products as $product) {

                $prefix = $product . '_';

                $new_product = new Product();

                $new_product->set_name(ucwords($product));
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

                $new_product->set_ideal_temperature($params[$prefix . 'temperatura_ideale']);
                $new_product->set_tolerance_temperature($params[$prefix . 'tolleranza_temperatura']);

                array_push($this->products, $new_product);
            }
        }

        $this->sortProductsByPriceAscending($this->products);
    }

    private function sortProductsByPriceAscending(&$products) {
        usort($products, ['ProductCollection', 'sort_ascending']);
    }

    private function sort_ascending($a, $b) {
        return $a->get_price() < $b->get_price();
    }

    public function endIteration() {

        foreach ($this->products as $product) {
            $product->set_production($product->get_production(1), 0);
            $product->set_production(0.0, 1);

            $product->set_capacity($product->get_capacity(1), 0);
            $product->set_capacity(0.0, 1);

            $product->set_sold($product->get_sold(1), 0);
            $product->set_sold(0.0, 1);
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
            $product->growth_evaluate($this->prod_stab, $this->max_growth_prod);
        }
    }

    public function getProducts() {
        return $this->products;
    }

    public function getNProducts() {
        return sizeof($this->products);
    }

    public function getDefaultProducts() {
        return $this->default_products;
    }

    public function getModeRandomParams() {
        return $this->mode_random_params;
    }

    public function getProduct($index) {
        return $this->products[$index];
    }

    public function getProductByName($product_name) {

        foreach ($this->getProducts() as $product) {
            if ($product->get_name() == $product_name) {
                return $product;
            }
        }
        return null;
    }

}
