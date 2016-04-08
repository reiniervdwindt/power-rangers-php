<?php

namespace PowerRangers;

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
        return $this->get(sprintf('zords/%d', $id), Zord::class);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->get('zords', Zord::class);
    }
}