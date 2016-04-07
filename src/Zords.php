<?php

namespace PowerRangers;

use JsonMapper;
use PowerRangers\Models\Zord;

class Zords extends Core
{
    /**
     * @param $id
     * @return object
     * @throws \JsonMapper_Exception
     */
    public function getByID($id)
    {
        $response = $this->get(sprintf('zords/%d', $id));
        $mapper = new JsonMapper();
        $zord = $mapper->map($response, new Zord());

        return $zord;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $response = $this->get('zords');
        $mapper = new JsonMapper();
        $zords = $mapper->mapArray($response, array(), new Zord());

        return $zords;
    }
}