<?php

require 'core/init.php';


if (empty($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) === true || empty($passwowrd) === true) {
        $errors[] = 'You need to enter a username and password';
    } else if (user_exists($username) === false) {
        $errors[] = 'We can\'t find that username. You havent registered';
    } else if (user_active($username) === false) {
        $errors[] = 'You have not activated your account';
    } else {
        $login = login($username, $passowrd);
        if($login === false)
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
?>