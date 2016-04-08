<?php

namespace PowerRangers;

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
        return $this->get(sprintf('weapons/%d', $id), Weapon::class);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->get('weapons', Weapon::class);
    }
}