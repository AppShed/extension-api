<?php

namespace AppShed\Style;

class Image {
    
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
     * @var array
     */
    protected $size;
    /**
     *
     * @var Color
     */
    protected $color;
    
    public function __construct($url, $style = null, $attachment = 0, $size = null, $color = null) {
        $this->url = $url;
        $this->style = $style;
        $this->attachment = $attachment;
        $this->size = $size;
        $this->color = $color;
    }
    
    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getStyle() {
        return $this->style;
    }

    public function setStyle($style) {
        $this->style = $style;
    }

    public function getAttachment() {
        return $this->attachment;
    }

    public function setAttachment($attachment) {
        $this->attachment = $attachment;
    }

    public function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }
    
    /**
     * 
     * @param CSSDocument $css
     * @param string $selector
     */
    public function toCSS($css, $selector) {
        if($this->url) {
			$size = 'contain';
			$repeat = 'no-repeat';
			$positionHor = 'center';
			$positionVer = 'center';

			switch($this->style) {
				case self::TYPE_STRETCH:
					$size = '100% 100%';
					break;
				case self::TYPE_TILE:
					$repeat = 'repeat';
				case self::TYPE_CENTER:
					if(is_array($this->size)) {
						$size = "{$this->size['width']}px {$this->size['height']}px";
					}
					else {
						$size = 'auto';
					}
					break;
				case self::TYPE_FILL:
					$size = 'cover';
					break;
			}

			if($this->attachment) {
				$i = $this->attachment & 3;
				if($i == 1) {
					$positionHor = 'left';
				}
				else if($i == 3) {
					$positionHor = 'right';
				}
				$i = $this->attachment & 12;
				if($i == 4) {
					$positionVer = 'top';
				}
				else if($i == 12) {
					$positionVer = 'bottom';
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
