<?php

require_once '../alwaysJson.php';
require_once '../database.php';

$users = require_once 'users.php';

$columns = implode(',', $users['columns']);


if ($_SERVER['REQUEST_METHOD'] == "PUT") {
    $data = file_get_contents('php://input');

    parse_str($data, $input);
}