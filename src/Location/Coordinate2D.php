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

use Assert\Assertion;

class Coordinate2D
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
     * A structure that contains a geographical coordinate using the WGS 84 reference frame.
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
