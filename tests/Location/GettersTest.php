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
        $loc = new Location(74.4562151, -68.7351081);
        $this->assertInstanceOfCoordinate2D($loc->getCoordinate());
        $this->assertSame(74.4562151, $loc->getCoordinate()->getLatitude());
        $this->assertSame(-68.7351081, $loc->getCoordinate()->getLongitude());
    }
}
