<?php
use PowerRangers\Models\Ranger;
use PowerRangers\Models\Zord;
use PowerRangers\Zords;

class ZordsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @vcr zords/list.json
     */
    public function testZords()
    {
        $client = new Zords();
        $zords = $client->getAll();

        $zord = $zords[0];
        $this->assertInstanceOf(Zord::class, $zord);
        $this->assertEquals($zord->id, 6);
        $this->assertEquals($zord->name, 'Dino Megazord');
        $this->assertRegExp('/^The Megazord \(retroactively referred to as the Dino Megazord\)/', $zord->description);
        $this->assertEquals($zord->type, 'dinozord');

        $this->assertInternalType('array', $zord->images);
        $this->assertCount(0, $zord->images);

        $this->assertInternalType('array', $zord->modes);
        $this->assertCount(0, $zord->modes);

        $this->assertInternalType('array', $zord->parts);
        $this->assertCount(5, $zord->parts);

        $part = $zord->parts[0];
        $this->assertInstanceOf(Zord::class, $part);

        $this->assertInternalType('array', $zord->pilots);
        $this->assertCount(5, $zord->pilots);

        $pilot = $zord->pilots[0];
        $this->assertInstanceOf(Ranger::class, $pilot);
    }

    /**
     * @vcr zords/get.json
     */
    public function testZord()
    {
        $client = new Zords();
        $zord = $client->getByID(1);

        $this->assertEquals($zord->id, 1);
        $this->assertEquals($zord->name, 'Tyrannosaurus Dinozord');
        $this->assertRegExp('/^Forming the head and torso/', $zord->description);
        $this->assertEquals($zord->type, 'dinozord');

        $this->assertInternalType('array', $zord->images);
        $this->assertCount(0, $zord->images);

        $this->assertInternalType('array', $zord->modes);
        $this->assertCount(0, $zord->modes);

        $this->assertInternalType('array', $zord->parts);
        $this->assertCount(0, $zord->parts);

        $this->assertInternalType('array', $zord->pilots);
        $this->assertCount(1, $zord->pilots);

        $pilot = $zord->pilots[0];
        $this->assertInstanceOf(Ranger::class, $pilot);
    }
}