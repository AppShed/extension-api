<?php

namespace AppShed\Element;

trait Style
{
    use Id;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $color;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $titleColor;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $subtitleColor;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $glowColor;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $borderColor;

    /**
     *
     * @var boolean
     */
    protected $underline;

    /**
     *
     * @var int
     */
    protected $size;

    /**
     *
     * @var string
     */
    protected $fontFamily;

    /**
     * @var string
     */
    protected $align;

    /**
     *
     * @var boolean
     */
    protected $bold;

    /**
     *
     * @var boolean
     */
    protected $italic;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $listBackground;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $galleryBackground;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $iconBackground;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $appsBackground;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $background;

    /**
     *
     * @var boolean
     */
    protected $hrAfter;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $hrColor;

    /**
     *
     * @var int
     */
    protected $hrWidth;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $headerColor;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $headerTextColor;

    /**
     *
     * @var boolean
     */
    protected $headerDisplay;

    /**
     *
     * @var boolean
     */
    protected $paddingTop;

    /**
     *
     * @var boolean
     */
    protected $paddingBottom;

    /**
     *
     * @var boolean
     */
    protected $paddingLeft;

    /**
     *
     * @var boolean
     */
    protected $paddingRight;

    /**
     *
     * @var int
     */
    protected $titleSize;

    /**
     *
     * @var int
     */
    protected $subtitleSize;

    /**
     *
     * @var string
     */
    protected $titleFont;

    /**
     *
     * @var string
     */
    protected $subtitleFont;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $autoCompleteColor;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $autoCompleteBackgroundColor;

    /**
     *
     * @var \AppShed\Style\Color
     */
    protected $autoCompleteHighlightColor;

    public function getColor()
    {
        return $this->color;
    }

    public function setColor(\AppShed\Style\Color $color)
    {
        $this->color = $color;
    }

    public function getTitleColor()
    {
        return $this->titleColor;
    }

    public function setTitleColor(\AppShed\Style\Color $titleColor)
    {
        $this->titleColor = $titleColor;
    }

    public function getSubtitleColor()
    {
        return $this->subtitleColor;
    }

    public function setSubtitleColor(\AppShed\Style\Color $subtitleColor)
    {
        $this->subtitleColor = $subtitleColor;
    }

    public function getGlowColor()
    {
        return $this->glowColor;
    }

    public function setGlowColor(\AppShed\Style\Color $glowColor)
    {
        $this->glowColor = $glowColor;
    }

    public function getBorderColor()
    {
        return $this->borderColor;
    }

    public function setBorderColor(\AppShed\Style\Color $borderColor)
    {
        $this->borderColor = $borderColor;
    }

    public function getUnderline()
    {
        return $this->underline;
    }

