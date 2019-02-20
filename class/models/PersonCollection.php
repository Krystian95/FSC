<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Person.php';

/**
 * Collection of Person(s)
 *
 * @author Cristian
 */
class PersonCollection {
    
    private static $step_pop_growth = 0.8;
    private static $step_pop_death = 0.2;
    private static $growth_parameter = 0.4;
    private $persons;

    public function __construct($params, $product_collection) {

        $this->persons = [];

        for ($i = 0; $i < $params['popolazione_iniziale']; $i++) {
            $person = $this->generateNewPerson($params, $product_collection);
            array_push($this->persons, $person);
        }
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

        $tendency = $params['tendenza_mangiare_carne'];

        $person = new Person($tendency, $product_collection, $wealth, $health, $ricchezza_media, $fabbisogno_cibo);

        $rand = random_int(0, 100);

        $person->set_health($rand, 0);
        $person->set_health($rand, 1);

        return $person;
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

            $person->health_evaluate();

            if ($person->get_health(1) <= self::$step_pop_death) {
                unset($this->persons[$key]); // death
            } elseif ($person->get_health(1) >= self::$step_pop_growth) {
                $rand = random_int(0, 100);
                if ($rand >= self::$growth_parameter) {

                    $new_person = $this->generateNewPerson($product_collection);

                    // Evita di aggiungere persone all'array che si sta scorrendo
                    array_push($new_persons, $new_person); // birth
                }
            }
        }

        foreach ($new_persons as $new_person) {
            array_push($this->persons, $new_person);
        }
    }

}
