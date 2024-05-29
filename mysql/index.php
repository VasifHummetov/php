<?php

$connection = mysqli_connect('localhost', 'vasif','1234');

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

mysqli_select_db($connection, 'lesson');

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

    $query = insert('users', $_POST);

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

<form action="" method="POST">

    <input type="text" name="firstname" placeholder="Firstname">
    <input type="text" name="lastname" placeholder="lastname">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="a" placeholder="a">
    <textarea name="description" id="" cols="30" rows="10"></textarea>
    <input type="submit">

</form>


</body>
</html>
