<?php

session_start();

$connection = mysqli_connect('localhost', 'root', '');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($connection, 'meetset');

require_once 'helpers.php';

$user = first('users', $_SESSION['id']);


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = [
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'email' => $_POST['email'],
        'updated_at' => date('Y-m-d H:i:s', time())
    ];

    if (strlen($_POST['password']) > 1) {
        $data = array_merge($data, ['password' => password_hash($_POST['password'], PASSWORD_BCRYPT)]);
    }

//    SELECT * FROM Countries
//        WHERE city IN (SELECT id FROM Countries WHERE dintance > 5km);

    $query = update(
        table: 'users',
        condition: ['id' => $_SESSION['id']],
        data: $data
    );

    if ($query) {
        echo "Məlumat uğurla yeniləndi";
        header('Location: update.php');
    } else {
        echo "ERRORRR";
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
    <input type="text" name="firstname" placeholder="Firstname" value="<?= $user['firstname'] ?>">
    <input type="text" name="lastname" placeholder="lastname" value="<?= $user['lastname'] ?>">
    <input type="text" name="email" placeholder="Email" value="<?= $user['email'] ?>">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password_confirmation" placeholder="Password confirmation">
    <input type="submit">
</form>

</body>
</html>
