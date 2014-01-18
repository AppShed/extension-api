<?php

namespace AppShed\Style;

/**
 * Represents an image used in AppShed and some settings about how it should be displayed
 *
 * @package AppShed\Style
 */
class Image
{

    const TYPE_FILL = 'Fill';
    const TYPE_FIT = 'Fit';
    const TYPE_STRETCH = 'Stretch';
    const TYPE_TILE = 'Tile';
    const TYPE_CENTER = 'Center';

    const ATTACHMENT_HOR_LEFT = 1;
    const ATTACHMENT_HOR_CENTER = 2;
    const ATTACHMENT_HOR_RIGHT = 3;
    const ATTACHMENT_VER_TOP = 4;
    const ATTACHMENT_VER_CENTER = 8;
    const ATTACHMENT_VER_BOTTOM = 12;

    /**
     *
     * @var string
     */
    protected $url;
    /**
     *
     * @var string
     */
    protected $style;
    /**
     *
     * @var int
     */
    protected $attachment = 0;
    /**
     *
     * @var Size
     */
    protected $size;
    /**
     *
     * @var Color
     */
    protected $color;

    /**
     * @param string $url Full URL for the image file
     * @param string $style How the image should stretch or scale
     * @param int $attachment
     * @param Size $size should be an array containing 'width' and 'height' keys
     * @param Color $color
     */
    public function __construct($url, $style = null, $attachment = 0, $size = null, $color = null)
    {
        $this->url = $url;
        $this->style = $style;
        $this->attachment = $attachment;
        $this->size = $size;
        $this->color = $color;
    }

    /**
     *
     * @see Image::ATTACHMENT_HOR_LEFT
     * @see Image::ATTACHMENT_HOR_CENTER
     * @see Image::ATTACHMENT_HOR_RIGHT
     * @see Image::ATTACHMENT_VER_TOP
     * @see Image::ATTACHMENT_VER_CENTER
     * @see Image::ATTACHMENT_VER_BOTTOM
     *
     * @param int $attachment
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * @return int
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param \AppShed\Style\Color $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return \AppShed\Style\Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param \AppShed\Style\Size $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return \AppShed\Style\Size
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     *
     * @see Image::TYPE_FILL
     * @see Image::TYPE_FIT
     * @see Image::TYPE_STRETCH
     * @see Image::TYPE_TILE
     * @see Image::TYPE_CENTER
     *
     * @param string $style
     */
    public function setStyle($style)
    {
        $this->style = $style;
    }

    /**
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Add CSS rules for this element to the given document
     *
     * @param CSSDocument $css
     * @param string $selector
     */
    public function toCSS($css, $selector)
    {
        if ($this->url) {
            $size = 'contain';
            $repeat = 'no-repeat';
            $positionHor = 'center';
            $positionVer = 'center';

            switch ($this->style) {
                case self::TYPE_STRETCH:
                    $size = '100% 100%';
                    break;
                case self::TYPE_TILE:
                    $repeat = 'repeat';
                    break;
                case self::TYPE_CENTER:
                    if (is_array($this->size)) {
                        $size = "{$this->size['width']}px {$this->size['height']}px";
                    } else {
                        $size = 'auto';
                    }
                    break;
                case self::TYPE_FILL:
                    $size = 'cover';
                    break;
            }

            if ($this->attachment) {
                $i = $this->attachment & 3;
                if ($i == 1) {
                    $positionHor = 'left';
                } else {
                    if ($i == 3) {
                        $positionHor = 'right';
                    }
                }
                $i = $this->attachment & 12;
                if ($i == 4) {
                    $positionVer = 'top';
                } else {
                    if ($i == 12) {
                        $positionVer = 'bottom';
                    }
                }
            }

            $css->addRule($selector, 'background-image', $css->getURLValue($this->url));
            $css->addRule($selector, 'background-repeat', $repeat);
            $css->addRule($selector, 'background-position', "$positionHor $positionVer");
            $css->addRule($selector, 'background-size', $size);
        }
        $css->addRule($selector, 'background-color', $css->getColorValue($this->color));
    }
}
