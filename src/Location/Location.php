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

/**
 * A Location object represents the data of a specific
 * geographical location.
 */
class Location
{

    /**
     * @var int The radius of the earth.
     */
    const EARTH_RADIUS = 6371000;

    /**
     * @var Coordinate2d
     */
    private $coordinate;

    /**
     * Location constructor.
     *
     * @param Coordinate2d $coordinate
     */
    public function __construct(Coordinate2d $coordinate)
    {
        $this->coordinate = $coordinate;
    }

    /**
     * @param $latitude
     * @param $longitude
     *
     * @return static
     */
    public static function fromLatitudeLongitude($latitude, $longitude)
    {
        return new static(new Coordinate2d($latitude, $longitude));
    }

    /**
     * @param $coordinate
     *
     * @return static
     */
    public static function fromString($coordinate)
    {
        return new static(Coordinate2d::fromString($coordinate));
    }

    /**
     * The geographical coordinate information.
     *
     * @return Coordinate2d
     */
    public function getCoordinate()
    {
        return $this->coordinate;
    }

    /**
     * Returns the distance in meters from the receiver’s location to
     * the given location.
     *
     * This method measures the distance between the two locations by
     * tracing a line between them and taking the curvature of the earth
     * into account.
     *
     * Please not that the result is a straight curve and is calculated
     * by ignoring the altitude differences between the two locations.
     *
     * @param Location $location The other location.
     *
     * @return int The distance in meters between the two locations.
     */
    public function calculateDistanceFromLocation(Location $location)
    {
        // Convert the coordinates from degrees to radians.
        $lat_from = deg2rad($this->getCoordinate()->getLatitude());
        $lon_from = deg2rad($this->getCoordinate()->getLongitude());
        $lat_to = deg2rad($location->getCoordinate()->getLatitude());
        $lon_to = deg2rad($location->getCoordinate()->getLongitude());

        $delta = $lon_to - $lon_from;
        $a = pow(cos($lat_to) * sin($delta), 2) +
            pow(cos($lat_from) * sin($lat_to) - sin($lat_from) * cos($lat_to) * cos($delta), 2);
        $b = sin($lat_from) * sin($lat_to) + cos($lat_from) * cos($lat_to) * cos($delta);

        $angle = atan2(sqrt($a), $b);

        return intval($angle * self::EARTH_RADIUS);
    }
}
