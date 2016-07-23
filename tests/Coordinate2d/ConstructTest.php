<?php

/*
 * This file is part of the Location package.
 *
 * (c) Patrick Kempff <patrickkempff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Coordinate2D;

use Location\Coordinate2d;
use Tests\AbstractTestCase;

class ConstructTest extends AbstractTestCase
{

    public function testInstanceWithCoordinates()
    {
        $c2d = new Coordinate2d(51.3775265, 6.0789937);
        $this->assertCoordinate2D($c2d, 51.3775265, 6.0789937);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInstanceWithNullCoordinatesThrowsException()
    {
        new Coordinate2d(null, null);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInstanceWithStringCoordinatesThrowsException()
    {
        new Coordinate2d('51.3775265', '6.0789937');
    }

    public function testInstanceFromString()
    {
        $c2d = Coordinate2d::fromString('51.3775265,6.0789937');
        $this->assertSame(
            array('latitude' => 51.3775265, 'longitude' => 6.0789937),
            array('latitude' => $c2d->getLatitude(), 'longitude' => $c2d->getLongitude())
        );

        $c2d = Coordinate2d::fromString('51,6');
        $this->assertSame(
            array('latitude' => 51.0, 'longitude' => 6.0),
            array('latitude' => $c2d->getLatitude(), 'longitude' => $c2d->getLongitude())
        );
    }

    public function testInstanceFromLongString()
    {
        $c2d = Coordinate2d::fromString('51.37752655265526552655526552655265,6.07899379937993799379937993799379937');
        $this->assertSame(
            array('latitude' => 51.37752655265526552655526552655265, 'longitude' => 6.07899379937993799379937993799379937),
            array('latitude' => $c2d->getLatitude(), 'longitude' => $c2d->getLongitude())
        );
    }

    public function testInstanceFromStringWithSpaceAfterComma()
    {
        $c2d = Coordinate2d::fromString('51.3775265, 6.0789937');
        $this->assertSame(
            array('latitude' => 51.3775265, 'longitude' => 6.0789937),
            array('latitude' => $c2d->getLatitude(), 'longitude' => $c2d->getLongitude())
        );
    }

    /**
     * @dataProvider invalidCoordinatesDataProvider
     * @expectedException InvalidArgumentException
     */
    public function testInstanceWithInvalidCoordinatesThrowsException($latitude, $longitude)
    {
        new Coordinate2d($latitude, $longitude);
    }

    /**
     * @dataProvider validCoordinatesDataProvider
     */
    public function testInstanceWithValidCoordinatesThrowsException($latitude, $longitude)
    {
        new Coordinate2d($latitude, $longitude);
    }

    public function invalidCoordinatesDataProvider()
    {
        return array(
            array('aa', 'bb'),
            array('51.3775265','6.0789937'),
            array('0','0'),
            array(90, 181),
            array(65.e01, 120),
            array(-90, -181),
            array(0, -181),
            array(-80.058050,181.945313),
        );
    }

    public function validCoordinatesDataProvider()
    {
        return array(
            array(51.3775265,6.0789937),
            array(-7.3533376,-60.3402229),
            array(-72.1520685,15.4214958),
            array(-1.318243,-0.263672),
            array(51.3775265377526537752653775265,6.0789937078993707899370789937),
            array(72,15)
        );
    }
}
