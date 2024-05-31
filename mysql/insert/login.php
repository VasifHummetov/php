<?php

session_start();

$connection = mysqli_connect('localhost', 'root','');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($connection, 'meetset');

require_once 'helpers.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    /*
     * EMAIL required, email, hemin email users tablosunda varmi yoxsa yoxmu?
     * min: 3
     */

    /*
     * password min: 6 symbol
     */

    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email='$email'";

    $query = mysqli_query($connection, $sql);

    if (mysqli_num_rows($query) > 0) {

        $user = mysqli_fetch_assoc($query);

        if (!password_verify($_POST['password'], $user['password'])) {
            echo "User Not Found";
        } else {
            $_SESSION['id'] = $user['id'];

            header('Location: dashboard.php');

            die;
        }
    } else {
        echo "User Not found";
    }
}

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

<form action="" method="POST">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit">
</form>

</body>
</html>
