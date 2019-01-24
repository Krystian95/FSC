<?php

/**
 * Description of Environment
 *
 * @author Cristian
 */
class Environment {

    /*
     * Default construct
     */

    public function __construct() {
        
    }

    /*
     * Setup params with provided or by default
     */

    public function setupParams($params) {
        
    }

    /*
     * Compute the period passed (eg. "05/2019").
     * Returns the next period.
     */

    public function iteratePeriod($period) {

        $next_period = $this->calculateNextPeriod($current_period = $period);

        $return['Next_Period'] = $next_period;
        
        $return['Charts']['Chart 1']['Linea 1'] = random_int(0, 500);
        $return['Charts']['Chart 1']['Linea 2'] = random_int(0, 500);
        
        return $return;
    }

    /*
     * Return the next period providing the current.
     * Eg. $current_period = "12/2019" will return $next_period = "01/2020"
     */

    private function calculateNextPeriod($current_period) {

        $explode = explode('/', $current_period);
        $period_current['month'] = (int) $explode[0];
        $period_current['year'] = (int) $explode[1];

        if ($period_current['month'] == 12) {
            $period_next['month'] = '01';
            $period_next['year'] = $period_current['year'] + 1;
        } else {
            $period_next['month'] = $period_current['month'] + 1;
            if ($period_next['month'] < 10) {
                $period_next['month'] = '0' . $period_next['month'];
            }
            $period_next['year'] = $period_current['year'];
        }

        return $period_next['month'] . '/' . $period_next['year'];
    }

}
