<?php

namespace PowerRangers;

use JsonMapper;
use PowerRangers\Models\Villain;

class Villains extends Core
{
    /**
     * @param $id
     * @return object
     * @throws \JsonMapper_Exception
     */
    public function getByID($id)
    {
        $response = $this->get(sprintf('villains/%d', $id));
        $mapper = new JsonMapper();
        $vilain = $mapper->map($response, new Villain());

        return $vilain;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $response = $this->get('villains');
        $mapper = new JsonMapper();
        $villains = $mapper->mapArray($response, array(), new Villain());

        return $villains;
    }
}