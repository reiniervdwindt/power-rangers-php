<?php
namespace PowerRangers;

use GuzzleHttp\Client;

class Core
{
    /**
     * @var string
     */
    protected $base_uri = 'http://powerapi.blueyes.nl/v1/';

    /**
     * Constants
     */
    const GET = 'GET';

    /**
     * @param string $method
     * @param $endpoint
     * @return mixed
     */
    private function handle_request($method = self::GET, $endpoint)
    {
        $client = new Client(['base_uri' => $this->base_uri]);
        $response = $client->request($method, $endpoint);
        return json_decode($response->getBody()->getContents());
    }

    /**
     * @param $endpoint
     * @return mixed
     */
    public function get($endpoint)
    {
        return $this->handle_request(self::GET, $endpoint);
    }
}