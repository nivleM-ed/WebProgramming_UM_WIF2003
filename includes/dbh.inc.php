<?php

$servername = "localhost";
$dbBUsername = "root";
$dBpass = "aina1998";
$dBName = "web";

$conn = mysqli_connect($servername,$dbBUsername,$dBpass,$dBName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error);
}