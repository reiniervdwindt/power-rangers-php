<?php

namespace PowerRangers;

class Villains extends Core
{
    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getByID($id)
    {
        return $this->get(sprintf('villains/%d', $id));
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getAll()
    {
        return $this->get(sprintf('villains'));
    }
}