<?php
require 'core/init.php';
$funds = $_POST('funds');
$update = $mysqli->query("UPDATE users SET account_balance = '$funds'");
if($update)
{
    echo 'success';
    header('Location : account.php');
} else {
    echo 'fail';
   header('Location : account.php');
}
