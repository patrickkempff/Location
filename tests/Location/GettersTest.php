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

class GettersTest extends AbstractTestCase
{
    public function testCoordinateGetter()
    {
        $stub = $this->getMockBuilder('Location\Coordinate\CoordinateInterface')
            ->getMock();
        $stub->method('getLatitude')->willReturn(51.3775265);
        $stub->method('getLongitude')->willReturn(6.0789937);

        $location = new Location($stub);

        $this->assertSame($stub, $location->getCoordinate());
    }
}
