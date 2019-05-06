<?php

/**
 * @author Cristian
 */
class Utils {

    public static function rand($min, $max) {
        $rand = (rand(0, 10000) / 10000);
        return $min + $rand * ($max - $min);
    }

    public static function sortArray($array, $key_sort) {

        $ordered = [];
        foreach ($array as $key => $row) {
            $ordered[$key] = $row[$key_sort];
        }

        array_multisort($ordered, SORT_ASC, $array);

        return $ordered;
    }

    public static function round($value) {
        return round($value, 2);
    }

}
