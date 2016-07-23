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

use Location\Coordinate2d;
use Location\Location;
use Tests\AbstractTestCase;

class DistanceTest extends AbstractTestCase
{
    public function testLocationDistanceBetweenAmsterdamAndVenlo()
    {

        // Amsterdam
        $stub1 = $this->getMockBuilder(Coordinate2d::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stub1->method('getLatitude')->willReturn(52.3079989);
        $stub1->method('getLongitude')->willReturn(4.9715451);

        $amsterdam = new Location($stub1);

        // Venlo
        $stub2 = $this->getMockBuilder(Coordinate2d::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stub2->method('getLatitude')->willReturn(51.3703748);
        $stub2->method('getLongitude')->willReturn(6.1724031);

        $venlo = new Location($stub2);

        $distance = $amsterdam->calculateDistanceFromLocation($venlo);

        // the distance between Venlo and Amsterdam is 132 kilometers
        // and 950 meters
        $this->assertSame(132950, $distance);
    }

    public function testLocationDistanceBetweenNewYorkAndMaaskantje()
    {
        // New york
        $stub1 = $this->getMockBuilder(Coordinate2d::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stub1->method('getLatitude')->willReturn(40.7127837);
        $stub1->method('getLongitude')->willReturn(-74.0059413);

        $newyork = new Location($stub1);

        // Maaskantje
        $stub2 = $this->getMockBuilder(Coordinate2d::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stub2->method('getLatitude')->willReturn(51.6589954);
        $stub2->method('getLongitude')->willReturn(5.3718416);

        $maaskantje = new Location($stub2);

        $distance = $newyork->calculateDistanceFromLocation($maaskantje);

        // the distance between New York and Maaskantje (NL) is 5921 kilometers
        // and 564 meters
        $this->assertSame(5921564, $distance);
    }
}
