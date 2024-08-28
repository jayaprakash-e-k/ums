<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ums";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection Failed!");
}

?>