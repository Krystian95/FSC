<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Person.php';

/**
 * Collection of Person(s)
 *
 * @author Cristian
 */
class PersonCollection {

    private static $n_max_pop = 1000;
    private static $step_pop_growth = 0.8;
    private static $step_pop_death = 0.2;
    private static $growth_parameter = 0.4;
    private $persons;

    public function __construct($product_collection) {

        $this->persons = [];

        for ($i = 0; $i < self::$n_max_pop; $i++) {

            $wealth = random_int(0, 100);
            $deviation_of_preference = 2;
            $tendency = 4;
            $ricchezza_media = 7;

            $person = new Person($deviation_of_preference, $tendency, $product_collection, $wealth, $ricchezza_media);

            $rand = random_int(0, 100);

            $person->set_health($rand, 0);
            $person->set_health($rand, 1);

            array_push($this->persons, $person);
        }
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

        return $mean / count($this->persons);
    }

    public function grow_pops() {

        $new_persons = [];

        foreach ($this->persons as $key => $person) {

            $person->health_evaluate();

            if ($person->get_health(1) <= self::$step_pop_death) {
                unset($this->persons[$key]); // death
            } elseif ($person->get_health(1) >= self::$step_pop_growth) {
                $rand = random_int(0, 100);
                if ($rand >= self::$growth_parameter) {
                    $new_person = new Person();
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
