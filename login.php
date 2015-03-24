<?php
require 'core/init.php';

//if (empty($_POST) === FALSE) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) === TRUE || empty($passwowrd) === TRUE) {
        $errors[] = 'You need to enter a username and password';
    } else
    if (user_exists($username) === FALSE) {
        $errors[] = 'We can\'t find that username. You havent registered';
    } else if (user_active($username) === FALSE) {
        $errors[] = 'You have not activated your account';
    } else {
        $login = login($username, $passowrd);
        if ($login === FALSE) {
            $errors[] = 'That username and password is incorrect';
        } else {
            $_SESSION['user_id'] = $login;
            header('Location: account.php');
            exit();
        }
    }

    print_r($errors);
//}