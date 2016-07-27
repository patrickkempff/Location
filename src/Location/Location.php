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

use Location\Coordinate\CoordinateInterface;
use Location\Distance\DistanceCalculatorInterface;

/**
 * A Location object represents the data of a specific
 * geographical location.
 */
class Location
{

    /**
     * @var CoordinateInterface
     */
    private $coordinate;

    /**
     * Location constructor.
     *
     * @param CoordinateInterface $coordinate
     */
    public function __construct(CoordinateInterface $coordinate)
    {
        $this->coordinate = $coordinate;
    }

    /**
     * The geographical coordinate information.
     *
     * @return CoordinateInterface
     */
    public function getCoordinate()
    {
        return $this->coordinate;
    }

    /**
     * Returns the distance in meters from the receiver’s location to
     * the given location using the given distance calculator formula.
     *
     * @param Location $location The location to calculate the distance from.
     * @param DistanceCalculatorInterface $calculator The distance calculator formula.
     *
     * @return float The distance in meters between the two locations.
     */
    public function calculateDistanceFromLocation(Location $location, DistanceCalculatorInterface $calculator)
    {
        return $calculator->calculateDistanceBetween($this->getCoordinate(), $location->getCoordinate());
    }
}
