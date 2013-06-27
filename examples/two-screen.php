<?php
require __DIR__ . '/../vendor/autoload.php';

$screentwo = new AppShed\Element\Screen\Screen('My Screen 2');
$screentwo->addChild(new AppShed\Element\Item\Text('Hi there again'));

$screen = new AppShed\Element\Screen\Screen('My Screen');
$screen->addChild(new AppShed\Element\Item\Text('Hi there'));
$link = new AppShed\Element\Item\Link('The link');
$screen->addChild($link);
$link->setScreenLink($screentwo);

$remote = new AppShed\HTML\Remote($screen);
$remote->getResponse();
