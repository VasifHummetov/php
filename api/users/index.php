<?php

require_once '../alwaysJson.php';
require_once '../database.php';

$users = require_once 'users.php';

$columns = implode(',', $users['columns']);

$sql = "SELECT $columns FROM `users` WHERE deleted_at IS NULL";

$users = [];

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

http_response_code(200);

echo json_encode(['data' => $users]);