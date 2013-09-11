<?php
require __DIR__ . '/../vendor/autoload.php';

use AppShed\Element\Screen\Map;
use AppShed\Element\Item\Marker;


$screen = new Map('Map Screen');

$screen->addChild(new Marker('Hi there' , 'hello', 32,49));

$remote = new AppShed\HTML\Remote($screen);
$remote->getResponse();
