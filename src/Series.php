<?php

namespace PowerRangers;

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
        return $this->get(sprintf('series/%d', $id), SeriesModel::class);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->get('series', SeriesModel::class);
    }
}