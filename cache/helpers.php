<?php

use JetBrains\PhpStorm\Pure;

require_once 'Cache.php';

/**
 * @param string $key
 * @param int|float $ttl zaman araligi
 * @param callable $callback function
 */

//function cache(string $key, int|float $ttl, callable $callback)
//{
//    $file = storage_path('cache' . DIRECTORY_SEPARATOR . $key . '.php');
//
//    if (file_exists($file)) {
//        $data = unserialize(file_get_contents($file));
//
//        if ($data['ttl'] > time()) {
//            return $data['data'];
//        } else {
//            unlink($file);
//        }
//    }
//
//    $data = [
//        'ttl' => time() + $ttl,
//        'data' => $callback()
//    ];
//
//    $data = serialize($data);
//
//    if (!file_exists($file)) {
//        file_put_contents($file, $data);
//    }
//
//    return $callback();
//}

/**
 * @return Cache
 */
function cache(): Cache
{
    return new Cache();
}

/**
 * @param string $file
 * @return string
 */
function storage_path(string $file): string
{
    return __DIR__ . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $file;
}

/**
 * @param string $key
 * @return void
 */
function cache_clear(string $key): void
{
    $file = storage_path('cache' . DIRECTORY_SEPARATOR . $key . '.php');

    if (file_exists($file)) {
        unlink($file);
    }
}