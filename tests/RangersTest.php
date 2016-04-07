<?php
use PowerRangers\Models\Ranger;
use PowerRangers\Models\Weapon;
use PowerRangers\Rangers;

class RangersTest extends \PHPUnit_Framework_TestCase
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

        $this->assertInternalType('array', $ranger->images);
        $this->assertInternalType('array', $ranger->zords);

        $this->assertInstanceOf(Weapon::class, $ranger->weapon);
        $this->assertEquals($ranger->weapon->id, 2);
        $this->assertEquals($ranger->weapon->name, 'Power Axe');
        $this->assertEquals($ranger->weapon->type, 'dagger');
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

        $this->assertInternalType('array', $ranger->images);
        $this->assertInternalType('array', $ranger->zords);

        $this->assertInstanceOf(Weapon::class, $ranger->weapon);
        $this->assertEquals($ranger->weapon->id, 1);
        $this->assertEquals($ranger->weapon->name, 'Power Sword');
        $this->assertEquals($ranger->weapon->type, 'sword');
    }
}