<?php

require_once '../alwaysJson.php';
require_once '../database.php';

$users = require_once 'users.php';

$columns = implode(',', $users['columns']);


if (isset($_GET['id'])) {

    if ($_SERVER['REQUEST_METHOD'] == "PUT") {
        $data = file_get_contents('php://input');

        parse_str($data, $input);
        $id = $_GET['id'];

        $name = $input['name'];
        $email = $input['email'];
        $password = $input['password'];

        $sql = "UPDATE `users` SET name='$name', `email` = '$email', `password` = '$password' WHERE id=$id";

        if (mysqli_query($connection, $sql)) {

            $sql = "SELECT $columns FROM `users` WHERE `id` = '$id' AND deleted_at IS NULL";

            $result = mysqli_query($connection, $sql);

            $user = mysqli_fetch_assoc($result);

            http_response_code(200);
            echo json_encode(['data' => $user, 'message' => null]);
            return;
        } else {
            http_response_code(500);

            echo json_encode([
                'data' => [],
                'message' => mysqli_error($connection)
            ]);
        }

    }  else {
        http_response_code(405);
        echo json_encode([
            'data' => [],
            'message' => 'METHOD NOT ALLOWED'
        ]);
    }
}

