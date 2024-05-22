<?php

session_start([
    'cookie_lifetime' => 86400,
    'read_and_close'  => false,
]);

/**
 * @param array $product
 * @return bool
 */
function addBasket(array $product): bool
{
    $basket = $_SESSION['basket'] ?? [];

    $basket[] = $product;

    unset($_SESSION['basket']);


    $_SESSION['basket'] = $basket;

    return true;
}

/**
 * @return array
 */
function baskets(): array
{
    $data = [];

    foreach ($_SESSION['basket'] ?? [] as $basket) {
        if (isset($data[$basket['id']])) {
            $data[$basket['id']] = [
                'id' => $basket['id'],
                'title' => $basket['title'],
                'count' => $data[$basket['id']]['count'] + 1,
                'price' => $basket['price']
            ];
        } else {
            $data[$basket['id']] = [
                'id' => $basket['id'],
                'title' => $basket['title'],
                'count' => 1,
                'price' => $basket['price']
            ];
        }
    }

    return $data;
}

function dd($data)
{
    print_r($data);
    die;
}