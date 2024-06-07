<?php

require_once '../database.php';

$sql = "SELECT users.*, phones.phone FROM users RIGHT JOIN phones ON users.id = phones.user_id";

$result = mysqli_query($connection, $sql);

$all = mysqli_fetch_all($result, MYSQLI_ASSOC);

var_dump($all);