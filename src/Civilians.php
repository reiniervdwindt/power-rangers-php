<?php

namespace PowerRangers;

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
        return $this->get(sprintf('civilians/%d', $id), Civilian::class);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->get('civilians', Civilian::class);
    }
}