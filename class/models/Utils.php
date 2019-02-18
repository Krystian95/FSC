<?php

/**
 * Description of Utils
 *
 * @author Cristian
 */
class Utils {

    public static function rand($min, $max) {
        $rand = (rand(0, 10000) / 10000);
        return $min + $rand * $max;
    }

}
