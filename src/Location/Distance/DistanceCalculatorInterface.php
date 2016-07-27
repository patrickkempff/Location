<?php

/*
 * This file is part of the Location package.
 *
 * (c) Patrick Kempff <patrickkempff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Location\Distance;

use Location\Coordinate\CoordinateInterface;

/**
 * A Object that implements the distance calculator interface can calculate the distance
 * between two latitude+longitude coordinates.
 */
interface DistanceCalculatorInterface
{
    /**
     * Returns the distance in meters between location a and location b.
     *
     * @param CoordinateInterface $a The first location to calculate the distance from.
     * @param CoordinateInterface $b The second location to calculate the distance from.
     *
     * @return float The distance in meters between the two locations.
     */
    public function calculateDistanceBetween(CoordinateInterface $a, CoordinateInterface $b);
}
