<?php

function view(string $blade, array $data = [])
{
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $blade . '.php';

    if (file_exists($file)) {
        extract($data);

        require_once $file;
    } else {
        throw new Exception('File ' . $blade . ' not found');
    }
}