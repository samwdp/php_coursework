<?php
$username_check = $mysqli->query("SELECT COUNT(user_id) FROM users WHERE username = '$username'");
$username_and_active = $mysqli->query("SELECT COUNT(user_id) FROM users WHERE username ='$username' AND active = 1");
$username_from_id = $mysqli->query("SELECT user_id FROM users WHERE username = '$username'");
$username_and_password = $mysqli->query("SELECT COUNT(user_id) FROM users WHERE username='$username' AND password='$password'");

function user_exists($username) {
    $username = sanitize($username);
    global $username_check;
    $obj = $username_check->fetch_object();
    return ($obj);
}

function user_active($username) {
    $username = sanitize($username);
    global $username_and_active;
    $obj = $username_and_active->fetch_object();
    return ($obj);
}

function user_id_from_username($username) {
    $username = sanitize($username);
    global $username_from_id;
    $obj = $username_from_id->fetch_object();
    return ($obj);
}

function login($username, $password) {
    $user_id = user_id_from_username($username);
    $username = sanitize($username);
    $password = md5($password);
    global $username_and_password;
    $obj = $username_and_password->fetch_object();
    return ($obj);
}
