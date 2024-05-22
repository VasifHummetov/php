<?php

require_once 'helpers.php';

if (isset($_GET['id'])) {
    $data = [];

    foreach (baskets() as $product) {
        if ($product['id'] != $_GET['id']) {
            $data[] = $product;
        }
    }

    unset($_SESSION['basket']);

    $_SESSION['basket'] = $data;
}

header('Location: baskets.php');
die;