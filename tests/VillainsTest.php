<?php
use PowerRangers\Models\Villain;
use PowerRangers\Villains;

class VillainsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @vcr villains/list.json
     */
    public function testVillains()
    {
        $client = new Villains();
        $Villains = $client->getAll();

        $villain = $Villains[0];
        $this->assertInstanceOf(Villain::class, $villain);
        $this->assertEquals($villain->id, 2);
        $this->assertEquals($villain->name, 'Goldar');
        $this->assertRegExp('/^Goldar is a lion-faced, griffin-themed knight/', $villain->description);
        $this->assertInternalType('array', $villain->images);
    }

    /**
     * @vcr villains/get.json
     */
    public function testVillain()
    {
        $client = new Villains();
        $villain = $client->getByID(1);

        $this->assertInstanceOf(Villain::class, $villain);
        $this->assertEquals($villain->id, 1);
        $this->assertEquals($villain->name, 'Rita Repulsa');
        $this->assertRegExp('/^Rita Repulsa is an evil humanoid alien witch/', $villain->description);
        $this->assertInternalType('array', $villain->images);
    }
}