    public function setUnderline($underline)
    {
        $this->underline = $underline;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getFontFamily()
    {
        return $this->fontFamily;
    }

    public function setFontFamily($fontFamily)
    {
        $this->fontFamily = $fontFamily;
    }

    public function getAlign()
    {
        return $this->align;
    }

    public function setAlign($align)
    {
        $this->align = $align;
    }

    public function getBold()
    {
        return $this->bold;
    }

    public function setBold($bold)
    {
        $this->bold = $bold;
    }

    public function getItalic()
    {
        return $this->italic;
    }

    public function setItalic($italic)
    {
        $this->italic = $italic;
    }

    public function getListBackground()
    {
        return $this->listBackground;
    }

    public function setListBackground(\AppShed\Style\Image $listBackground)
    {
        $this->listBackground = $listBackground;
    }

    public function getGalleryBackground()
    {
        return $this->galleryBackground;
    }

    public function setGalleryBackground(\AppShed\Style\Image $galleryBackground)
    {
        $this->galleryBackground = $galleryBackground;
    }

    public function getIconBackground()
    {
        return $this->iconBackground;
    }

    public function setIconBackground(\AppShed\Style\Image $iconBackground)
    {
        $this->iconBackground = $iconBackground;
    }

    public function getAppsBackground()
    {
        return $this->appsBackground;
    }

    public function setAppsBackground(\AppShed\Style\Image $appsBackground)
    {
        $this->appsBackground = $appsBackground;
    }

    public function getBackground()
    {
        return $this->background;
    }

    public function setBackground(\AppShed\Style\Image $background)
    {
        $this->background = $background;
    }

    public function getHrAfter()
    {
        return $this->hrAfter;
    }

    public function setHrAfter($hrAfter)
    {
        $this->hrAfter = $hrAfter;
    }

    public function getHrColor()
    {
        return $this->hrColor;
    }

    public function setHrColor(\AppShed\Style\Color $hrColor)
    {
        $this->hrColor = $hrColor;
    }

    public function getHrWidth()
    {
        return $this->hrWidth;
    }

    public function setHrWidth($hrWidth)
    {
        $this->hrWidth = $hrWidth;
    }

    public function getHeaderColor()
    {
        return $this->headerColor;
    }

    public function setHeaderColor(\AppShed\Style\Color $headerColor)
    {
        $this->headerColor = $headerColor;
    }

    public function getHeaderTextColor()
    {
        return $this->headerTextColor;
    }

    public function setHeaderTextColor(\AppShed\Style\Color $headerTextColor)
    {
        $this->headerTextColor = $headerTextColor;
    }

    public function getHeaderDisplay()
    {
        return $this->headerDisplay;
    }

    public function setHeaderDisplay($headerDisplay)
    {
        $this->headerDisplay = $headerDisplay;
    }

    public function getPaddingTop()
    {
        return $this->paddingTop;
    }

    public function setPaddingTop($paddingTop)
    {
        $this->paddingTop = $paddingTop;
    }

    public function getPaddingBottom()
    {
        return $this->paddingBottom;
    }

    public function setPaddingBottom($paddingBottom)
    {
        $this->paddingBottom = $paddingBottom;
    }

    public function getPaddingLeft()
    {
        return $this->paddingLeft;
    }

    public function setPaddingLeft($paddingLeft)
    {
        $this->paddingLeft = $paddingLeft;
    }

    public function getPaddingRight()
    {
        return $this->paddingRight;
    }

    public function setPaddingRight($paddingRight)
    {
        $this->paddingRight = $paddingRight;
    }

    public function getTitleSize()
    {
        return $this->titleSize;
    }

    public function setTitleSize($titleSize)
    {
        $this->titleSize = $titleSize;
    }

    public function getSubtitleSize()
    {
        return $this->subtitleSize;
    }

    public function setSubtitleSize($subtitleSize)
    {
        $this->subtitleSize = $subtitleSize;
    }

    public function getTitleFont()
    {
        return $this->titleFont;
    }

    public function setTitleFont($titleFont)
    {
        $this->titleFont = $titleFont;
    }

    public function getSubtitleFont()
    {
        return $this->subtitleFont;
    }

    public function setSubtitleFont($subtitleFont)
    {
        $this->subtitleFont = $subtitleFont;
    }

    public function getAutoCompleteColor()
    {
        return $this->autoCompleteColor;
    }

    public function setAutoCompleteColor(\AppShed\Style\Color $autoCompleteColor)
    {
        $this->autoCompleteColor = $autoCompleteColor;
    }

    public function getAutoCompleteBackgroundColor()
    {
        return $this->autoCompleteBackgroundColor;
    }

    public function setAutoCompleteBackgroundColor(\AppShed\Style\Color $autoCompleteBackgroundColor)
    {
        $this->autoCompleteBackgroundColor = $autoCompleteBackgroundColor;
    }

    public function getAutoCompleteHighlightColor()
    {
        return $this->autoCompleteHighlightColor;
    }

    public function setAutoCompleteHighlightColor(\AppShed\Style\Color $autoCompleteHighlightColor)
    {
        $this->autoCompleteHighlightColor = $autoCompleteHighlightColor;
    }

    /**
     * @param \AppShed\Style\CSSDocument $css
     * @param \AppShed\HTML\Settings $settings
     */
    public function getCSS($css, $settings)
    {
        $idselector = $css->getIdSelector($this->getIdType() . $settings->getPrefix() . $this->getId());
        $isScreen = $this instanceof \AppShed\Element\Screen\Screen;
        $isItem = $this instanceof \AppShed\Element\Item\Item;

        $css->addRule($idselector, 'text-align', $this->align);
        $css->addRule($idselector, 'font-family', $css->getFontValue($this->fontFamily));
        if ($this->color) {
            $css->addRule($idselector, 'color', $css->getColorValue($this->color));
            $css->addRule($idselector . " button", 'color', $css->getColorValue($this->color));
            $css->addRule($idselector . " .item-icon-inner .title", 'color', $css->getColorValue($this->color));
        }

        $css->addRule(
            array($idselector, $css->getClassSelector('glow-back')),
            'fill',
            $css->getColorValue($this->glowColor)
        );
        $css->addRule(
            array(
                $css->getClassSelector('android'),
                $idselector,
                $css->getClassSelector('glow-back'),
                $css->getClassSelector('back-left')
            ),
            'background-color',
            $css->getColorValue($this->glowColor)
        );
        $css->addRule(
            array($idselector, $css->getClassSelector('glow-back'), $css->getClassSelector('back-right')),
            'background-color',
            $css->getColorValue($this->glowColor)
        );
        $css->addRule(
            array($idselector, $css->getClassSelector('glow-back'), $css->getClassSelector('back-center')),
            'background-color',
            $css->getColorValue($this->glowColor)
        );
        if ($this->glowColor) {
            $css->addRule(
                array($idselector, $css->getClassSelector('glow')),
                'background-color',
                $this->glowColor->toString(0.5)
            );
        }

        $css->addRule($idselector, 'font-size', $css->getSizeValue($this->size));

        if ($this->bold === true) {
            $css->addRule($idselector, 'font-weight', 'bold');
        } else {
            if ($this->bold === false) {
                $css->addRule($idselector, 'font-weight', 'normal');
            }
        }

        if ($this->italic === true) {
            $css->addRule($idselector, 'font-style', 'italic');
        } else {
            if ($this->italic === false) {
                $css->addRule($idselector, 'font-style', 'normal');
            }
        }

        if ($this->underline === true) {
            $css->addRule($idselector, 'text-decoration', 'underline');
        } else {
            if ($this->underline === false) {
                $css->addRule($idselector, 'text-decoration', 'none');
            }
        }

        if ($this->headerDisplay === false) {
            if ($isScreen) {
                $css->addRule(
                    array($idselector . $css->getClassSelector('screen'), $css->getClassSelector('header')),
                    'display',
                    'none'
                );
                $css->addRule(
                    array($idselector . $css->getClassSelector('screen'), $css->getClassSelector('items')),
                    'top',
                    '0'
                );
            } else {
                $css->addRule(
                    array($idselector, $css->getClassSelector('screen'), $css->getClassSelector('header')),
                    'display',
                    'none'
                );
                $css->addRule(
                    array($idselector, $css->getClassSelector('screen'), $css->getClassSelector('items')),
                    'top',
                    '0'
                );
            }
        }

        $css->addRule($idselector, 'border-color', $css->getColorValue($this->borderColor));
        $css->addRule(array($idselector, 'textarea'), 'border-color', $css->getColorValue($this->borderColor));
        $css->addRule(array($idselector, 'input'), 'border-color', $css->getColorValue($this->borderColor));
        $css->addRule(array($idselector, 'select'), 'border-color', $css->getColorValue($this->borderColor));

        $css->addRule(
            array($idselector, $css->getClassSelector('autocomplete')),
            'color',
            $css->getColorValue($this->autoCompleteColor)
        );
        $css->addRule(
            array($idselector, $css->getClassSelector('autocomplete')),
            'border-color',
            $css->getColorValue($this->autoCompleteColor)
        );
        $css->addRule(
            array($idselector, $css->getClassSelector('autocomplete')),
            'background-color',
            $css->getColorValue($this->autoCompleteBackgroundColor)
        );
        $css->addRule(
            array(
                $idselector,
                $css->getClassSelector('autocomplete'),
                $css->getClassSelector('completion') . $css->getPseudoClassSelector('hover')
            ),
            'color',
            $css->getColorValue($this->autoCompleteHighlightColor)
        );

        $css->addRule(
            array($idselector, $css->getClassSelector('title')),
            'color',
            $css->getColorValue($this->titleColor)
        );
        $css->addRule(
            array($idselector, $css->getClassSelector('title')),
            'font-size',
            $css->getSizeValue($this->titleSize)
        );
        $css->addRule(
            array($idselector, $css->getClassSelector('title')),
            'font-family',
            $css->getFontValue($this->titleFont)
        );

        $css->addRule(
            array($idselector, $css->getClassSelector('text')),
            'color',
            $css->getColorValue($this->subtitleColor)
        );
        $css->addRule(
            array($idselector, $css->getClassSelector('text')),
            'font-size',
            $css->getSizeValue($this->subtitleSize)
        );
        $css->addRule(
            array($idselector, $css->getClassSelector('text')),
            'font-family',
            $css->getFontValue($this->subtitleFont)
        );

        if ($isScreen) {
            if ($this->galleryBackground) {
                $this->galleryBackground->toCSS(
                    $css,
                    array(
                        $idselector . $css->getClassSelector(array('screen', 'gallery')),
                        $css->getClassSelector('items')
                    )
                );
                $this->galleryBackground->toCSS(
                    $css,
                    array(
                        $idselector . $css->getClassSelector(array('screen', 'photo')),
                        $css->getClassSelector('items')
                    )
                );
            }
            if ($this->listBackground) {
                $this->listBackground->toCSS(
                    $css,
                    array(
                        $idselector . $css->getClassSelector(array('screen', 'list')),
                        $css->getClassSelector('items')
                    )
                );
            }
            if ($this->iconBackground) {
                $this->iconBackground->toCSS(
                    $css,
                    array(
                        $idselector . $css->getClassSelector(array('screen', 'icon')),
                        $css->getClassSelector('items')
                    )
                );
            }
            if ($this->appsBackground) {
                $this->appsBackground->toCSS(
                    $css,
                    array(
                        $idselector . $css->getClassSelector(array('screen', 'appsscreen')),
                        $css->getClassSelector('items')
                    )
                );
            }
        } else {
            if ($this->galleryBackground) {
                $this->galleryBackground->toCSS(
                    $css,
                    array(
                        $idselector,
                        $css->getClassSelector(array('screen', 'gallery')),
                        $css->getClassSelector('items')
                    )
                );
                $this->galleryBackground->toCSS(
                    $css,
                    array(
                        $idselector,
                        $css->getClassSelector(array('screen', 'photo')),
                        $css->getClassSelector('items')
                    )
                );
            }
            if ($this->listBackground) {
                $this->listBackground->toCSS(
                    $css,
                    array($idselector, $css->getClassSelector(array('screen', 'list')), $css->getClassSelector('items'))
                );
            }
            if ($this->iconBackground) {
                $this->iconBackground->toCSS(
                    $css,
                    array($idselector, $css->getClassSelector(array('screen', 'icon')), $css->getClassSelector('items'))
                );
            }
            if ($this->appsBackground) {
                $this->appsBackground->toCSS(
                    $css,
                    array(
                        $idselector,
                        $css->getClassSelector(array('screen', 'appsscreen')),
                        $css->getClassSelector('items')
                    )
                );
            }
        }

        //if this is an item
        if ($this->background) {
            if ($isScreen) {
                $this->background->toCSS(
                    $css,
                    array($idselector . $css->getClassSelector(array('screen', 'list')), $css->getClassSelector('item'))
                );
            } else {
                if ($isItem) {
                    $this->background->toCSS(
                        $css,
                        array(
                            $css->getClassSelector(array('screen', 'list')),
                            $idselector . $css->getClassSelector('item')
                        )
                    );
                } else {
                    $this->background->toCSS(
                        $css,
                        array(
                            $idselector,
                            $css->getClassSelector(array('screen', 'list')),
                            $css->getClassSelector('item')
                        )
                    );
                }
            }
        }

        if ($this->headerTextColor) {
            if ($isScreen) {
                $css->addRule(
                    array($idselector . $css->getClassSelector('screen'), $css->getClassSelector('header')),
                    'color',
                    $css->getColorValue($this->headerTextColor)
                );
                $css->addRule(
                    array(
                        $css->getClassSelector('android'),
                        $idselector . $css->getClassSelector('screen'),
                        $css->getClassSelector('header'),
                        $css->getClassSelector('back')
                    ),
                    'stroke',
                    $css->getColorValue($this->headerTextColor)
                );
                $css->addRule(
                    array(
                        $idselector . $css->getClassSelector('screen'),
                        $css->getClassSelector('header'),
                        $css->getClassSelector('title')
                    ),
                    'text-shadow',
                    "0px 1px 0px " . $css->getColorValue($this->getShadowColor($this->headerTextColor))
                );
            } else {
                $css->addRule(
                    array($idselector, $css->getClassSelector('screen'), $css->getClassSelector('header')),
                    'color',
                    $css->getColorValue($this->headerTextColor)
                );
                $css->addRule(
                    array(
                        $css->getClassSelector('android'),
                        $idselector,
                        $css->getClassSelector('screen'),
                        $css->getClassSelector('header'),
                        $css->getClassSelector('back')
                    ),
                    'stroke',
                    $css->getColorValue($this->headerTextColor)
                );
                $css->addRule(
                    array(
                        $idselector,
                        $css->getClassSelector('screen'),
                        $css->getClassSelector('header'),
                        $css->getClassSelector('title')
                    ),
                    'text-shadow',
                    "0px 1px 0px " . $css->getColorValue($this->getShadowColor($this->headerTextColor))
                );
            }
        }

        if ($isScreen) {
            $css->addRule(
                array($idselector . $css->getClassSelector('screen'), $css->getClassSelector('header')),
                'background-color',
                $css->getColorValue($this->headerColor)
            );
        } else {
            $css->addRule(
                array($idselector, $css->getClassSelector('screen'), $css->getClassSelector('header')),
                'background-color',
                $css->getColorValue($this->headerColor)
            );
        }

        if ($this->hrAfter === true) {
            $width = $this->hrWidth;
            if (!$width) {
                $width = 1;
            }
            if ($isItem) {
                $css->addRule(
                    $idselector . $css->getClassSelector('item'),
                    'border-bottom-width',
                    $css->getSizeValue($width)
                );
            } else {
                $css->addRule(
                    array($idselector, $css->getClassSelector('item')),
                    'border-bottom-width',
                    $css->getSizeValue($width)
                );
            }
        } else {
            if ($this->hrAfter === false) {
                if ($isItem) {
                    $css->addRule($idselector . $css->getClassSelector('item'), 'border-bottom-width', 0);
                } else {
                    $css->addRule(array($idselector, $css->getClassSelector('item')), 'border-bottom-width', 0);
                }
            }
        }
        if ($isItem) {
            $css->addRule(
                $idselector . $css->getClassSelector('item'),
                'border-bottom-color',
                $css->getColorValue($this->hrColor)
            );
        } else {
            $css->addRule(
                array($idselector, $css->getClassSelector('item')),
                'border-bottom-color',
                $css->getColorValue($this->hrColor)
            );
        }

        $css->addRule($idselector, 'padding-top', $css->getSizeValue($this->paddingTop));
        $css->addRule($idselector, 'padding-bottom', $css->getSizeValue($this->paddingBottom));
        $css->addRule($idselector, 'padding-left', $css->getSizeValue($this->paddingLeft));
        $css->addRule($idselector, 'padding-right', $css->getSizeValue($this->paddingRight));
    }

    /**
     *
     * @param \AppShed\Style\Color $color
     *
     * @return \AppShed\Style\Color
     */
    protected function getShadowColor($color)
    {
        $vals = array(
            'red' => $color->getRed(),
            'green' => $color->getGreen(),
            'blue' => $color->getBlue()
        );
        foreach ($vals as $key => $v) {
            if ($v > 127) {
                $v -= ($v * 0.1);
            } else {
                $v += ($v * 0.1);
            }
            $vals[$key] = floor($v);
        }
        return new \AppShed\Style\Color($vals['red'], $vals['green'], $vals['blue'], $color->getAlpha());
    }

    /**
     * copy styles from $from to this
     *
     * @param \AppShed\Element\Style $from
     */
    public function copyStyles($from)
    {
        $this->color = $from->color;
        $this->titleColor = $from->titleColor;
        $this->subtitleColor = $from->subtitleColor;
        $this->glowColor = $from->glowColor;
        $this->borderColor = $from->borderColor;
        $this->underline = $from->underline;
        $this->size = $from->size;
        $this->fontFamily = $from->fontFamily;
        $this->align = $from->align;
        $this->bold = $from->bold;
        $this->italic = $from->italic;
        $this->listBackground = $from->listBackground;
        $this->galleryBackground = $from->galleryBackground;
        $this->iconBackground = $from->iconBackground;
        $this->appsBackground = $from->appsBackground;
        $this->background = $from->background;
        $this->hrAfter = $from->hrAfter;
        $this->hrColor = $from->hrColor;
        $this->hrWidth = $from->hrWidth;
        $this->headerColor = $from->headerColor;
        $this->headerTextColor = $from->headerTextColor;
        $this->headerDisplay = $from->headerDisplay;
        $this->paddingTop = $from->paddingTop;
        $this->paddingBottom = $from->paddingBottom;
        $this->paddingLeft = $from->paddingLeft;
        $this->paddingRight = $from->paddingRight;
        $this->titleSize = $from->titleSize;
        $this->subtitleSize = $from->subtitleSize;
        $this->titleFont = $from->titleFont;
        $this->subtitleFont = $from->subtitleFont;
        $this->autoCompleteColor = $from->autoCompleteColor;
        $this->autoCompleteBackgroundColor = $from->autoCompleteBackgroundColor;
        $this->autoCompleteHighlightColor = $from->autoCompleteHighlightColor;
    }

}
