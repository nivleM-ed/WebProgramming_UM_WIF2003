<?php 
session_start();
    include 'includes/dbh_pdo.php'; // Database connection

    // //first of all dapatkan dulu berapa banyak item dalam ni
    // $query = "SELECT MAX(item_id) FROM user_checklist";
    // $result = $pdo->prepare($query);
    // $result->execute();

    // $lastId = $result->fetch();

    if($_POST['type']=="add-checklist"){
        try {
        $value = $_POST['value'];
        $user_id = $_SESSION['userId'];

        $query = "INSERT INTO user_checklist (item_name, user_id) VALUES (?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$value,$user_id]);

        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }

    if($_POST['type']=="remove-checklist"){
        try {
        $id = $_POST['id'];
        $user_id = $_SESSION['userId'];

        $query = "DELETE FROM `user_checklist` WHERE `user_checklist`.`item_id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);

        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }
    
    if($_POST['type']=="edit-checklist"){
        try {
        $id = $_POST['id'];
        $value = $_POST['value'];
        $user_id = $_SESSION['userId'];

        $query = "UPDATE `user_checklist` SET `item_name` = ? WHERE `user_checklist`.`item_id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$value,$id]);

        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }

    if($_POST['type']=="check-checklist"){
        try {
        $id = $_POST['id'];
        $value = $_POST['value'];
        $user_id = $_SESSION['userId'];

        $query = "UPDATE `user_checklist` SET `item_status` = ? WHERE `user_checklist`.`item_id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$value,$id]);

        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }
?>