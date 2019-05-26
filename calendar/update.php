<?php
session_start();
include "../includes/dbh_pdo.php";
//update.php

$connect = new PDO('mysql:host=localhost;dbname=planit_database', 'root', '');
$user_id = $_SESSION['userId'];
$id = $_POST['id'];

$query = "SELECT * FROM events WHERE user_id = '$user_id' AND id='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetch();

$start = $result["start_event"];
$end = $result["end_event"];

if(isset($_POST["id"]) && ($_POST['type']=="route"))
{
 $query = "UPDATE events SET title=:title, start_event=:start_event, end_event=:end_event WHERE id=:id";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $start,
   ':end_event' => $end,
   ':id'   => $id
  )
 );
} else {
 $query = "
 UPDATE events 
 SET title=:title, start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>
