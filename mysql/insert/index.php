<?php

$connection = mysqli_connect('localhost', 'root','');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

require_once 'helpers.php';

//$sql = "CREATE DATABASE lesson";

//$query = mysqli_query($connection, $sql);

//if ($query) {
//    echo "Database created successfully";
//} else {
//    echo "Error creating database: " . mysqli_error($connection);
//}


// SELECTING DATABASE

mysqli_select_db($connection, 'meetset');


$charset = mysqli_character_set_name($connection);
//echo "Default character set is: " . $charset;

// Change character set to utf8
//mysqli_set_charset($connection,"utf8");

/*
 * CREATING TABLE
 */

//$sql = "CREATE TABLE users (
//            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//            firstname VARCHAR(255) NOT NULL,
//            lastname VARCHAR(255) NOT NULL,
//            email VARCHAR(50)
//        )";
//
//$query = mysqli_query($connection, $sql);
//
//
//if ($query) {
//    echo "Table created successfully";
//} else {
//    echo "Error creating table: " . mysqli_error($connection);
//}


/*
 *
 * INSERT RESOURCE
 */

//$sql = "
//    INSERT INTO users (`email`, `firstname`,`lastname`)
//    VALUES ('admin@example.com', 'Vasif', 'Hummetov'),
//           ('admin2@example.com', 'A', 'B')
//";
//
//$query = mysqli_query($connection, $sql);
//
//
//if ($query) {
//    echo "Resource created successfully";
//} else {
//    echo "Error creating resource: " . mysqli_error($connection);
//}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    unset($_POST['password_confirmation']);

    $data = array_merge($_POST, ['password' => password_hash($_POST['password'],PASSWORD_BCRYPT)]);

    $query = create('users', $data);

    if ($query) {
        echo "Resource created successfully";
    } else {
        echo "Error creating resource: " . mysqli_error($connection);
    }
}



mysqli_close($connection);

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
<h1>Register</h1>
<form action="" method="POST">
    <input type="text" name="firstname" placeholder="Firstname">
    <input type="text" name="lastname" placeholder="lastname">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password_confirmation" placeholder="Password confirmation">
    <input type="submit">
</form>

</body>
</html>
