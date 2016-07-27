<?php

/*
 * This file is part of the Location package.
 *
 * (c) Patrick Kempff <patrickkempff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Calculator;

use Location\Distance\Haversine;
use Tests\AbstractTestCase;

class HaversineTest extends AbstractTestCase
{

    public function testInstanceImplementsDistanceCalculatorInterface()
    {
        $haversine = new Haversine();
        $this->assertInstanceOf('Location\Distance\DistanceCalculatorInterface', $haversine);
    }

    public function testHaversineDistanceBetweenAmsterdamAndVenlo()
    {
        // Amsterdam
        $amsterdam = $this->getMockBuilder('Location\Coordinate\Coordinate2d')
            ->disableOriginalConstructor()
            ->getMock();

        $amsterdam->method('getLatitude')->willReturn(52.3079989);
        $amsterdam->method('getLongitude')->willReturn(4.9715451);

        // Venlo
        $venlo = $this->getMockBuilder('Location\Coordinate\Coordinate2d')
            ->disableOriginalConstructor()
            ->getMock();

        $venlo->method('getLatitude')->willReturn(51.3703748);
        $venlo->method('getLongitude')->willReturn(6.1724031);

        $haversine = new Haversine();
        $distance = $haversine->calculateDistanceBetween($venlo, $amsterdam);

        // the distance between Venlo and Amsterdam is 132 kilometers
        // and 950 meters
        $this->assertSame(132950.33426190881, $distance);
    }

    public function testHaversineDistanceBetweenNewYorkAndMaaskantje()
    {
        // New York City Hall, USA
        $newyork = $this->getMockBuilder('Location\Coordinate\Coordinate2d')
            ->disableOriginalConstructor()
            ->getMock();

        $newyork->method('getLatitude')->willReturn(40.7127837);
        $newyork->method('getLongitude')->willReturn(-74.0059413);

        // Maaskantje, NL
        $maaskantje = $this->getMockBuilder('Location\Coordinate\Coordinate2d')
            ->disableOriginalConstructor()
            ->getMock();

        $maaskantje->method('getLatitude')->willReturn(51.6589954);
        $maaskantje->method('getLongitude')->willReturn(5.3718416);

        $haversine = new Haversine();
        $distance = $haversine->calculateDistanceBetween($newyork, $maaskantje);

        // the distance between Venlo and Amsterdam is 5921 kilometers
        // and 564 meters
        $this->assertSame(5921564.7858810443, $distance);
    }
}
