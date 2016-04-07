<?php

namespace PowerRangers;

use JsonMapper;
use PowerRangers\Models\Civilian;

class Civilians extends Core
{
    /**
     * @param $id
     * @return object
     * @throws \JsonMapper_Exception
     */
    public function getByID($id)
    {
        $response = $this->get(sprintf('civilians/%d', $id));
        $mapper = new JsonMapper();
        $civilian = $mapper->map($response, new Civilian());

        return $civilian;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $response =  $this->get('civilians');
        $mapper = new JsonMapper();
        $civilians = $mapper->mapArray($response, array(), new Civilian());

        return $civilians;
    }
}