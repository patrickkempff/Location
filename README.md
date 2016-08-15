# Location

[![Latest Unstable Version](https://poser.pugx.org/patrickkempff/location/v/unstable)](https://packagist.org/packages/patrickkempff/location)
[![License](https://poser.pugx.org/patrickkempff/location/license)](https://packagist.org/packages/patrickkempff/location)
[![Build Status](https://travis-ci.org/patrickkempff/Location.svg?branch=master)](https://travis-ci.org/patrickkempff/Location)
[![Coverage Status](https://coveralls.io/repos/github/patrickkempff/Location/badge.svg?branch=master)](https://coveralls.io/github/patrickkempff/Location?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b51bec49-b547-4f43-bfaf-1dc347953eb3/mini.png)](https://insight.sensiolabs.com/projects/b51bec49-b547-4f43-bfaf-1dc347953eb3)

A simple library for dealing with (geographical) locations.

```php
use Location\Location;
use Location\Coordinate\Coordinate2d;
use Location\Distance\Haversine;

// Amsterdam, NL.
$amsterdam = new Location(new Coordinate2d(52.3079989, 4.9715451));

// Venlo, NL.
$venlo = new Location(new Coordinate2d(51.3703748, 6.1724031));

// The distance between Venlo and Amsterdam is 132950 meters (132km 950m) 
// using the Haversine formula.
$distance = $amsterdam->calculateDistanceFromLocation($venlo, new Haversine());

```
*Please note that [UTM](https://en.wikipedia.org/wiki/Universal_Transverse_Mercator_coordinate_system), [MGRS](https://en.wikipedia.org/wiki/Military_grid_reference_system) and [USNG](https://en.wikipedia.org/wiki/United_States_National_Grid) coordinate systems are not yet supported.*


## Installation

### With Composer

```
$ composer require patrickkempff/location
```

```json
{
    "require": {
        "patrickkempff/location": "dev-master"
    }
}
```

```php
<?php
require 'vendor/autoload.php';

use Location\Location;
use Location\Coordinate\Coordinate2d;
use Location\Distance\Haversine;

// Amsterdam, NL.
$amsterdam = new Location(new Coordinate2d(52.3079989, 4.9715451));

// Venlo, NL.
$venlo = new Location(new Coordinate2d(51.3703748, 6.1724031));

// The distance between Venlo and Amsterdam is 132950 meters (132km 950m) 
// using the Haversine formula.
$distance = $amsterdam->calculateDistanceFromLocation($venlo, new Haversine());

```


### Manual installation

Please note that the recommend way to install Location is via [composer](http://getcomposer.org/). If you really want to install Location manually, you can download [Location](https://github.com/patrickkempff/Location/archive/master.zip) from the repo and unpack the files into your project.

```php
<?php
require 'path/to/Location.php';
require 'path/to/Coordinate/Coordinate2d.php';
require 'path/to/Distance/Haversine.php';

use Location\Location;
use Location\Coordinate\Coordinate2d;
use Location\Distance\Haversine;

// Amsterdam, NL.
$amsterdam = new Location(new Coordinate2d(52.3079989, 4.9715451));

// Venlo, NL.
$venlo = new Location(new Coordinate2d(51.3703748, 6.1724031));

// The distance between Venlo and Amsterdam is 132950 meters (132km 950m) 
// using the Haversine formula.
$distance = $amsterdam->calculateDistanceFromLocation($venlo, new Haversine());
```
