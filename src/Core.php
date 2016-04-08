<?php
namespace PowerRangers;

use GuzzleHttp\Client;
use JsonMapper;

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
     * @param null $model
     * @return mixed
     * @throws \JsonMapper_Exception
     */
    public function get($endpoint, $model=null)
    {
        $response = $this->handle_request(self::GET, $endpoint);

        if ($model) {
            $mapper = new JsonMapper();

            if (is_array($response)) {
                return $mapper->mapArray($response, array(), new $model());
            }

            return $mapper->map($response, new $model());
        }

        return $response;
    }
}