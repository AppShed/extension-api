<?php
require __DIR__ . '/../build/appshed-api.phar';

use AppShed\Remote\Element\Screen\Map;
use AppShed\Remote\Element\Item\Marker;
use AppShed\Remote\HTML\Remote;

if(Remote::isOptionsRequest()) {
    Remote::getCORSResponseHeaders();
}

$screen = new Map('Map Screen');

$screen->addChild(new Marker('Hi there', 'hello', 32, 49));

$remote = new Remote($screen);
$remote->getResponse();
