<?php

require 'core/init.php';

$sql = "
    SELECT users.user_id, basket.id FROM users
    LEFT JOIN basket ON users.user_id = basket.id
    ";
$book = $mysqli->query("SELECT product_id FROM products");
$results = $mysqli->query($sql);

if ($results->num_rows) {
    while ($row = $results->fetch_object()) {
        echo "{$row->user_id}<br>";
    }
}