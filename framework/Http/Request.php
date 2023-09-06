<?php

namespace Framework\Http;

readonly class Request
{

    public function __construct(
        public array $getParams,
        public array $postParams,
        public array $cookies,
        public array $files,
        public array $serverParams,
    ) {
    }

    public static function createFromGlobals(): static
    {
        return new static(
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES,
            $_SERVER);
    }

    public function getPath(): string
    {
        return parse_url($this->serverParams['REQUEST_URI'])['path'];
    }

    public function getMethod()
    {
        return $this->serverParams['REQUEST_METHOD'];
    }


}
