<?php
require __DIR__ . '/../vendor/autoload.php';

use AppShed\Remote\Element\Screen\Screen;
use AppShed\Remote\Element\Item\Text;
use AppShed\Remote\Element\Item\Image;
use AppShed\Remote\Element\Item\Marker;
use AppShed\Remote\Element\Item\Toggle;

$screen = new Screen('My Screen');
$screen->addChild(new Text('Hi there'));
$screen->addChild(new Image(new AppShed\Remote\Style\Image("http://images.nationalgeographic.com/wpf/media-live/photos/000/005/cache/domestic-cat_516_600x450.jpg")));
$screen->addChild(new Marker('Hi there' , 'hello', 49, 32));
$screen->addChild($link = new \AppShed\Remote\Element\Item\Link('link'));
$link->setEmailLink('test@gmail.com', 'hello', 'body');

$screen->addChild(new Toggle('test switch', 'title', 'value-1', true));


$remote = new AppShed\Remote\HTML\Remote($screen);
$remote->getResponse();
