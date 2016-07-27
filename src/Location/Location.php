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
use DateTime;

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
     * @var DateTime
     */
    private $timestamp;

    /**
     * Location constructor.
     *
     * @param CoordinateInterface $coordinate
     * @param DateTime $timestamp The time at which this location was determined
     */
    public function __construct(CoordinateInterface $coordinate, DateTime $timestamp)
    {
        $this->coordinate = $coordinate;
        $this->timestamp = $timestamp;
    }

    /**
     * Initializes a location object
     *
     * @param CoordinateInterface $coordinate
     * @return static
     */
    public static function fromCoordinate(CoordinateInterface $coordinate)
    {
        return new static($coordinate, new \DateTime());
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
     * The time at which this location was determined
     * @return DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
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
