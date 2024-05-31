<?php

session_start();

$connection = mysqli_connect('localhost', 'root','');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($connection, 'meetset');

require_once 'helpers.php';

$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

$query = mysqli_query($connection, $sql);

$user = mysqli_fetch_assoc($query);

echo "Xos gelmisen: ". $user['firstname'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="update.php">Yenile</a>

</body>
</html>
