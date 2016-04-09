<?php

namespace PowerRangers;

use PowerRangers\Models\Monster;

class Monsters extends Core
{
    /**
     * @param $id
     * @return object
     * @throws \JsonMapper_Exception
     */
    public function getByID($id)
    {
        return $this->get(sprintf('monsters/%d', $id), Monster::class);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->get('monsters', Monster::class);
    }
}