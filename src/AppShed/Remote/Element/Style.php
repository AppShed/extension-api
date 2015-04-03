<?php

namespace AppShed\Remote\Element;

use AppShed\Remote\Element\Item\Item;
use AppShed\Remote\Element\Screen\Screen;
use AppShed\Remote\HTML\Settings;
use AppShed\Remote\Style\Color;
use AppShed\Remote\Style\CSSDocument;
use AppShed\Remote\Style\Image;

trait Style
{
    use Id;

    /**
     *
     * @var Color
     */
    protected $color;

    /**
     *
     * @var Color
     */
    protected $titleColor;

    /**
     *
     * @var Color
     */
    protected $subtitleColor;

    /**
     *
     * @var Color
     */
    protected $glowColor;

    /**
     *
     * @var Color
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
     * @var Image
     */
    protected $listBackground;

    /**
     *
     * @var Image
     */
    protected $galleryBackground;

    /**
     *
     * @var Image
     */
    protected $iconBackground;

    /**
     *
     * @var Image
     */
    protected $appsBackground;

    /**
     *
     * @var Image
     */
    protected $background;

    /**
     *
     * @var boolean
     */
    protected $hrAfter;

    /**
     *
     * @var Color
     */
    protected $hrColor;

    /**
     *
     * @var int
     */
    protected $hrWidth;

    /**
     *
     * @var Color
     */
    protected $headerColor;

    /**
     *
     * @var Color
     */
    protected $headerTextColor;

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
     * @var Color
     */
    protected $autoCompleteColor;

    /**
     *
     * @var Color
     */
    protected $autoCompleteBackgroundColor;

    /**
     *
     * @var Color
     */
    protected $autoCompleteHighlightColor;

    public function getColor()
    {
        return $this->color;
    }

    public function setColor(Color $color)
    {
        $this->color = $color;
    }

    public function getTitleColor()
    {
        return $this->titleColor;
    }

    public function setTitleColor(Color $titleColor)
    {
        $this->titleColor = $titleColor;
    }

    public function getSubtitleColor()
    {
        return $this->subtitleColor;
    }

    public function setSubtitleColor(Color $subtitleColor)
    {
        $this->subtitleColor = $subtitleColor;
    }

    public function getGlowColor()
    {
        return $this->glowColor;
    }

    public function setGlowColor(Color $glowColor)
    {
        $this->glowColor = $glowColor;
    }

    public function getBorderColor()
    {
        return $this->borderColor;
    }

    public function setBorderColor(Color $borderColor)
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

    public function setListBackground(Image $listBackground)
    {
        $this->listBackground = $listBackground;
    }

    public function getGalleryBackground()
    {
        return $this->galleryBackground;
    }

    public function setGalleryBackground(Image $galleryBackground)
    {
        $this->galleryBackground = $galleryBackground;
    }

    public function getIconBackground()
    {
        return $this->iconBackground;
    }

    public function setIconBackground(Image $iconBackground)
    {
        $this->iconBackground = $iconBackground;
    }

    public function getAppsBackground()
    {
        return $this->appsBackground;
    }

    public function setAppsBackground(Image $appsBackground)
    {
        $this->appsBackground = $appsBackground;
    }

    public function getBackground()
    {
        return $this->background;
    }

    public function setBackground(Image $background)
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

    public function setHrColor(Color $hrColor)
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

    public function setHeaderColor(Color $headerColor)
    {
        $this->headerColor = $headerColor;
    }

    public function getHeaderTextColor()
    {
        return $this->headerTextColor;
    }

