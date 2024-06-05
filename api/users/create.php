<?php

require_once '../database.php';

$users = require_once 'users.php';

$columns = implode(',', $users['columns']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // VALIDATION writing status code 422,

    $error = [];

    if (!isset($_REQUEST['firstname']) || empty(trim($_REQUEST['firstname']))) {
        $error['firstname'][] = "firstname field is required";
    }

    if (!isset($_REQUEST['lastname']) || empty(trim($_REQUEST['lastname']))) {
        $error['lastname'][] = "lastname field is required";
    }


    if (!isset($_REQUEST['email']) || empty(trim($_REQUEST['email']))) {
        $error['email'][] = "Email field is required";
    }

    if (!isset($_REQUEST['email']) || !filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'][] = "Email field is invalid";
    }

    if (!isset($_REQUEST['password']) || empty(trim($_REQUEST['password']))) {
        $error['password'][] = "Password field is required";
    }

    if (!isset($_REQUEST['firstname']) || mb_strlen($_REQUEST['firstname'], 'UTF-8') < 3) {
        $error['firstname'][] = "firstname field minimum length must be 3 symbol";
    }

    if (count($error)) {
        http_response_code(422);
        echo json_encode($error);
        return;
    }

    $firstname = mysqli_real_escape_string($connection, $_REQUEST['firstname']);
    $password = mysqli_real_escape_string($connection, password_hash($_REQUEST['password'], PASSWORD_BCRYPT));
    $email = mysqli_real_escape_string($connection, $_REQUEST['email']);
    $lastname = mysqli_real_escape_string($connection, $_REQUEST['lastname']);


    $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`) 
            VALUES ('$firstname', '$lastname', '$email', '$password')";

    if (mysqli_query($connection, $sql)) {
        $last_id = mysqli_insert_id($connection);

        $sql = "SELECT $columns FROM `users` WHERE `id` = '$last_id' AND deleted_at IS NULL";

        $result = mysqli_query($connection, $sql);

        $user = mysqli_fetch_assoc($result);

        http_response_code(200);
        echo json_encode(['data' => $user]);
        return;
    } else {
        http_response_code(500);

        echo json_encode([
            'data' => [],
            'message' => mysqli_error($connection)
        ]);
    }

} else {
    http_response_code(405);
    echo json_encode([
        'data' => [],
        'message' => 'METHOD NOT ALLOWED'
    ]);
}
