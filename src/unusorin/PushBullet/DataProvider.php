<?php

namespace unusorin\PushBullet;

use Guzzle\Http\Client;

/**
 * Class DataProvider
 *
 * @package unusorin\PushBullet
 * @since   0.1
 */
class DataProvider
{
    private $apiKey = '';

    /**
     * @var Client
     */
    private $client;

    /**
     * Constructor
     *
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client('https://api.pushbullet.com/api/', ['user' => $this->apiKey]);
    }

    /**
     * Do GET request
     *
     * @param string $uri
     *
     * @return \Guzzle\Http\Message\Response
     */
    public function get($uri = '')
    {
        return $this->client->get($uri)->setAuth($this->apiKey)->send();
    }

    /**
     * Do POST request
     *
     * @param string $uri
     * @param array  $postData
     *
     * @return \Guzzle\Http\Message\Response
     */
    public function post($uri, array $postData)
    {
        return $this->client->post($uri, null, $postData)->setAuth($this->apiKey)->send();
    }
}
