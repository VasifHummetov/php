<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // formdan GET methodu gelir, POST olsaydi POST olub-olmadigini check edecekdik

    $email = $_GET['email']; // GET formdan bize method GET gelir, eger POST gelseydi POST['email'] yazacaqdiq
    $password = $_GET['password'];

    // validasiya edirik

    if (empty(trim($email))) {
        echo 'Email xanasi mecburidir.';
    }

    if (empty(trim($password))) {
        echo 'Password xanasi mecburidir.';
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email duzgun qeyd edilmeyib";
    }

    if (strlen($password) < 5) {
        echo "password must be minimum 5 characters";
    }

    // daha sonra yuxaridaki validasiyalari kecse create, search prosesi bas verecek

}