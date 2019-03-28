<?php

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Utils.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/System.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Environment.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Person.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/PersonCollection.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Product.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/ProductCollection.php';


if (isset($_POST['Action']) && !empty($_POST['Action'])) {

    ini_set('memory_limit', '2048M');

    //error_log("real: " . (memory_get_usage() / 1024 / 1024) . " MiB");

    $action = $_POST['Action'];
    $response = null;

    switch ($action) {

        case 'Start' :

            $params = $_POST['Data']['Params'];

            /* foreach ($params as $key => $value) {
              error_log($key . ': ' . $value);
              }
              exit; */

            $system = new System($params);

            $period = $_POST['Data']['Period'];
            $response = $system->getInitialValues($period);
            
            $_SESSION['system'] = serialize($system);
            break;

        case 'Period_Iteration' :

            $period = $_POST['Data']['Period'];
            $system = unserialize($_SESSION['system']);
            $response = $system->iteratePeriod($period);
            $_SESSION['system'] = serialize($system);
            break;

        case 'Stop':

            session_unset();
            session_destroy();
            break;
    }

    echo json_encode($response);
}