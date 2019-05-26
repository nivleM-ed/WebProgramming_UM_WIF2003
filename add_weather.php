<?php
    session_start();
    include("includes/dbh.inc.php");
    
    $date = serialize($_POST['date']);
    $weather = serialize($_POST['weather']);
    $temp = serialize($_POST['temp']);
    $user_id = $_SESSION['userId'];

    $sql = "SELECT * FROM weather where user_id = '$user_id'";
    $result = $conn->query($sql);
    
    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE weather SET date = '$date', weather = '$weather', temp = '$temp' WHERE user_id = $user_id";

        $result = $conn->query($sql);
        if ($result === false) {
            echo "SQL error:" . $conn->error;
        }
    } else {
        $sql = "INSERT INTO weather(user_id,date, weather,temp) VALUES('$user_id','$date', '$weather', '$temp')";
    
        $result = $conn->query($sql);
        if ($result === false) {
            echo "SQL error:" . $conn->error;
        }
    }
  ?>