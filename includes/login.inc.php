<?php

if (isset($_POST['signin'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE emailUsers=? OR uidUsers=?"; //placeholders is safer, two options: username OR email
        $stmt = mysqli_stmt_init($conn); //initiate connection through $dbh.inc.php
        if (!mysqli_stmt_prepare($stmt, $sql)) { //test connection, if failed, generate error
            header("Location: ../login.php?error=sqlerror"); //check if theres an error with sql
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $password); //pass in parameters from users when they log in
            mysqli_stmt_execute($stmt); //execute the passed stmt statement
            $result = mysqli_stmt_get_result($stmt); //get result for the stmt statement
            if ($row = mysqli_fetch_assoc($result)) { //check if actually works
                $passwordCheck = password_verify($password, $row['pwdUsers']); //check whether the password hashes match
                if ($passwordCheck == false) {
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                } else if ($passwordCheck == true) { //login sucessfull
                    session_start();
                    $user_id = $row['idUsers'];
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    $query = "SELECT * FROM journey WHERE user_id = $user_id";
                    $stmt = mysqli_query($conn, $query);

                    if (!$stmt) {
                        die('Error: ' . mysqli_error($conn));
                    }

                    if (mysqli_num_rows($stmt) > 0) {
                        header("Location: ../ini_logged.php?login=success");
                    }else {
                        header("Location: ../index_loggedin.php?login=success");
                    exit();
                    }
                } else {
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
            } else { //if no data from database
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
