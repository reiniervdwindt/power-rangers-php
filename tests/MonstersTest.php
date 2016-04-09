<?php
use PowerRangers\Monsters;
use PowerRangers\Models\Monster;

class MonstersTest extends PHPUnit_Framework_TestCase
{
    /**
     * @vcr monsters/list.json
     */
    public function testMonsters()
    {
        $client = new Monsters();
        $monsters = $client->getAll();

        $this->assertInternalType('array', $monsters);
        $this->assertCount(50, $monsters);

        $monster = $monsters[0];
        $this->assertInstanceOf(Monster::class, $monster);
        $this->assertEquals($monster->id, 25);
        $this->assertEquals($monster->name, 'Babe Ruthless');
        $this->assertRegExp('/^Babe Ruthless was a one-horned baseball-esque pixie/', $monster->description);

        $this->assertInternalType('array', $monster->images);
        $this->assertCount(0, $monster->images);
    }

    /**
     * @vcr monsters/get.json
     */
    public function testMonster()
    {
        $client = new Monsters();
        $monster = $client->getByID(1);

        $this->assertInstanceOf(Monster::class, $monster);
        $this->assertEquals($monster->id, 1);
        $this->assertEquals($monster->name, 'Bones');
        $this->assertRegExp('/^Bones is a skeleton monster created by Finster/', $monster->description);
        $this->assertInternalType('array', $monster->images);

        $image = $monster->images[0];
        $this->assertEquals($image->url, 'http://powerapi.blueyes.nl/static/media/monsters/MMPR_Bones.jpg');
    }
}