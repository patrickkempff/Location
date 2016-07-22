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
        $loc1 = new Location(52.3079989, 4.9715451); // Amsterdam
        $loc2 = new Location(51.3703748, 6.1724031); // Venlo
        $distance = $loc1->calculateDistanceFromLocation($loc2);

        // the distance between Venlo and Amsterdam is 132 kilometers
        // and 950 meters
        $this->assertSame(132950, $distance);
    }

    public function testLocationDistanceBetweenNewYorkAndMaaskantje()
    {
        $loc1 = new Location(40.7127837, -74.0059413); // New York
        $loc2 = new Location(51.6589954, 5.3718416); // Maaskantje
        $distance = $loc1->calculateDistanceFromLocation($loc2);

        // the distance between New York and Maaskantje (NL) is 5921 kilometers
        // and 564 meters
        $this->assertSame(5921564, $distance);
    }
}

//5921564
