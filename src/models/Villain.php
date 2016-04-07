<?php
namespace PowerRangers\Models;

class Villain
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
     * @var Image[]
     */
    public $images;
}