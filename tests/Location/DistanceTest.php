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

class DistanceTest extends AbstractTestCase
{
    public function testLocationDistanceBetweenAmsterdamAndVenlo()
    {

        // Amsterdam
        $stub1 = $this->getMock('Location\Coordinate\CoordinateInterface');
        $stub1->method('getLatitude')->willReturn(52.3079989);
        $stub1->method('getLongitude')->willReturn(4.9715451);

        $amsterdam = new Location($stub1, new \DateTime());

        // Venlo
        $stub2 = $this->getMock('Location\Coordinate\CoordinateInterface');
        $stub2->method('getLatitude')->willReturn(51.3703748);
        $stub2->method('getLongitude')->willReturn(6.1724031);

        $venlo = new Location($stub2, new \DateTime());

        // Distance calculator
        $stub3 = $this->getMock('Location\Distance\DistanceCalculatorInterface');
        $stub3->method('calculateDistanceBetween')->willReturn(10);

        // Calculate the distance.
        $distance = $amsterdam->calculateDistanceFromLocation($venlo, $stub3);

        $this->assertSame(10, $distance);
    }
}
