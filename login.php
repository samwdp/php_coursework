<?php
require 'core/init.php';

$username_check = $mysqli->query("SELECT COUNT(user_id) FROM users WHERE username = '$username'");
$username_and_active = $mysqli->query("SELECT COUNT(user_id) FROM users WHERE username ='$username' AND active = 1");
$username_from_id = $mysqli->query("SELECT user_id FROM users WHERE username = '$username'");
$username_and_password = $mysqli->query("SELECT COUNT(user_id) FROM users WHERE username='$username' AND password='$password'");

if (empty($_POST) === FALSE) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) === TRUE || empty($passwowrd) === TRUE) {
        $errors[] = 'You need to enter a username and password';
    } else if (user_exists($username) === FALSE) {
        $errors[] = 'We can\'t find that username. You havent registered';
    } else if (user_active($username) === FALSE) {
        $errors[] = 'You have not activated your account';
    } else {
        $login = login($username, $passowrd);
        if($login === FALSE)
        {
            $errors[] = 'That username and password is incorrect';
        } else
        {
            $_SESSION['user_id'] = $login;
            header('Location: index.php');
            exit();
        }
    }

    print_r($errors);
}