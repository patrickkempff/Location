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

interface CoordinateInterface
{
    /**
     * The latitude in degrees. Positive values indicate latitudes north of the equator.
     * Negative values indicate latitudes south of the equator.
     *
     * @return float
     */
    public function getLatitude();

    /**
     * The longitude in degrees. Measurements are relative to the zero meridian,
     * with positive values extending east of the meridian and negative values extending
     * west of the meridian.
     *
     * @return float
     */
    public function getLongitude();
}
