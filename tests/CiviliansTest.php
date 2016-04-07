<?php
use PowerRangers\Civilians;

class CiviliansTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @vcr civilians/list.json
     */
    public function testCivilians()
    {
        $client = new Civilians();
        $civilians = $client->getAll();

        $civilian = $civilians[0];
        $this->assertEquals($civilian->id, 6);
        $this->assertEquals($civilian->name, 'Angela');
        $this->assertRegExp('/^Angela was a minor character in the first season/', $civilian->description);
        $this->assertInternalType('array', $civilian->images);
    }

    /**
     * @vcr civilians/get.json
     */
    public function testRanger()
    {
        $client = new Civilians();
        $civilian = $client->getByID(1);

        $this->assertEquals($civilian->id, 1);
        $this->assertEquals($civilian->name, 'Farkas Bulkmeier');
        $this->assertRegExp('/^Farkas "Bulk" Bulkmeier is a fictional character/', $civilian->description);
        $this->assertInternalType('array', $civilian->images);
    }
}