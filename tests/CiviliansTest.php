<?php
use PowerRangers\Civilians;
use PowerRangers\Models\Civilian;

class CiviliansTest extends PHPUnit_Framework_TestCase
{
    /**
     * @vcr civilians/list.json
     */
    public function testCivilians()
    {
        $client = new Civilians();
        $civilians = $client->getAll();

        $this->assertInternalType('array', $civilians);
        $this->assertCount(6, $civilians);

        $civilian = $civilians[0];
        $this->assertInstanceOf(Civilian::class, $civilian);
        $this->assertEquals($civilian->id, 6);
        $this->assertEquals($civilian->name, 'Angela');
        $this->assertRegExp('/^Angela was a minor character in the first season/', $civilian->description);
        $this->assertInternalType('array', $civilian->images);

        $image = $civilian->images[0];
        $this->assertNull($image->url);
    }

    /**
     * @vcr civilians/get.json
     */
    public function testCivilian()
    {
        $client = new Civilians();
        $civilian = $client->getByID(1);

        $this->assertInstanceOf(Civilian::class, $civilian);
        $this->assertEquals($civilian->id, 1);
        $this->assertEquals($civilian->name, 'Farkas Bulkmeier');
        $this->assertRegExp('/^Farkas "Bulk" Bulkmeier is a fictional character/', $civilian->description);
        $this->assertInternalType('array', $civilian->images);

        $image = $civilian->images[0];
        $this->assertEquals($image->url, 'http://powerapi.blueyes.nl/static/media/civilians/Prs-al-bulk.jpg');
    }
}