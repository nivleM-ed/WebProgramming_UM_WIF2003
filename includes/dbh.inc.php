<?php

$servername = "localhost";
$dbBUsername = "root";
$dBpass = "123";
$dBName = "loginsystem";

$conn = mysqli_connect($servername,$dbBUsername,$dBpass,$dBName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error);
}