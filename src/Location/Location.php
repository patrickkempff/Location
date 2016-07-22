<?php

/*
 * This file is part of the Location package.
 *
 * (c) Patrick Kempff <patrickkempff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Location;

class Location
{
    private $coordinate;

    public function __construct($latitude, $longitude)
    {
        $this->coordinate = new Coordinate2D($latitude, $longitude);
    }

    public function getCoordinate()
    {
        return $this->coordinate;
    }
}
