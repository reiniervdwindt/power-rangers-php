<?php
use PowerRangers\Series;

class SeriesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @vcr series/list.json
     */
    public function testSeries()
    {
        $client = new Series();
        $series = $client->getAll();

        $serie = $series[0];
        $this->assertEquals($serie->id, 1);
        $this->assertEquals($serie->name, 'Mighty Morphin Power Rangers');

        $this->assertInternalType('array', $serie->images);
        $this->assertInternalType('array', $serie->seasons);
    }

    /**
     * @vcr series/get.json
     */
    public function testSingleSeries()
    {
        $client = new Series();
        $series = $client->getByID(1);

        $this->assertEquals($series->id, 1);
        $this->assertEquals($series->name, 'Mighty Morphin Power Rangers');

        $this->assertInternalType('array', $series->images);
        $this->assertInternalType('array', $series->seasons);
    }
}