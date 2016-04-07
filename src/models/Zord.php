<?php
namespace PowerRangers\Models;

class Zord
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $type;

    /**
     * @var Image[]
     */
    public $images;

    /**
     * @var array
     */
    public $modes;

    /**
     * @var Zord[]
     */
    public $parts;

    /**
     * @var Ranger[]
     */
    public $pilots;
}