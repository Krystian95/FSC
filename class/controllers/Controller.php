<?php

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/System.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Environment.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Person.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/People.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Product.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Products.php';


if (isset($_POST['Action']) && !empty($_POST['Action'])) {

    $action = $_POST['Action'];
    $response = null;

    switch ($action) {
        
        case 'Start' :
            $system = new System();
            $system->setupParams(null);
            $period = $_POST['Data']['Period'];
            $response = $system->iteratePeriod($period);
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
            break;
    }

    echo json_encode($response);
}