    public function setHeaderTextColor(Color $headerTextColor)
    {
        $this->headerTextColor = $headerTextColor;
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

    public function setAutoCompleteColor(Color $autoCompleteColor)
    {
        $this->autoCompleteColor = $autoCompleteColor;
    }

    public function getAutoCompleteBackgroundColor()
    {
        return $this->autoCompleteBackgroundColor;
    }

    public function setAutoCompleteBackgroundColor(Color $autoCompleteBackgroundColor)
    {
        $this->autoCompleteBackgroundColor = $autoCompleteBackgroundColor;
    }

    public function getAutoCompleteHighlightColor()
    {
        return $this->autoCompleteHighlightColor;
    }

    public function setAutoCompleteHighlightColor(Color $autoCompleteHighlightColor)
    {
        $this->autoCompleteHighlightColor = $autoCompleteHighlightColor;
    }

    /**
     * @param \AppShed\Remote\Style\CSSDocument $css
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    public function getCSS(CSSDocument $css, Settings $settings)
    {
        $idSelector = $css->getIdSelector($this->getIdType() . $settings->getPrefix() . $this->getId());
        $isScreen = $this instanceof Screen;
        $isItem = $this instanceof Item;

        $css->addRule($idSelector, 'text-align', $this->align);
        $css->addRule($idSelector, 'font-family', $css->getFontValue($this->fontFamily));
        if ($this->color) {
            $css->addRule($idSelector, 'color', $css->getColorValue($this->color));
            $css->addRule($idSelector . " button", 'color', $css->getColorValue($this->color));
            $css->addRule($idSelector . " .item-icon-inner .title", 'color', $css->getColorValue($this->color));
        }

        $css->addRule(
            [$idSelector, $css->getClassSelector('glow-back')],
            'fill',
            $css->getColorValue($this->glowColor)
        );
        $css->addRule(
            [
                $css->getClassSelector('android'),
                $idSelector,
                $css->getClassSelector('glow-back'),
                $css->getClassSelector('back-left')
            ],
            'background-color',
            $css->getColorValue($this->glowColor)
        );
        $css->addRule(
            [$idSelector, $css->getClassSelector('glow-back'), $css->getClassSelector('back-right')],
            'background-color',
            $css->getColorValue($this->glowColor)
        );
        $css->addRule(
            [$idSelector, $css->getClassSelector('glow-back'), $css->getClassSelector('back-center')],
            'background-color',
            $css->getColorValue($this->glowColor)
        );
        if ($this->glowColor) {
            $css->addRule(
                [$idSelector, $css->getClassSelector('glow')],
                'background-color',
                $this->glowColor->toString(0.5)
            );
        }

        $css->addRule($idSelector, 'font-size', $css->getSizeValue($this->size));

        if ($this->bold === true) {
            $css->addRule($idSelector, 'font-weight', 'bold');
        } else {
            if ($this->bold === false) {
                $css->addRule($idSelector, 'font-weight', 'normal');
            }
        }

        if ($this->italic === true) {
            $css->addRule($idSelector, 'font-style', 'italic');
        } else {
            if ($this->italic === false) {
                $css->addRule($idSelector, 'font-style', 'normal');
            }
        }

        if ($this->underline === true) {
            $css->addRule($idSelector, 'text-decoration', 'underline');
        } else {
            if ($this->underline === false) {
                $css->addRule($idSelector, 'text-decoration', 'none');
            }
        }

        $css->addRule($idSelector, 'border-color', $css->getColorValue($this->borderColor));
        $css->addRule([$idSelector, 'textarea'], 'border-color', $css->getColorValue($this->borderColor));
        $css->addRule([$idSelector, 'input'], 'border-color', $css->getColorValue($this->borderColor));
        $css->addRule([$idSelector, 'select'], 'border-color', $css->getColorValue($this->borderColor));

        $css->addRule(
            [$idSelector, $css->getClassSelector('autocomplete')],
            'color',
            $css->getColorValue($this->autoCompleteColor)
        );
        $css->addRule(
            [$idSelector, $css->getClassSelector('autocomplete')],
            'border-color',
            $css->getColorValue($this->autoCompleteColor)
        );
        $css->addRule(
            [$idSelector, $css->getClassSelector('autocomplete')],
            'background-color',
            $css->getColorValue($this->autoCompleteBackgroundColor)
        );
        $css->addRule(
            [
                $idSelector,
                $css->getClassSelector('autocomplete'),
                $css->getClassSelector('completion') . $css->getPseudoClassSelector('hover')
            ],
            'color',
            $css->getColorValue($this->autoCompleteHighlightColor)
        );

        $css->addRule(
            [$idSelector, $css->getClassSelector('title')],
            'color',
            $css->getColorValue($this->titleColor)
        );
        $css->addRule(
            [$idSelector, $css->getClassSelector('title')],
            'font-size',
            $css->getSizeValue($this->titleSize)
        );
        $css->addRule(
            [$idSelector, $css->getClassSelector('title')],
            'font-family',
            $css->getFontValue($this->titleFont)
        );

        $css->addRule(
            [$idSelector, $css->getClassSelector('text')],
            'color',
            $css->getColorValue($this->subtitleColor)
        );
        $css->addRule(
            [$idSelector, $css->getClassSelector('text')],
            'font-size',
            $css->getSizeValue($this->subtitleSize)
        );
        $css->addRule(
            [$idSelector, $css->getClassSelector('text')],
            'font-family',
            $css->getFontValue($this->subtitleFont)
        );

        if ($isScreen) {
            if ($this->galleryBackground) {
                $this->galleryBackground->toCSS(
                    $css,
                    [
                        $idSelector . $css->getClassSelector(['screen', 'gallery']),
                        $css->getClassSelector('items')
                    ]
                );
                $this->galleryBackground->toCSS(
                    $css,
                    [
                        $idSelector . $css->getClassSelector(['screen', 'photo']),
                        $css->getClassSelector('items')
                    ]
                );
            }
            if ($this->listBackground) {
                $this->listBackground->toCSS(
                    $css,
                    [
                        $idSelector . $css->getClassSelector(['screen', 'list']),
                        $css->getClassSelector('items')
                    ]
                );
            }
            if ($this->iconBackground) {
                $this->iconBackground->toCSS(
                    $css,
                    [
                        $idSelector . $css->getClassSelector(['screen', 'icon']),
                        $css->getClassSelector('items')
                    ]
                );
            }
            if ($this->appsBackground) {
                $this->appsBackground->toCSS(
                    $css,
                    [
                        $idSelector . $css->getClassSelector(['screen', 'appsscreen']),
                        $css->getClassSelector('items')
                    ]
                );
            }
        } else {
            if ($this->galleryBackground) {
                $this->galleryBackground->toCSS(
                    $css,
                    [
                        $idSelector,
                        $css->getClassSelector(['screen', 'gallery']),
                        $css->getClassSelector('items')
                    ]
                );
                $this->galleryBackground->toCSS(
                    $css,
                    [
                        $idSelector,
                        $css->getClassSelector(['screen', 'photo']),
                        $css->getClassSelector('items')
                    ]
                );
            }
            if ($this->listBackground) {
                $this->listBackground->toCSS(
                    $css,
                    [$idSelector, $css->getClassSelector(['screen', 'list']), $css->getClassSelector('items')]
                );
            }
            if ($this->iconBackground) {
                $this->iconBackground->toCSS(
                    $css,
                    [$idSelector, $css->getClassSelector(['screen', 'icon']), $css->getClassSelector('items')]
                );
            }
            if ($this->appsBackground) {
                $this->appsBackground->toCSS(
                    $css,
                    [
                        $idSelector,
                        $css->getClassSelector(['screen', 'appsscreen']),
                        $css->getClassSelector('items')
                    ]
                );
            }
        }

        //if this is an item
        if ($this->background) {
            if ($isScreen) {
                $this->background->toCSS(
                    $css,
                    [$idSelector . $css->getClassSelector(['screen', 'list']), $css->getClassSelector('item')]
                );
            } else {
                if ($isItem) {
                    $this->background->toCSS(
                        $css,
                        [
                            $css->getClassSelector(['screen', 'list']),
                            $idSelector . $css->getClassSelector('item')
                        ]
                    );
                } else {
                    $this->background->toCSS(
                        $css,
                        [
                            $idSelector,
                            $css->getClassSelector(['screen', 'list']),
                            $css->getClassSelector('item')
                        ]
                    );
                }
            }
        }

        if ($this->headerTextColor) {
            if ($isScreen) {
                $css->addRule(
                    [$idSelector . $css->getClassSelector('screen'), $css->getClassSelector('header')],
                    'color',
                    $css->getColorValue($this->headerTextColor)
                );
                $css->addRule(
                    [
                        $css->getClassSelector('android'),
                        $idSelector . $css->getClassSelector('screen'),
                        $css->getClassSelector('header'),
                        $css->getClassSelector('back')
                    ],
                    'stroke',
                    $css->getColorValue($this->headerTextColor)
                );
                $css->addRule(
                    [
                        $idSelector . $css->getClassSelector('screen'),
                        $css->getClassSelector('header'),
                        $css->getClassSelector('title')
                    ],
                    'text-shadow',
                    "0px 1px 0px " . $css->getColorValue($this->getShadowColor($this->headerTextColor))
                );
            } else {
                $css->addRule(
                    [$idSelector, $css->getClassSelector('screen'), $css->getClassSelector('header')],
                    'color',
                    $css->getColorValue($this->headerTextColor)
                );
                $css->addRule(
                    [
                        $css->getClassSelector('android'),
                        $idSelector,
                        $css->getClassSelector('screen'),
                        $css->getClassSelector('header'),
                        $css->getClassSelector('back')
                    ],
                    'stroke',
                    $css->getColorValue($this->headerTextColor)
                );
                $css->addRule(
                    [
                        $idSelector,
                        $css->getClassSelector('screen'),
                        $css->getClassSelector('header'),
                        $css->getClassSelector('title')
                    ],
                    'text-shadow',
                    "0px 1px 0px " . $css->getColorValue($this->getShadowColor($this->headerTextColor))
                );
            }
        }

        if ($isScreen) {
            $css->addRule(
                [$idSelector . $css->getClassSelector('screen'), $css->getClassSelector('header')],
                'background-color',
                $css->getColorValue($this->headerColor)
            );
        } else {
            $css->addRule(
                [$idSelector, $css->getClassSelector('screen'), $css->getClassSelector('header')],
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
                    $idSelector . $css->getClassSelector('item'),
                    'border-bottom-width',
                    $css->getSizeValue($width)
                );
            } else {
                $css->addRule(
                    [$idSelector, $css->getClassSelector('item')],
                    'border-bottom-width',
                    $css->getSizeValue($width)
                );
            }
        } else {
            if ($this->hrAfter === false) {
                if ($isItem) {
                    $css->addRule($idSelector . $css->getClassSelector('item'), 'border-bottom-width', 0);
                } else {
                    $css->addRule([$idSelector, $css->getClassSelector('item')], 'border-bottom-width', 0);
                }
            }
        }
        if ($isItem) {
            $css->addRule(
                $idSelector . $css->getClassSelector('item'),
                'border-bottom-color',
                $css->getColorValue($this->hrColor)
            );
        } else {
            $css->addRule(
                [$idSelector, $css->getClassSelector('item')],
                'border-bottom-color',
                $css->getColorValue($this->hrColor)
            );
        }

        $css->addRule($idSelector, 'padding-top', $css->getSizeValue($this->paddingTop));
        $css->addRule($idSelector, 'padding-bottom', $css->getSizeValue($this->paddingBottom));
        $css->addRule($idSelector, 'padding-left', $css->getSizeValue($this->paddingLeft));
        $css->addRule($idSelector, 'padding-right', $css->getSizeValue($this->paddingRight));
    }

    /**
     *
     * @param Color $color
     *
     * @return Color
     */
    protected function getShadowColor(Color $color)
    {
        $values = [
            'red' => $color->getRed(),
            'green' => $color->getGreen(),
            'blue' => $color->getBlue()
        ];
        foreach ($values as $key => $v) {
            if ($v > 127) {
                $v -= ($v * 0.1);
            } else {
                $v += ($v * 0.1);
            }
            $values[$key] = floor($v);
        }
        return new Color($values['red'], $values['green'], $values['blue'], $color->getAlpha());
    }

    /**
     * copy styles from $from to this
     *
     * @param \AppShed\Remote\Element\Styleable $from
     */
    public function copyStyles(Styleable $from)
    {
        $this->color = $from->getColor();
        $this->titleColor = $from->getTitleColor();
        $this->subtitleColor = $from->getSubtitleColor();
        $this->glowColor = $from->getGlowColor();
        $this->borderColor = $from->getBorderColor();
        $this->underline = $from->getUnderline();
        $this->size = $from->getSize();
        $this->fontFamily = $from->getFontFamily();
        $this->align = $from->getAlign();
        $this->bold = $from->getBold();
        $this->italic = $from->getItalic();
        $this->listBackground = $from->getListBackground();
        $this->galleryBackground = $from->getGalleryBackground();
        $this->iconBackground = $from->getIconBackground();
        $this->appsBackground = $from->getAppsBackground();
        $this->background = $from->getBackground();
        $this->hrAfter = $from->getHrAfter();
        $this->hrColor = $from->getHrColor();
        $this->hrWidth = $from->getHrWidth();
        $this->headerColor = $from->getHeaderColor();
        $this->headerTextColor = $from->getHeaderTextColor();
        $this->paddingTop = $from->getPaddingTop();
        $this->paddingBottom = $from->getPaddingBottom();
        $this->paddingLeft = $from->getPaddingLeft();
        $this->paddingRight = $from->getPaddingRight();
        $this->titleSize = $from->getTitleSize();
        $this->subtitleSize = $from->getSubtitleSize();
        $this->titleFont = $from->getTitleFont();
        $this->subtitleFont = $from->getSubtitleFont();
        $this->autoCompleteColor = $from->getAutoCompleteColor();
        $this->autoCompleteBackgroundColor = $from->getAutoCompleteBackgroundColor();
        $this->autoCompleteHighlightColor = $from->getAutoCompleteHighlightColor();
    }

}
