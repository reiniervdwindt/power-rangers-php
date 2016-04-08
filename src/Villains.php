<?php

namespace PowerRangers;

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
        return $this->get(sprintf('villains/%d', $id), Villain::class);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->get('villains', Villain::class);
    }
}