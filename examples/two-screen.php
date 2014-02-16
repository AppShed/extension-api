<?php
require __DIR__ . '/../vendor/autoload.php';

use AppShed\Remote\Element\Screen\Screen;
use AppShed\Remote\Element\Item\Text;
use AppShed\Remote\Element\Item\Link;
use AppShed\Remote\HTML\Remote;

if(Remote::isOptionsRequest()) {
    Remote::getCORSResponseHeaders();
}

$screenTwo = new Screen('My Screen 2');
$screenTwo->addChild(new Text('Hi there again'));

$screen = new Screen('My Screen');
$screen->addChild(new Text('Hi there'));
$link = new Link('The link');
$screen->addChild($link);
$link->setScreenLink($screenTwo);

$remote = new Remote($screen);
$remote->getResponse();
