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

    public function __construct($params, $product_collection) {

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
        $gauss = Utils::rand(($salute_media - $salute_dev_std / 2), ($salute_media + $salute_dev_std / 2));
        $health = ($gauss > 0 ? $gauss : 1);

        $fabbisogno_cibo_media = $params['fabbisogno_cibo_media'];
        $fabbisogno_cibo_dev_std = $params['fabbisogno_cibo_dev_stan'];
        $gauss = Utils::rand(($fabbisogno_cibo_media - $fabbisogno_cibo_dev_std / 2), ($fabbisogno_cibo_media + $fabbisogno_cibo_dev_std / 2));
        $fabbisogno_cibo = ($gauss > 0 ? $gauss : 1);

        $person = new Person($params['tendenza_mangiare_carne'], $product_collection, $wealth, $health, $ricchezza_media, $fabbisogno_cibo, $params['influenza_differenze_ricchezza']);

        $rand = random_int(0, 100);

        $person->set_health($rand, 0);
        $person->set_health($rand, 1);

        return $person;
    }

    private function sortPersonsByWealthDescending(&$persons) {

        usort($persons, 'my_sort_function');

        function my_sort_function($a, $b) {
            return $a['wealth'] < $b['wealth'];
        }

    }

    public function endIteration() {

        foreach ($this->persons as $person) {
            $person->set_health($person->get_health(1), 0);
            $person->set_health(0.0, 1);

            $person->set_eaten($person->get_eaten(1), 0);
            $person->set_eaten(0.0, 1);

            $person->set_speso(0.0);
        }
    }

    public function getMeanHealth() {

        $mean = 0;
        foreach ($this->persons as $person) {
            $mean += $person->get_health(1);
        }

        /* error_log($mean);
          error_log(count($this->persons)); */

        if (count($this->persons) == 0) {
            return 0;
        } else {
            return $mean / count($this->persons);
        }
    }

    public function grow_pops($product_collection) {

        $new_persons = [];

        foreach ($this->persons as $key => $person) {

            $person->health_evaluate($this->pop_stab, $this->max_growth_pop);

            if ($person->get_health(1) <= $this->step_pop_death) {
                unset($this->persons[$key]); // death
            } elseif ($person->get_health(1) >= $this->step_pop_growth) {
                $rand = random_int(0, 100);
                if ($rand >= $this->growth_parameter) {
                    //$new_person = $this->generateNewPerson($product_collection);
                    $new_person = new Person($params['tendenza_mangiare_carne'], $product_collection, $person->get_wealth(), $birth_health=50, $ricchezza_media, $person->get_food_need(), $params['influenza_differenze_ricchezza']);
                  
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

    public function getPersons() {
        return $this->persons;
    }

    public function getPerson($index) {
        return $this->persons[$index];
    }

    public function getCountPeople() {
        return count($this->persons);
    }

}
