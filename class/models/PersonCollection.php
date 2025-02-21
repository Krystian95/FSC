<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Person.php';

/**
 * Collection of Person(s)
 *
 * @author Cristian
 */
class PersonCollection {

    private $step_pop_growth;
    private $step_pop_death;
    private $growth_parameter;
    private $persons;
    private $pop_stab;
    private $max_growth_pop;
    private $tendenza_mangiare_carne;
    private $ricchezza_media;
    private $influenza_differenze_ricchezza;
    private $aleatorieta_preferenze;
    private $n_nati = 0;
    private $n_morti = 0;
    private $tot_prod;
    private $tot_distr_step_health = [];
    private $ind_distr_step_health = [];

    public function __construct($params, $product_collection) {

        $this->tot_prod = $product_collection->n_meat + $product_collection->n_veg;

        $this->tendenza_mangiare_carne = $params['tendenza_mangiare_carne'];
        $this->ricchezza_media = $params['ricchezza_media'];
        $this->influenza_differenze_ricchezza = $params['influenza_differenze_ricchezza'];
        $this->aleatorieta_preferenze = $params['aleatorieta_preferenze'];

        $this->persons = [];
        $this->step_pop_growth = $params['step_nascita_popolazione'];
        $this->step_pop_death = $params['step_morte_popolazione'];
        $this->growth_parameter = $params['rapporto_nascite_salute'];
        $this->pop_stab = $params['valore_salute_stabile'];
        $this->max_growth_pop = $params['massima_crescita_salute'];

        for ($i = 0; $i < $params['popolazione_iniziale']; $i++) {
            $person = $this->generateNewPerson($params, $product_collection);
            array_push($this->persons, $person);
        }

        $this->sortPersonsByWealthDescending($this->persons);
    }

    private function generateNewPerson($params, $product_collection) {

        // TODO replace gauss with gauss real function

        $ricchezza_media = $params['ricchezza_media'];
        $ricchezza_dev_std = $params['ricchezza_dev_stan'];
        $gauss = Utils::rand(($ricchezza_media - $ricchezza_dev_std / 2), ($ricchezza_media + $ricchezza_dev_std / 2));
        $wealth = ($gauss > 0 ? $gauss : 1);

        $salute_media = $params['salute_iniziale_media'];
        $salute_dev_std = $params['salute_iniziale_dev_stan'];
        //error_log('salute_iniziale_media: ' . $salute_media);
        //error_log('salute_iniziale_dev_stan: ' . $salute_dev_std);
        $gauss = Utils::rand(($salute_media - $salute_dev_std / 2), ($salute_media + $salute_dev_std / 2));
        //error_log('gauss: ' . $gauss);
        $health = ($gauss > 0 ? $gauss : 1);
        //error_log('health: ' . $health);

        $fabbisogno_cibo_media = $params['fabbisogno_cibo_media'];
        $fabbisogno_cibo_dev_std = $params['fabbisogno_cibo_dev_stan'];
        $gauss = Utils::rand(($fabbisogno_cibo_media - $fabbisogno_cibo_dev_std / 2), ($fabbisogno_cibo_media + $fabbisogno_cibo_dev_std / 2));
        $fabbisogno_cibo = ($gauss > 0 ? $gauss : 1);

        $person = new Person($params['tendenza_mangiare_carne'], $product_collection, $wealth, $health, $ricchezza_media, $fabbisogno_cibo, $params['influenza_differenze_ricchezza'], $this->tot_prod, $params['aleatorieta_preferenze']);

        return $person;
    }

    private function sortPersonsByWealthDescending(&$persons) {
        usort($persons, ['PersonCollection', 'sort_descending']);
    }

    private function sort_descending($a, $b) {
        return $a->get_wealth() < $b->get_wealth();
    }

