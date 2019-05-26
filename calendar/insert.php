<?php
session_start();
//insert.php

// $connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
$connect = new PDO('mysql:host=localhost;dbname=planit_database', 'root', '');

$user_id = $_SESSION['userId'];

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (user_id, title, start_event, end_event) 
 VALUES (:user_id, :title, :start_event, :end_event)
 ";
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


?>
