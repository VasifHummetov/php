<?php

$connection = mysqli_connect('localhost', 'vasif', '1234', 'meetset');

if (!$connection) {
    die('MYSQL connection invalid!');
}