<?php

namespace PowerRangers;

use JsonMapper;
use PowerRangers\Models\Weapon;

class Weapons extends Core
{
    /**
     * @param $id
     * @return object
     * @throws \JsonMapper_Exception
     */
    public function getByID($id)
    {
        $response = $this->get(sprintf('weapons/%d', $id));
        $mapper = new JsonMapper();
        $weapon = $mapper->map($response, new Weapon());

        return $weapon;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $response = $this->get('weapons');
        $mapper = new JsonMapper();
        $weapons = $mapper->mapArray($response, array(), new Weapon());

        return $weapons;
    }
}