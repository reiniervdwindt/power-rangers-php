<?php
use PowerRangers\Models\Ranger;
use PowerRangers\Models\Weapon;
use PowerRangers\Rangers;

class RangersTest extends PHPUnit_Framework_TestCase
{
    /**
     * @vcr rangers/list.json
     */
    public function testRangers()
    {
        $client = new Rangers();
        $rangers = $client->getAll();

        $ranger = $rangers[0];
        $this->assertInstanceOf(Ranger::class, $ranger);
        $this->assertEquals($ranger->id, 5);
        $this->assertEquals($ranger->name, 'Black Ranger');
        $this->assertEquals($ranger->color, 'black');

        $this->assertInstanceOf(Weapon::class, $ranger->weapon);
        $this->assertEquals($ranger->weapon->id, 2);
        $this->assertEquals($ranger->weapon->name, 'Power Axe');
        $this->assertEquals($ranger->weapon->type, 'dagger');
        $this->assertNull($ranger->weapon->ranger);

        $this->assertInternalType('array', $ranger->images);
        $this->assertCount(0, $ranger->images);

        $this->assertInternalType('array', $ranger->zords);
        $this->assertCount(2, $ranger->zords);

        $zord = $ranger->zords[0];
        $this->assertEquals($zord->id, 11);
        $this->assertEquals($zord->name, 'Lion Thunderzord');
        $this->assertEquals($zord->description, '');
        $this->assertEquals($zord->type, 'thunderzord');
        $this->assertNull($zord->images);
        $this->assertNull($zord->modes);
        $this->assertNull($zord->parts);
        $this->assertNull($zord->pilots);
    }

    /**
     * @vcr rangers/get.json
     */
    public function testRanger()
    {
        $client = new Rangers();
        $ranger = $client->getByID(1);

        $this->assertInstanceOf(Ranger::class, $ranger);
        $this->assertEquals($ranger->id, 1);
        $this->assertEquals($ranger->name, 'Red Ranger');
        $this->assertEquals($ranger->color, 'red');

        $this->assertInstanceOf(Weapon::class, $ranger->weapon);
        $this->assertEquals($ranger->weapon->id, 1);
        $this->assertEquals($ranger->weapon->name, 'Power Sword');
        $this->assertEquals($ranger->weapon->type, 'sword');
        $this->assertNull($ranger->weapon->ranger);

        $this->assertInternalType('array', $ranger->images);
        $this->assertCount(1, $ranger->images);

        $image = $ranger->images[0];
        $this->assertEquals($image->url, 'http://powerapi.blueyes.nl/static/media/rangers/Mmpr-red.png');

        $this->assertInternalType('array', $ranger->zords);
        $this->assertCount(2, $ranger->zords);

        $zord = $ranger->zords[0];
        $this->assertEquals($zord->id, 15);
        $this->assertEquals($zord->name, 'Red Dragon Thunderzord');
        $this->assertEquals($zord->description, '');
        $this->assertEquals($zord->type, 'thunderzord');
        $this->assertNull($zord->images);
        $this->assertNull($zord->modes);
        $this->assertNull($zord->parts);
        $this->assertNull($zord->pilots);
    }
}