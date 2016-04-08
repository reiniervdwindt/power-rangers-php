<?php
use PowerRangers\Models\Image;
use PowerRangers\Series;
use PowerRangers\Models\Series as SeriesModel;

class SeriesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @vcr series/list.json
     */
    public function testSeries()
    {
        $client = new Series();
        $series = $client->getAll();

        $series = $series[0];
        $this->assertInstanceOf(SeriesModel::class, $series);
        $this->assertEquals($series->id, 1);
        $this->assertEquals($series->number, 1);
        $this->assertEquals($series->name, 'Mighty Morphin Power Rangers');
        $this->assertEquals($series->year, 1993);

        $this->assertInternalType('array', $series->images);
        $this->assertCount(0, $series->images);

        $this->assertInternalType('array', $series->seasons);
        $this->assertCount(3, $series->seasons);

        $season = $series->seasons[0];
        $this->assertInstanceOf(SeriesModel::class, $season);
        $this->assertEquals($season->id, 2);
        $this->assertEquals($season->number, 1);
        $this->assertEquals($season->name, 'Season 1');
        $this->assertEquals($season->year, 1993);

        $this->assertInternalType('array', $season->images);
        $this->assertCount(1, $season->images);

        $image = $season->images[0];
        $this->assertInstanceOf(Image::class, $image);
        $this->assertEquals($image->url, 'http://powerapi.blueyes.nl/static/media/series/Poster-mmpr1.jpg');
    }

    /**
     * @vcr series/get.json
     */
    public function testSingleSeries()
    {
        $client = new Series();
        $series = $client->getByID(1);

        $this->assertInstanceOf(SeriesModel::class, $series);
        $this->assertEquals($series->id, 1);
        $this->assertEquals($series->number, 1);
        $this->assertEquals($series->name, 'Mighty Morphin Power Rangers');
        $this->assertEquals($series->year, 1993);

        $this->assertInternalType('array', $series->images);
        $this->assertCount(0, $series->images);

        $this->assertInternalType('array', $series->seasons);
        $this->assertCount(3, $series->seasons);

        $season = $series->seasons[0];
        $this->assertInstanceOf(SeriesModel::class, $season);
        $this->assertEquals($season->id, 2);
        $this->assertEquals($season->number, 1);
        $this->assertEquals($season->name, 'Season 1');
        $this->assertEquals($season->year, 1993);

        $this->assertInternalType('array', $season->images);
        $this->assertCount(1, $season->images);

        $image = $season->images[0];
        $this->assertInstanceOf(Image::class, $image);
        $this->assertEquals($image->url, 'http://powerapi.blueyes.nl/static/media/series/Poster-mmpr1.jpg');
    }
}