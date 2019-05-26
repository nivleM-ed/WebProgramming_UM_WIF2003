<?php
session_start();
//delete.php

if(isset($_POST["id"]))
{
    // $connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
    $connect = new PDO('mysql:host=localhost;dbname=planit_database', 'root', '');
 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>