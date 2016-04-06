<?php

namespace PowerRangers;

class Rangers extends Core
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getByID($id)
    {
        return $this->get(sprintf('rangers/%d', $id));
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getAll()
    {
        return $this->get(sprintf('rangers'));
    }
}