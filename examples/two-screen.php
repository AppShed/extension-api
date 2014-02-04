<?php
require __DIR__ . '/../vendor/autoload.php';

$screentwo = new AppShed\Remote\Element\Screen\Screen('My Screen 2');
$screentwo->addChild(new AppShed\Remote\Element\Item\Text('Hi there again'));

$screen = new AppShed\Remote\Element\Screen\Screen('My Screen');
$screen->addChild(new AppShed\Remote\Element\Item\Text('Hi there'));
$link = new AppShed\Remote\Element\Item\Link('The link');
$screen->addChild($link);
$link->setScreenLink($screentwo);

$remote = new AppShed\Remote\HTML\Remote($screen);
$remote->getResponse();
