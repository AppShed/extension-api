<?php

namespace AppShed\Remote\Element\Item;

use AppShed\Remote\Element\Element;

abstract class Item extends Element
{

    /**
     *
     * @var boolean
     */
    protected $headerItem = false;

    public function getHeaderItem()
    {
        return $this->headerItem;
    }

    public function setHeaderItem($headerItem)
    {
        $this->headerItem = $headerItem;
    }

    protected function getClass()
    {
        return parent::getClass() . " item";
    }

    protected function getIdType()
    {
        return "item";
    }

    /**
     * Get the html node for this element
     *
     * @param array $javascripts
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    public function getJavascript(&$javascripts, $settings)
    {

    }
}
