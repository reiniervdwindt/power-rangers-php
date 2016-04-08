<?php

namespace PowerRangers;

use PowerRangers\Models\Ranger;

class Rangers extends Core
{
    /**
     * @param $id
     * @return object
     * @throws \JsonMapper_Exception
     */
    public function getByID($id)
    {
        return $this->get(sprintf('rangers/%d', $id), Ranger::class);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->get('rangers', Ranger::class);
    }
}