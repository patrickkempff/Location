<?php

/*
 * This file is part of the Location package.
 *
 * (c) Patrick Kempff <patrickkempff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Location\Coordinate;

use Assert\Assertion;

/**
 * A value object that contains a geographical coordinate
 * using the WGS 84 reference frame.
 *
 * @link https://en.wikipedia.org/wiki/World_Geodetic_System
 */
class Coordinate2d implements CoordinateInterface
{
    /**
     * @var int|float
     */
    private $latitude;

    /**
     * @var int|float
     */
    private $longitude;

    /**
     * A value object that contains a geographical coordinate.
     *
     * @param $latitude
     * @param $longitude
     */
    public function __construct($latitude, $longitude)
    {
        Assertion::true(is_int($latitude) || is_float($latitude));
        Assertion::true(is_int($longitude) || is_float($longitude));

        Assertion::greaterOrEqualThan($latitude, -90.0);
        Assertion::lessOrEqualThan($latitude, 90.0);
        Assertion::greaterOrEqualThan($longitude, -180.0);
        Assertion::lessOrEqualThan($longitude, 180.0);

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * Initializes and returns a coordinate object with the specified coordinate information in string format.
     *
     * Valid format:
     * "latitude in degrees, longitude in degrees"
     *
     * Example:
     * "51.3703748, 6.1724031"
     *
     * Please note that UTM and MGRS coordinates are not yet supported!
     *
     * @param $coordinate Coordinate information in string format
     *
     * @return static
     */
    public static function fromString($coordinate)
    {
        Assertion::string($coordinate);
        Assertion::true(substr_count($coordinate, ',')===1);

        $coordinate = explode(',', $coordinate);

        return new static((float) $coordinate[0], (float) $coordinate[1]);
    }

    /**
     * The latitude in degrees. Positive values indicate latitudes north of the equator.
     * Negative values indicate latitudes south of the equator.
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * The longitude in degrees. Measurements are relative to the zero meridian,
     * with positive values extending east of the meridian and negative values extending
     * west of the meridian.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
