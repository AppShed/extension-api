<?php

namespace AppShed\Style;

/**
 * Represents a css color
 *
 * @package AppShed\Style
 */
class Color
{
    protected $red;
    protected $green;
    protected $blue;
    protected $alpha;

    /**
     * You can create a color a number of ways, either with separate rgb(a) values, 0-255,
     * or with a css style '#rrggbb' value, or with a comma separated string, 'r,g,b(,a)'
     *
     * @param int $r
     * @param int $g
     * @param int $b
     * @param int $a
     */
    public function __construct($r, $g = null, $b = null, $a = null)
    {
        if ($g) {
            $this->red = $r;
            $this->green = $g;
            $this->blue = $b;
            $this->alpha = $a;
        } else {
            if (strpos($r, '#') === 0) {
                $hex = str_replace("#", "", $r);
                if (strlen($hex) == 3) {
                    $this->red = hexdec(substr($hex, 0, 1));
                    $this->green = hexdec(substr($hex, 1, 1));
                    $this->blue = hexdec(substr($hex, 2, 1));
                } else {
                    if (strlen($hex) == 6) {
                        $this->red = hexdec(substr($hex, 0, 2));
                        $this->green = hexdec(substr($hex, 2, 2));
                        $this->blue = hexdec(substr($hex, 4, 2));
                    } else {
                        throw new Exception("Invalid Color $r");
                    }
                }
            } else {
                $parts = explode(',', $r);
                if (count($parts) >= 3) {
                    $this->red = $parts[0];
                    $this->green = $parts[1];
                    $this->blue = $parts[2];
                    if (count($parts) >= 4) {
                        $this->alpha = $parts[3];
                    }
                } else {
                    throw new Exception("Invalid Color $r");
                }
            }
        }
    }

    /**
     * Returns a CSS string representation of this Color
     *
     * @param int $alpha 0-255 override the alpha value of this color
     *
     * @return string
     */
    public function toString($alpha = null)
    {
        if ($alpha) {
            return "rgba($this->red, $this->green, $this->blue, $alpha)";
        } else {
            if (is_null($this->alpha)) {
                return "rgb($this->red, $this->green, $this->blue)";
            } else {
                return "rgba($this->red, $this->green, $this->blue, $this->alpha)";
            }
        }
    }

    public function getRed()
    {
        return $this->red;
    }

    public function setRed($red)
    {
        $this->red = $red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function setGreen($green)
    {
        $this->green = $green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    public function setBlue($blue)
    {
        $this->blue = $blue;
    }

    public function getAlpha()
    {
        return $this->alpha;
    }

    public function setAlpha($alpha)
    {
        $this->alpha = $alpha;
    }
}
