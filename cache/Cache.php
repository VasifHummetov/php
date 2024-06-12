<?php

require_once 'helpers.php';

class Cache
{
    public function remember(string $key, int $ttl, callable $callback)
    {
        $file = storage_path('cache' . DIRECTORY_SEPARATOR . $key . '.php');

        if (file_exists($file)) {
            $data = unserialize(file_get_contents($file));

            if ($data['ttl'] > time()) {
                return $data['data'];
            } else {
                unlink($file);
            }
        }

        $data = [
            'ttl' => time() + $ttl,
            'data' => $callback()
        ];

        $data = serialize($data);

        if (!file_exists($file)) {
            file_put_contents($file, $data);
        }

        return $callback();
    }
}