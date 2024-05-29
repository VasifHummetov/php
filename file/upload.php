<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $mimes = [
        'image/jpeg',
        'application/x-php',
        'image/png',
        'application/pdf'
    ];

    $filename = uniqid();

    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    $filename = $filename . '.' . $extension;

    if (in_array($_FILES['file']['type'], $mimes)) {

        if ($_FILES['file']['size'] > 10000000) {
            echo "Fayl hecmi coxdur";
        } else {
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/' . $filename);
                echo "OKEY";
            }
        }

    } else {
        echo "File formati duzgun deyil";
    }

}