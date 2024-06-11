<?php

namespace vendor;

class Request
{
    protected array $query;
    protected array $request;
    protected array $server;

    public function __construct(array $query = [], array $request = [], array $server = [])
    {
        $this->query = $query;
        $this->request = $request;
        $this->server = $server;
    }

    public static function capture(): self
    {
        return new self($_GET, $_POST, $_SERVER);
    }

    public function all()
    {
        return array_merge($this->query, $this->request);
    }

    public function input(string $key, $default = null)
    {
        return $this->query[$key] ?? $this->request[$key] ?? $default;
    }
}
