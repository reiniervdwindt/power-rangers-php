<?php
namespace PowerRangers\Models;

class Weapon
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
    public $type;

    /**
     * @var Ranger
     */
    public $ranger;

    /**
     * @var Image[]
     */
    public $images;
}