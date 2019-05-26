<?php
session_start();
include "../includes/dbh_pdo.php";
//delete.php

if(isset($_POST["id"]))
{
    
    // $connect = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
    $connect = new PDO('mysql:host=localhost;dbname=planit_database', 'root', '');
    $user_id = $_SESSION['userId'];
    $id = $_POST['id'];

    $query = "DELETE from events WHERE id=:id AND user_id=:user_id";
    $statement = $connect->prepare($query);
    $statement->execute(
    array(':id' => $id, ':user_id' => $user_id));
}