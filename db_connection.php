<?php

date_default_timezone_set('Asia/Kolkata');

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "esurv";
    // $port = "8080";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}



function CloseCon($conn)
{
    $conn->close();
}