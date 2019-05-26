<?php

if (isset($_POST['reset-request-submit'])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "create-new-password.php?selector=".$selector."&validator=".bin2hex($token);

    $expires = date("U") + 2000;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        printf("Connect failed: %s\n", $conn->error);
        echo "There was a connection error.";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error.";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close();

    $to = $userEmail;
    $subject = 'Reset your password for TripIt';
    $message = '<p>We received a password request, the link to reset your password is given below, you can ignore this email if you did not make the request.</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="'.$url.'">'.$url.'</a></p>';

    $headers = "From: TripIt <tripit@gmail.com\r\n";
    $headers .= "Reply-To: tripit@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=success");

} else {

    header("Location: ../index.php");

}