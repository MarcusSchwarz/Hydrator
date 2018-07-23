<?php

use Scn\Hydrator\Configuration\GenericExtractorConfig;
use Scn\Hydrator\Hydrator;

require_once __DIR__.'/assets.php';

$car = new Car(
    'Gaudi',
    'pink',
    5,
    true
);


$mapping = [
    'name' => function () {
        return $this->name;
    },
    'color' => function () {
        return $this->color;
    },
    'number_of_wheels' => function () {
        return $this->numberOfWheels;
    },
    'out_of_stock' => function () {
        return !$this->available;
    }
];

$hydrator = new Hydrator();

$extractorConfig = new GenericExtractorConfig($mapping);

$data = $hydrator->extract($extractorConfig, $car);

var_dump($data);

/**
array(4) {
    ["name"]=>
    string(5) "Gaudi"
    ["color"]=>
    string(4) "pink"
    ["number_of_wheels"]=>
    int(5)
    ["out_of_stock"]=>
    bool(false)
}
 */
