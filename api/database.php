<?php

$connection = mysqli_connect('localhost', 'root', '', 'lesson');

if (!$connection) {
    die('Connection error'. mysqli_connect_error());
}

//mysqli_close($connection);