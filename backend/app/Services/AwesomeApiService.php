<?php

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class AwesomeApiService
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://economia.awesomeapi.com.br/json/last',
        ]);
    }

    /**
     * @param string $convertTo
     * @return mixed
     */
    public function getPrice(string $convertTo): mixed
    {
        $response = $this->client->get('/BRL-' . $convertTo);
        return json_decode($response->getBody());
    }
}
