<?php 
    include 'config.php';
    if($_POST['type']=="add-checklist"){
        try {
        $value = $_POST['value'];
        $query = "INSERT INTO user_checklist (item_name) VALUES (?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$value]);
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }
    if($_POST['type']=="remove-checklist"){
        try {
        $id = $_POST['id'];
        $query = "SELECT * FROM user_checklist WHERE user_checklist.item_id =" . $id;
        $result = $pdo->prepare($query);
        $result->execute();
        $row = $result->fetch();
        $query = "DELETE FROM `user_checklist` WHERE `user_checklist`.`item_id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        if($row["checklist_id"]!=0){
            $query = "UPDATE `checklist` SET `item_hide` = 0 WHERE `checklist`.`item_id` = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$row["checklist_id"]]);
            
        }
    
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }
    
    if($_POST['type']=="edit-checklist"){
        try {
        $id = $_POST['id'];
        $value = $_POST['value'];
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
        $query = "UPDATE `user_checklist` SET `item_status` = ? WHERE `user_checklist`.`item_id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$value,$id]);
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }
    if($_POST['type']=="addinto-checklist"){
        try {
        $id = $_POST['id'];
        $query = "SELECT * FROM checklist WHERE checklist.item_id =" . $id;
        $result = $pdo->prepare($query);
        $result->execute();
        $row = $result->fetch();
        $query = "INSERT INTO user_checklist (item_name,checklist_id) VALUES (?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$row["item_name"],$id]);
        $query = "UPDATE checklist SET item_hide=1 WHERE item_id=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    }
?>