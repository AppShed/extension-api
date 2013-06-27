<?php

namespace AppShed\Element\Item;

abstract class Item  extends \AppShed\Element\Element {
    
    /**
     *
     * @var boolean
     */
    protected $headerItem = false;
    
    public function getHeaderItem() {
        return $this->headerItem;
    }

    public function setHeaderItem($headerItem) {
        $this->headerItem = $headerItem;
    }
    
    protected function getClass() {
		return parent::getClass() . " item";
	}
	
	protected function getIdType() {
		return "item";
	}
	
    /**
	 * Get the html node for this element
     * @param array $javascripts
	 * @param \AppShed\HTML\Settings $settings
	 */
	public function getJavascript(&$javascripts, $settings) {
	
	}
}
