<?php
session_start();
include "../includes/dbh_pdo.php";
//insert.php

$connect = new PDO('mysql:host=localhost;dbname=planit_database', 'root', '');

$user_id = $_SESSION['userId'];

$query = "SELECT * FROM events WHERE user_id = '$user_id'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetch();

$start = $result["start_event"];
$end = $result["end_event"];

if(isset($_POST["title"]) && ($_POST['type']=="route"))
{
 $query = "INSERT INTO events (user_id, title, start_event, end_event) VALUES (:user_id, :title, :start_event, :end_event)";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':user_id' => $user_id,
   ':title'  => $_POST['title'],
   ':start_event' => $start,
   ':end_event' => $end
  )
 );
} else {
  $query = "INSERT INTO events (user_id, title, start_event, end_event) VALUES (:user_id, :title, :start_event, :end_event)";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':user_id' => $user_id,
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}
