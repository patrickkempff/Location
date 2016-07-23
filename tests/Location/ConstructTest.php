<?php

/*
 * This file is part of the Location package.
 *
 * (c) Patrick Kempff <patrickkempff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Location;

use Location\Location;
use Tests\AbstractTestCase;

class ConstructTest extends AbstractTestCase
{

    public function testInstanceWithLatitudeLongitude()
    {
        $location = Location::fromLatitudeLongitude(51.3775265, 6.0789937);
        $this->assertInstanceOfLocation($location);
    }

    public function testInstanceFromCoordinate()
    {
        $stub = $this->getMockBuilder('Location\Coordinate2d')
            ->disableOriginalConstructor()
            ->getMock();

        $stub->method('getLatitude')->willReturn(51.3775265);
        $stub->method('getLongitude')->willReturn(6.0789937);

        new Location($stub);
    }

    public function testInstanceFromString()
    {
        $loc = Location::fromString('51.3775265,6.0789937');
        $this->assertSame(
            array('latitude' => 51.3775265, 'longitude' => 6.0789937),
            array('latitude' => $loc->getCoordinate()->getLatitude(), 'longitude' => $loc->getCoordinate()->getLongitude())
        );

        $loc = Location::fromString('51,6');
        $this->assertSame(
            array('latitude' => 51.0, 'longitude' => 6.0),
            array('latitude' => $loc->getCoordinate()->getLatitude(), 'longitude' => $loc->getCoordinate()->getLongitude())
        );
    }

    public function testInstanceFromLongString()
    {
        $loc = Location::fromString('51.37752655265526552655526552655265,6.07899379937993799379937993799379937');
        $this->assertSame(
            array('latitude' => 51.37752655265526552655526552655265, 'longitude' => 6.07899379937993799379937993799379937),
            array('latitude' => $loc->getCoordinate()->getLatitude(), 'longitude' => $loc->getCoordinate()->getLongitude())
        );
    }

    public function testInstanceFromStringWithSpaceAfterComma()
    {
        $loc = Location::fromString('51.3775265, 6.0789937');
        $this->assertSame(
            array('latitude' => 51.3775265, 'longitude' => 6.0789937),
            array('latitude' => $loc->getCoordinate()->getLatitude(), 'longitude' => $loc->getCoordinate()->getLongitude())
        );
    }
}
