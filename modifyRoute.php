<?php 
session_start();
    include 'includes/dbh_pdo.php'; // Database connection
    include 'config.php';


    if($_POST['type']=="tambah"){
        try {
        $value = $_POST['value'];
        $user_id = $_SESSION['userId'];

        $query = "INSERT INTO events (title) VALUES (?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$value]);
        array(
            'title'  => $_POST['title'],
            //':start_event' => $_POST['start'],
            //':end_event' => $_POST['end']
           )
          );
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }

    if($_POST['type']=="buang"){
        try {
        $id = $_POST['id'];
        $user_id = $_SESSION['userId'];

        $query = "DELETE FROM `events` WHERE `events`.`id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
//guna id ke?
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }
    
    if($_POST['type']=="edit"){
        try {
        $id = $_POST['id'];
        $value = $_POST['value'];
        $user_id = $_SESSION['userId'];

        $query = "UPDATE `events` SET `title` = ? WHERE `events`.`id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$value,$id]);

        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }
?>