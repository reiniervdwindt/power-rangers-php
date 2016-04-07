<?php

namespace PowerRangers;

use JsonMapper;
use PowerRangers\Models\Series as SeriesModel;

class Series extends Core
{
    /**
     * @param $id
     * @return object
     * @throws \JsonMapper_Exception
     */
    public function getByID($id)
    {
        $response = $this->get(sprintf('series/%d', $id));
        $mapper = new JsonMapper();
        $series = $mapper->map($response, new SeriesModel());

        return $series;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $response = $this->get('series');
        $mapper = new JsonMapper();
        $series = $mapper->mapArray($response, array(), new SeriesModel());

        return $series;
    }
}