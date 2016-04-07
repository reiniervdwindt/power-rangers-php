<?php

namespace PowerRangers;

use JsonMapper;
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
        $response = $this->get(sprintf('rangers/%d', $id));
        $mapper = new JsonMapper();
        $ranger = $mapper->map($response, new Ranger());

        return $ranger;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $response = $this->get('rangers');
        $mapper = new JsonMapper();
        $rangers = $mapper->mapArray($response, array(), new Ranger());

        return $rangers;
    }
}