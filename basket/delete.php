<?php

require_once 'helpers.php';

if (isset($_GET['id'])) {
    $data = [];

    foreach (baskets() as $products) {
        if ($products['id'] != $_GET['id']) {
            $data[] = $products;
        }
    }

    unset($_SESSION['basket']);

    $_SESSION['basket'] = $data;
}

header('Location: /basket/baskets.php');
die;