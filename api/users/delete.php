<?php

require_once '../database.php';

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $id = $_GET['id'];

    $datetime = date('Y-m-d H:i:s', time());

    $sql = "UPDATE `users` SET `deleted_at`='$datetime' WHERE id=$id";

    if (mysqli_query($connection, $sql)) {
        http_response_code(204);
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