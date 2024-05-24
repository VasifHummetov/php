<?php

session_start([
    'cookie_lifetime' => 86400,
    'read_and_close' => false,
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

/**
 * @param $data
 * @return void
 */
function dd($data): void
{
    var_dump($data);
    die;
}

/**
 * @param $data
 * @return void
 */
function dump($data): void
{
    var_dump($data);
}

/**
 * @param string $key
 * @return mixed
 */
function old(string $key): mixed
{
    return $_REQUEST[$key] ?? '';
}

/**
 * Get current user
 * @return array
 */
function auth(): array
{
    $users = require 'db/users.php';

    if (isset($_SESSION['id'])) {

        $user = array_filter($users, function ($user) {
            return $user['id'] == $_SESSION['id'];
        });

        if (count($user)) {
            $user = array_values($user);
            return $user[0];
        }
    }

    return [];
}

/**
 * @return bool
 */
function check(): bool
{
    if (isset($_SESSION['id'])) {
        return true;
    }

    return false;
}

function redirect(string $url)
{
    header('Location: ' . $url);
    die;
}