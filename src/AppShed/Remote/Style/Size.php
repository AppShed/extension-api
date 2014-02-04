<?php
namespace AppShed\Remote\Style;

/**
 * Represents a simple width/height
 *
 * @package AppShed\Remote\Style
 */
class Size extends \ArrayObject
{
    public function __construct($width, $height)
    {
        $this['width'] = $width;
        $this['height'] = $height;
    }
}
