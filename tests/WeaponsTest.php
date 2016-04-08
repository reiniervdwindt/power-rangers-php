<?php
use PowerRangers\Models\Image;
use PowerRangers\Models\Ranger;
use PowerRangers\Models\Weapon;
use PowerRangers\Weapons;

class WeaponsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @vcr weapons/list.json
     */
    public function testWeapons()
    {
        $client = new Weapons();
        $weapons = $client->getAll();

        $weapon = $weapons[0];
        $this->assertInstanceOf(Weapon::class, $weapon);
        $this->assertEquals($weapon->id, 7);
        $this->assertEquals($weapon->name, 'Dragon Dagger');
        $this->assertEquals($weapon->type, 'dagger');

        $this->assertInternalType('array', $weapon->images);
        $this->assertCount(0, $weapon->images);

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

        $this->assertInstanceOf(Weapon::class, $weapon);
        $this->assertEquals($weapon->id, 1);
        $this->assertEquals($weapon->name, 'Power Sword');
        $this->assertEquals($weapon->type, 'sword');

        $this->assertInternalType('array', $weapon->images);
        $this->assertCount(1, $weapon->images);

        $image = $weapon->images[0];
        $this->assertInstanceOf(Image::class, $image);
        $this->assertEquals($image->url, 'http://powerapi.blueyes.nl/static/media/weapons/Power_Sword.jpg');

        $this->assertInstanceOf(Ranger::class, $weapon->ranger);
        $this->assertEquals($weapon->ranger->id, 1);
        $this->assertEquals($weapon->ranger->name, 'Red Ranger');
    }
}