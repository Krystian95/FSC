<?php

if (isset($_POST['action']) && !empty($_POST['action'])) {

    $action = $_POST['action'];
    $response = null;

    switch ($action) {

        case 'test' :

            $response['result_1'] = 123;
            break;
    }

    echo json_encode($response);
}