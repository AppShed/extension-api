<?php
require __DIR__ . '/../vendor/autoload.php';

use AppShed\Remote\Element\Screen\Map;
use AppShed\Remote\Element\Item\Marker;


$screen = new Map('Map Screen');

$screen->addChild(new Marker('Hi there' , 'hello', 32,49));

$remote = new AppShed\Remote\HTML\Remote($screen);
$remote->getResponse();
