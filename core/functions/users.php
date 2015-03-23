<?php
$username_check = $mysqli->query("SELECT COUNT(user_id) FROM users WHERE username = '$username'");
$username_and_active = $mysqli->query("SELECT COUNT(user_id) FROM users WHERE username ='$username' AND active = 1");
$username_from_id = $mysqli->query("SELECT user_id FROM users WHERE username = '$username'");
$username_and_password = $mysqli->query("SELECT COUNT(user_id) FROM users WHERE username='$username' AND password='$password'");


function user_exists($username, $username_check) {
    $username = sanitize($username);
    $obj = $username_check->fetch_object();
    return ($obj);
}

function user_active($username, $username_and_active) {
    $username = sanitize($username);
    $obj = $username_and_active->fetch_object();
    return ($obj);
}

function user_id_from_username($username, $username_from_id) {
    $username = sanitize($username);
    $obj = $username_from_id->fetch_object();
    return ($obj);
}

function login($username, $password, $username_and_password) {
    $user_id = user_id_from_username($username);
    $username = sanitize($username);
    $password = md5($password);

    $obj = $username_and_password->fetch_object();
    return ($obj);
}
