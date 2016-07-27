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

use Location\Coordinate\Coordinate2d;
use Location\Location;
use Tests\AbstractTestCase;

class GettersTest extends AbstractTestCase
{
    public function testCoordinateGetter()
    {
        $c2d = new Coordinate2d(74.4562151, -68.7351081);
        $loc = new Location($c2d);

        $this->assertSame($c2d, $loc->getCoordinate());
    }
}
