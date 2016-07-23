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
use PHPUnit_Framework_TestCase;

class GettersTest extends PHPUnit_Framework_TestCase
{
    public function testLatitudeGetter()
    {
        $c2d = new Coordinate2d(74.4562151, -68.7351081);
        $this->assertSame(74.4562151, $c2d->getLatitude());
    }

    public function testLongitudeGetter()
    {
        $c2d = new Coordinate2d(74.4562151, -68.7351081);
        $this->assertSame(-68.7351081, $c2d->getLongitude());
    }
}
