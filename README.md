[![Build Status](https://travis-ci.org/patrickkempff/Location.svg?branch=master)](https://travis-ci.org/patrickkempff/Location)
[![Coverage Status](https://coveralls.io/repos/github/patrickkempff/Location/badge.svg?branch=master)](https://coveralls.io/github/patrickkempff/Location?branch=master)


A simple library for dealing with (geo) locations.

```php
use Location\Location;

// New York City Hall, USA
$newyork = new Location(40.7127837, -74.0059413); 

// Maaskantje, NL
$maaskantje = new Location(51.6589954, 5.3718416);

// The distance is 5921564 meters.
$distance = $newyork->calculateDistanceFromLocation($maaskantje);

```


## Installation

### With Composer

```
$ composer require patrickkempff/location
```

```json
{
    "require": {
        "patrickkempff/location": "~0.1"
    }
}
```

```php
<?php
require 'vendor/autoload.php';

use Location\Location;

// New York City Hall, USA
$newyork = new Location(40.7127837, -74.0059413); 

// Maaskantje, NL
$maaskantje = new Location(51.6589954, 5.3718416);

// The distance is 5921564 meters.
$distance = $newyork->calculateDistanceFromLocation($maaskantje);
```


### Manual installation

The recommend way to install Location is via [composer](http://getcomposer.org/). If you want to manually install Location download [Location.php](https://github.com/patrickkempff/Location/blob/master/src/Location/Location.php) from the repo and save the file into your project.

```php
<?php
require 'path/to/Location.php';

use Location\Location;

// New York City Hall, USA
$newyork = new Location(40.7127837, -74.0059413); 

// Maaskantje, NL
$maaskantje = new Location(51.6589954, 5.3718416);

// The distance is 5921564 meters.
$distance = $newyork->calculateDistanceFromLocation($maaskantje);
```