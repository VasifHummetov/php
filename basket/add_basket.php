<?php

require_once 'helpers.php';

$products = require_once 'db/products.php';

if (!check()) {
    $_SESSION['message'] = "Zəhmət olmasa giriş edin.";
    redirect('login.php');
}

if (isset($_GET['id'])) {

    $product = array_filter($products, function ($product) {
        return $product['id'] == $_GET['id'];
    });

    if (count($product)) {
        $product = array_values($product);

        addBasket($product[0]);
        $_SESSION['message'] = "Səbətə uğurla əlavə edildi.";
    } else {
        $_SESSION['message'] = "Axtarışa uyğun nəticə tapılmadı.";
    }
}

header('Location: index.php');
die;