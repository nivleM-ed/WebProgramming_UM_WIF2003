<?php

    session_start();
    $_SESSION['result_arr'] = array();
    $json = json_decode(file_get_contents('php://input'), true);
    array_push($_SESSION['result_arr'],$passValues);
    array_push($_SESSION['result_arr'],$passValues);
    $pass = $_POST['passValue'];
    // $userAnswer = $_POST['name'];

    header('Content-Type: application/json');
    // echo json_encode($_SESSION['result_arr']);
    
    $mysqli = new mysqli("localhost", "root", "", "recommendation");

    $sql = "select * from checklist WHERE user_id like '1'";
    $result = $mysqli->query($query);
    $row = mysqli_num_rows($result);
    $result = json_encode($result);
    
    if($row>5){
        $sql = "delete from checklist WHERE user_id like '1'";
        $mysqli->query($sql);
        for($i = $row; $i>=5; $i--){
            $insert = $i-1;
            $sql = "INSERT INTO checklist (user_id , place)
                VALUES ('1', '$result[$insert]');";
            $mysqli->query($sql);
        }
    }

    $sql = "INSERT INTO checklist (user_id , place)
            VALUES ('1', '$pass');";

    if ($mysqli->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $conn->close();
?>