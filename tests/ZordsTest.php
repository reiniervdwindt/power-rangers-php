<?php
use PowerRangers\Zords;

class ZordsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @vcr zords/list.json
     */
    public function testZords()
    {
        $client = new Zords();
        $zords = $client->getAll();

        $zord = $zords[0];
        $this->assertEquals($zord->id, 6);
        $this->assertEquals($zord->name, 'Dino Megazord');
        $this->assertEquals($zord->type, 'dinozord');

        $this->assertInternalType('array', $zord->images);
        $this->assertInternalType('array', $zord->parts);
        $this->assertInternalType('array', $zord->pilots);
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
        $this->assertEquals($zord->type, 'dinozord');

        $this->assertInternalType('array', $zord->images);
        $this->assertInternalType('array', $zord->parts);
        $this->assertInternalType('array', $zord->pilots);
    }
}