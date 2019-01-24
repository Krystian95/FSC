<?php

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . '/FSC/class/models/Environment.php';

if (isset($_POST['Action']) && !empty($_POST['Action'])) {

    $action = $_POST['Action'];
    $response = null;

    switch ($action) {
        case 'Start' :
            $environment = new Environment();
            $environment->setupParams(null);
            $period = $_POST['Data']['Period'];
            $response = $environment->iteratePeriod($period);
            $_SESSION['environment'] = serialize($environment);
            break;

        case 'Period_Iteration' :
            $period = $_POST['Data']['Period'];
            $environment = unserialize($_SESSION['environment']);
            $response = $environment->iteratePeriod($period);
            $_SESSION['environment'] = serialize($environment);
            break;

        case 'Stop':
            session_unset();
            break;
    }

    echo json_encode($response);
}