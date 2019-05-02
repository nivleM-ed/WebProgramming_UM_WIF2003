<?php

if(isset($_POST['signup'])){

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){ //if one of the fields are empty
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    } else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invalidmailuid".$username);
        exit();
    } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    } else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invaliduid&email=".$email);
        exit();
    } else if($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordCheck&mail=".$email);
        exit();
    } else {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=? AND pwdUsers=?"; //use placeholders so users cant manipulate database
        $stmt = mysqli_stmt_init($conn); //connected to database
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror"); //check if theres an error with sql
            exit();
        } else {
            mysqli_stmt_bind_param($stmt,"s",$username); //assign username to stmt
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows(); //return number of matching rows
            if($resultCheck > 0){ //if user already exists in database
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            } else { //if user is new, add into database
                $sql = "INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../signup.php?error=sqlerror"); //check if theres an error with sql
                    exit();
                } else {
                    $hashedPwd = password_hash($password,PASSWORD_DEFAULT); //hashing the password
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd); //3 s because 3 parameters
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn); //end the connection
} else {
    header("Location: ../signup.php");
    exit();
}