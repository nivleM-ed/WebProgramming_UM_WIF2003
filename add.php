<?php

    session_start();
    $_SESSION['result_arr'] = array();
    $json = json_decode(file_get_contents('php://input'), true);
    array_push($_SESSION['result_arr'],$passValues);

    header('Content-Type: application/json');
    echo json_encode($_SESSION['result_arr']);
?>