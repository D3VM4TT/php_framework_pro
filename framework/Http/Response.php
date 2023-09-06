<?php

namespace Framework\Http;

class Response
{


    /**
     * @param string $body
     * @param int $status
     * @param array $headers
     */
    public function __construct(private ?string $body = '', private ?int $status = 200, private ?array $headers = [])
    {

    }

    public function send()
    {
        echo $this->body;
    }
}
