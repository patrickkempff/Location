<?php

/*
 * This file is part of the Location package.
 *
 * (c) Patrick Kempff <patrickkempff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests;

use Location\Coordinate2d;
use PHPUnit_Framework_TestCase;

abstract class AbstractTestCase extends PHPUnit_Framework_TestCase
{

    protected function assertCoordinate2D(Coordinate2d $c2d, $latitude, $longitude)
    {
        $expected = array('latitude' => $latitude, 'longitude' => $longitude);
        $actual = array('latitude' => $c2d->getLatitude(), 'longitude' => $c2d->getLongitude());
        $this->assertSame($expected, $actual);
    }

    protected function assertInstanceOfCoordinate2D($c)
    {
        $this->assertInstanceOf('Location\Coordinate2D', $c);
    }

    protected function assertInstanceOfLocation($loc)
    {
        $this->assertInstanceOf('Location\Location', $loc);
    }
}
