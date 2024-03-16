<?php

namespace LencoSDK\Lenco;

use Illuminate\Http\Client\RequestException;

trait MakesHttpRequest
{
    protected function get(string $uri, array $payload = []): array
    {
        return $this->request('GET', $uri, $payload);
    }

    protected function post(string $uri, array $payload = []): array
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * Send HTTP Request to Lenco API.
     *
     * @throws RequestException
     */
    protected function request(string $verb, string $uri, array $payload = []): array
    {
        $response = match (strtoupper($verb)) {
            'POST' => $this->client->post($uri, $payload),
            'GET' => $this->client->get($uri, $payload),
            default => throw new \RuntimeException('HTTP verb not supported!')
        };

        return $response->json('data');
    }
}
