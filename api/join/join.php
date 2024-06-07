<?php

require_once '../database.php';

$sql = "SELECT * FROM users INNER JOIN phones ON users.id=phones.user_id";

$result = mysqli_query($connection, $sql);

$all = mysqli_fetch_all($result, MYSQLI_ASSOC);

var_dump($all);