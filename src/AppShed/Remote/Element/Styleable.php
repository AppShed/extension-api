<?php

namespace AppShed\Remote\Element;

use AppShed\Remote\Style\Color;
use AppShed\Remote\Style\Image;

interface Styleable
{
    public function getPaddingTop();

    public function getHrAfter();

    public function setHrAfter($hrAfter);

    public function setBackground(Image $background);

    public function setAlign($align);

    public function setIconBackground(Image $iconBackground);

    public function setHeaderTextColor(Color $headerTextColor);

    public function setGalleryBackground(Image $galleryBackground);

    public function setSubtitleColor(Color $subtitleColor);

    public function setTitleSize($titleSize);

    public function getPaddingRight();

    public function getHeaderTextColor();

    public function getListBackground();

    public function setAutoCompleteHighlightColor(Color $autoCompleteHighlightColor);

    public function setSubtitleFont($subtitleFont);

    public function setPaddingTop($paddingTop);

    public function getAutoCompleteHighlightColor();

    /**
     * @param \AppShed\Remote\Style\CSSDocument $css
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    public function getCSS($css, $settings);

    public function getSubtitleSize();

    public function setTitleColor(Color $titleColor);

    public function setGlowColor(Color $glowColor);

    public function setTitleFont($titleFont);

    public function getHrColor();

    public function setFontFamily($fontFamily);

    public function setColor(Color $color);

    public function getItalic();

    public function setPaddingBottom($paddingBottom);

    public function getPaddingBottom();

    public function getIconBackground();

    public function getSubtitleFont();

    public function getGlowColor();

    public function getPaddingLeft();

    public function setHrWidth($hrWidth);

    public function getGalleryBackground();

    public function getSubtitleColor();

    public function setHeaderColor(Color $headerColor);

    public function setBold($bold);

    public function getAutoCompleteBackgroundColor();

    public function getSize();

    public function getAutoCompleteColor();

    public function setAppsBackground(Image $appsBackground);

    public function getColor();

    public function setSubtitleSize($subtitleSize);

    public function setItalic($italic);

    public function getHeaderColor();

    public function getHrWidth();

    public function getAlign();

    public function getTitleFont();

    public function getBackground();

    public function getBorderColor();

    public function getFontFamily();

    public function setPaddingRight($paddingRight);

    public function setPaddingLeft($paddingLeft);

    public function getAppsBackground();

    public function getUnderline();

    public function setUnderline($underline);

    public function getTitleColor();

    public function setAutoCompleteBackgroundColor(Color $autoCompleteBackgroundColor);

    public function getTitleSize();

    public function setHrColor(Color $hrColor);

    public function setListBackground(Image $listBackground);

    public function setAutoCompleteColor(Color $autoCompleteColor);

    public function getBold();

    public function setBorderColor(Color $borderColor);

    public function setSize($size);
}
