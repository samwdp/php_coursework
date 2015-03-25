<?php #  - db_connect.php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "coursework";

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

if($mysqli->connect_errno > 0){
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}