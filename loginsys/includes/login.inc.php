<?php

if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if(empty($mailuid) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?"; //placeholders is safer, two options: username OR email
        $stmt = mysqli_stmt_init($conn); //initiate connection through $dbh.inc.php
        if(!mysqli_stmt_prepare($stmt,$sql)){ //test connection, if failed, generate error
            header("Location: ../index.php?error=sqlerror"); //check if theres an error with sql
            exit();
        } else {
            mysqli_stmt_bind_param($stmt,"ss",$mailuid,$password); //pass in parameters from users when they log in
            mysqli_stmt_execute($stmt); //execute the passed stmt statement
            $result = mysqli_stmt_get_result($stmt); //get result for the stmt statement
            if($row = mysqli_fetch_assoc($result)){//check if actually works
                $passwordCheck = password_verify($password,$row['pwdUsers']); //check whether the password hashes match
                if($passwordCheck == false){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                } else if($passwordCheck == true){ //login sucessfull
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    header("Location: ../index.php?login=success");
                    exit();
                } else {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            } else { //if no data from database
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }

} else {
    header("Location: ../index.php");
    exit();
}