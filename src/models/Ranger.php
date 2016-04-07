<?php
namespace PowerRangers\Models;

class Ranger
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
    public $color;

    /**
     * @var Weapon
     */
    public $weapon;

    /**
     * @var Zord[]
     */
    public $zords;

    /**
     * @var Image[]
     */
    public $images;
}