    public function endIteration() {

        foreach ($this->persons as $person) {
            $person->set_health($person->get_health(1), 0);
            $person->set_health(0.0, 1);

            $person->set_eaten($person->get_eaten(1), 0);
            $person->set_eaten(0.0, 1);

            $person->set_speso(0.0);
            $person->reset_bought();
        }
    }

    public function getMeanHealth($i = 1) {

        $mean = 0;
        foreach ($this->persons as $person) {
            //error_log('health person: '.$person->get_health(0));
            $mean += $person->get_health($i);
        }

        //error_log('mean: ' . $mean);
        //error_log('n persons: ' . count($this->persons));

        if (count($this->persons) == 0) {
            //error_log('mean_health: ' . 0);
            return 0;
        } else {
            //error_log('mean_health: ' . ($mean / count($this->persons)));
            return $mean / count($this->persons);
        }
    }

    public function grow_pops($product_collection) {

        $new_persons = [];

        foreach ($this->persons as $key => $person) {

            $person->health_evaluate($this->pop_stab, $this->max_growth_pop);

            if ($person->get_health(1) <= $this->step_pop_death) {
                unset($this->persons[$key]); // death
                $this->n_morti++;
            } elseif ($person->get_health(1) >= $this->step_pop_growth) {
                $rand = random_int(0, 100);
                if ($rand <= $this->growth_parameter) {

                    $new_person = new Person($this->tendenza_mangiare_carne, $product_collection, $person->get_wealth(), $birth_health = 50, $this->ricchezza_media, $person->get_food_need(), $this->influenza_differenze_ricchezza, $this->tot_prod, $this->aleatorieta_preferenze);
                    $this->n_nati++;

                    // Evita di aggiungere persone all'array che si sta scorrendo
                    array_push($new_persons, $new_person); // birth
                }
            }
        }

        foreach ($new_persons as $new_person) {
            array_push($this->persons, $new_person);
        }

        $this->sortPersonsByWealthDescending($this->persons);
    }

    public function t_distr_sh() {

        $this->clearKeys($this->tot_distr_step_health);

        $delta = (int) (($this->getMeanHealth(1) - $this->getMeanHealth(0)) * 100);
        if (!isset($this->tot_distr_step_health[$delta])) {
            $this->tot_distr_step_health[$delta] = 0;
        }
        $this->tot_distr_step_health[$delta] ++;

        Utils::sortArrayWithIntegerKeys($this->tot_distr_step_health);
    }

    public function i_distr_sh() {

        $this->clearKeys($this->ind_distr_step_health);

        foreach ($this->persons as $person) {
            $delta = (int) (($person->get_health(1) - $person->get_health(0)) * 100);
            if (!isset($this->ind_distr_step_health[$delta])) {
                $this->ind_distr_step_health[$delta] = 0;
            }
            $this->ind_distr_step_health[$delta] ++;
        }

        Utils::sortArrayWithIntegerKeys($this->ind_distr_step_health);
    }

    private function clearKeys(&$array) {

        foreach ($array as $key => $value) {
            if (Utils::stringContainsSubstring($key, 'Delta')) {
                $new_key = str_replace('Delta', '', $key);
                $array[$new_key] = $value;
                unset($array[$key]);
            }
        }
    }

    /*
     * Getters
     */

    public function get_tot_distr_step_health() {
        return $this->tot_distr_step_health;
    }

    public function get_ind_distr_step_health() {
        return $this->ind_distr_step_health;
    }

    public function getCountNati() {
        return $this->n_nati;
    }

    public function getCountMorti() {
        return $this->n_morti;
    }

    public function getPersons() {
        return $this->persons;
    }

    public function getPerson($index) {
        return $this->persons[$index];
    }

    public function getCountPeople() {
        return count($this->persons);
    }

    /*
     * Setters
     */

    public function setCountNati($n_nati) {
        $this->n_nati = $n_nati;
    }

    public function setCountMorti($n_morti) {
        $this->n_morti = $n_morti;
    }

}
