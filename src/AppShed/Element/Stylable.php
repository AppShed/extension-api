<?php

namespace AppShed\Element;

interface Stylable
{
    public function getHeaderDisplay();

    public function getPaddingTop();

    public function getHrAfter();

    public function setHrAfter($hrAfter);

    public function setBackground(\AppShed\Style\Image $background);

    public function setAlign($align);

    public function setIconBackground(\AppShed\Style\Image $iconBackground);

    public function setHeaderTextColor(\AppShed\Style\Color $headerTextColor);

    public function setGalleryBackground(\AppShed\Style\Image $galleryBackground);

    public function setSubtitleColor(\AppShed\Style\Color $subtitleColor);

    public function setTitleSize($titleSize);

    public function setHeaderDisplay($headerDisplay);

    public function getPaddingRight();

    public function getHeaderTextColor();

    public function getListBackground();

    public function setAutoCompleteHighlightColor(\AppShed\Style\Color $autoCompleteHighlightColor);

    public function setSubtitleFont($subtitleFont);

    public function setPaddingTop($paddingTop);

    public function getAutoCompleteHighlightColor();

    /**
     * @param \AppShed\Style\CSSDocument $css
     * @param \AppShed\HTML\Settings $settings
     */
    public function getCSS($css, $settings);

    public function getSubtitleSize();

    public function setTitleColor(\AppShed\Style\Color $titleColor);

    public function setGlowColor(\AppShed\Style\Color $glowColor);

    public function setTitleFont($titleFont);

    public function getHrColor();

    public function setFontFamily($fontFamily);

    public function setColor(\AppShed\Style\Color $color);

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

    public function setHeaderColor(\AppShed\Style\Color $headerColor);

    public function setBold($bold);

    public function getAutoCompleteBackgroundColor();

    public function getSize();

    public function getAutoCompleteColor();

    public function setAppsBackground(\AppShed\Style\Image $appsBackground);

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

    public function setAutoCompleteBackgroundColor(\AppShed\Style\Color $autoCompleteBackgroundColor);

    public function getTitleSize();

    public function setHrColor(\AppShed\Style\Color $hrColor);

    public function setListBackground(\AppShed\Style\Image $listBackground);

    public function setAutoCompleteColor(\AppShed\Style\Color $autoCompleteColor);

    public function getBold();

    public function setBorderColor(\AppShed\Style\Color $borderColor);

    public function setSize($size);
}