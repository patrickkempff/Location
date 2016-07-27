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
 * Calculates the great-circle distance between two points, with
 * the Haversine formula.
 *
 * @see https://en.wikipedia.org/wiki/Haversine_formula
 */
class Haversine implements DistanceCalculatorInterface
{
    /**
     * @var int The radius of the earth in kilometers.
     */
    const EARTH_RADIUS = 6371000;

    /**
     * Returns the distance in meters from the receiver’s location to
     * the given location.
     *
     * Calculates the great-circle distance between two points, with
     * the Haversine formula.
     *
     * @see https://en.wikipedia.org/wiki/Haversine_formula
     *
     * Please not that the result is a straight curve and is calculated
     * by ignoring the altitude differences between the two locations.
     *
     * @param CoordinateInterface $a The first location to calculate the distance of.
     * @param CoordinateInterface $b The second location to calculate the distance of.
     *
     * @return float The distance in meters between the two locations.
     */
    public function calculateDistanceBetween(CoordinateInterface $a, CoordinateInterface $b)
    {
        $delta_lat = deg2rad($b->getLatitude() - $a->getLatitude());
        $delta_lon = deg2rad($b->getLongitude() - $a->getLongitude());

        $lat_from = deg2rad($a->getLatitude());
        $lat_to = deg2rad($b->getLatitude());

        $a = sin($delta_lat/2) * sin($delta_lat/2);
        $b = $a + cos($lat_from) * cos($lat_to) * sin($delta_lon/2) * sin($delta_lon/2);
        $angle = 2 * asin(sqrt($b));

        return floatval($angle * $this->earthRadius());
    }

    /**
     * The radius of the earth in kilometers.
     *
     * @return int
     */
    private function earthRadius()
    {
        return self::EARTH_RADIUS;
    }
}
