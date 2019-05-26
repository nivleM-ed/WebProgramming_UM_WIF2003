<?php
//including the database connection file
include("../includes/dbh.inc.php");

//getting id of the data from url
$id = $_GET['id'];
echo $id;

//deleting the row from table
$query = "DELETE FROM user_recommendation WHERE place_id=$id";
$result = $conn->query($query);
// $result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:../calendar.php");
?>
