<?php

    session_start();

    include("includes/dbh.inc.php");
    $pass = $_POST['passValue'];

    if ($conn->connect_errno) {
        printf("Connect failed: %s\n", $conn->connect_error);
        exit();
    }
    $user = $_SESSION['userUid'];
    $sql = "select place_id from recommendation WHERE name_place like $pass";
    $result = $conn->query($query);
    $row = $result->fetch_all();

    $placeid = $row[0][0];   //Getting the place id value
    $sql = "INSERT INTO user_recommendation(user_id,place_id) 
            VALUES($user,$placeid)";

       $result = $conn->query($sql);
    $sql = "select place_id from user_recommendation where user_id like $user AND place_id like $placeid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Duplicate Place\n";
        // do something to alert user about non-unique email
     } else {
        $sql = "INSERT INTO user_recommendation(user_id,place_id) 
            VALUES($user,$placeid)";

       $result = $conn->query($sql);
       if ($result === false) {echo "SQL error:".$conn->error;}
     }
    $conn->close();


?>