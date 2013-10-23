<?php
require __DIR__ . '/../vendor/autoload.php';

use AppShed\Element\Screen\Screen;
use AppShed\Element\Item\Text;
use AppShed\Element\Item\Image;
use AppShed\Element\Item\Marker;
use AppShed\Element\Item\Toggle;

$screen = new Screen('My Screen');
$screen->addChild(new Text('Hi there'));
$screen->addChild(new Image(new AppShed\Style\Image("http://images.nationalgeographic.com/wpf/media-live/photos/000/005/cache/domestic-cat_516_600x450.jpg")));
$screen->addChild(new Marker('Hi there' , 'hello', 49, 32));
$screen->addChild($link = new \AppShed\Element\Item\Link('link'));
$link->setEmailLink('test@gmail.com', 'hello', 'body');

$screen->addChild(new Toggle('test switch', 'title', 'value-1', true));


$remote = new AppShed\HTML\Remote($screen);
$remote->getResponse();
