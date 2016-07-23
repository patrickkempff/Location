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

class ConstructTest extends AbstractTestCase
{

    public function testInstanceWithLatitudeLongitude()
    {
        $location = Location::fromLatitudeLongitude(51.3775265, 6.0789937);
        $this->assertInstanceOfLocation($location);
    }

    public function testInstanceFromCoordinate()
    {
        $stub = $this->getMockBuilder(Coordinate2d::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stub->method('getLatitude')->willReturn(51.3775265);
        $stub->method('getLogitude')->willReturn(6.0789937);

        new Location($stub);
    }
}
