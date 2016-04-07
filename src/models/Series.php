<?php
namespace PowerRangers\Models;

class Series
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $number;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $year;

    /**
     * @var Series[]
     */
    public $seasons;

    /**
     * @var Image[]
     */
    public $images;
}