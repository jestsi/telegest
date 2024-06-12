<?php

namespace Gest\Telegest\core;

use Gest\Telegest\Config;
use Gest\Telegest\interfaces\RequestInterface;
use GuzzleHttp\Client;

class Request implements RequestInterface
{
    private static $instance;
    private Client $client;
    private string $apiUrl;

    private function __construct(string $token)
    {
        $this->client = new Client();
        $this->apiUrl = "https://api.telegram.org/bot{$token}/";
    }

    public static function getInstance() : Request
    {
        $token = Config::getInstance()->get('token');
        if (self::$instance === null) {
            if (!$token) throw new \InvalidArgumentException('$token was required for first init, pls set in Gest\Telegest\Config token');
            self::$instance = new self($token);
        }
        return self::$instance;
    }

    public function send($method, $params = [])
    {
        return new \React\Promise\Promise(function(callable $resolve, callable $reject) use ($method, $params){
            $resolve(json_decode($this->client->post($this->apiUrl . $method, [
                'json' => $params
            ])->getBody()->getContents(), true));
        });
    }
}