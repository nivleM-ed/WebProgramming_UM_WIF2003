<?php
session_start();
include("includes/dbh.inc.php");

$place_id = $_POST['passValue'];
$user_id = $_SESSION['userId'];
// $place_id = 342;
// $user_id = 36;

$sql = "SELECT place_id FROM user_recommendation WHERE user_id LIKE '$user_id' AND place_id LIKE '$place_id'";
$result = $conn->query($sql);

// $sql = "INSERT INTO user_recommendation (user_id, place_id)
//         VALUES ('344', '33')";
// $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    echo "Duplicate Place\n";
} else {
    $sql = "INSERT INTO user_recommendation(user_id,place_id) 
            VALUES('$user_id','2')";

    $result = $conn->query($sql);
    if ($result === false) {
        echo "SQL error:" . $conn->error;
    }
}

