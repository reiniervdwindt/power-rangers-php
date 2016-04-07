<?php
use PowerRangers\Models\Ranger;
use PowerRangers\Weapons;

class WeaponsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @vcr weapons/list.json
     */
    public function testWeapons()
    {
        $client = new Weapons();
        $weapons = $client->getAll();

        $weapon = $weapons[0];
        $this->assertEquals($weapon->id, 7);
        $this->assertEquals($weapon->name, 'Dragon Dagger');
        $this->assertEquals($weapon->type, 'dagger');

        $this->assertInternalType('array', $weapon->images);

        $this->assertInstanceOf(Ranger::class, $weapon->ranger);
        $this->assertEquals($weapon->ranger->id, 6);
        $this->assertEquals($weapon->ranger->name, 'Green Ranger');
    }

    /**
     * @vcr weapons/get.json
     */
    public function testWeapon()
    {
        $client = new Weapons();
        $weapon = $client->getByID(1);

        $this->assertEquals($weapon->id, 1);
        $this->assertEquals($weapon->name, 'Power Sword');
        $this->assertEquals($weapon->type, 'sword');

        $this->assertInternalType('array', $weapon->images);

        $this->assertInstanceOf(Ranger::class, $weapon->ranger);
        $this->assertEquals($weapon->ranger->id, 1);
        $this->assertEquals($weapon->ranger->name, 'Red Ranger');
    }
}