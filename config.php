<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "esurv";
$con = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} else {
    //echo "Connected succesfull";
}

include("globalfunctions.php");
?>