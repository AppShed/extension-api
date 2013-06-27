<?php
namespace AppShed\Element\Screen;

class Gallery extends Screen {
    const TYPE = 'photo';
    const TYPE_CLASS = 'photo';
    
    /**
     *
     * @var int
     */
    protected $columns = 3;
    /**
     *
     * @var GalleryInner
     */
    protected $innerScreen;
            
    public function __construct($title, $columns = 3) {
        parent::__construct($title);
        $this->columns = $columns;
    }
    
    public function getColumns() {
        return $this->columns;
    }

    public function setColumns($columns) {
        $this->columns = $columns;
    }
    
   /**
	 * Get the html node for this element
     * @param \DOMElement $node
	 * @param \Appshed\XML\DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
	 */
    protected function getHTMLNodeInner($node, $xml, $settings) {
        parent::getHTMLNodeInner($node, $xml, $settings);
        $this->innerScreen = new GalleryInner($this->title);
        $this->innerScreen->copyStyles($this);
        $this->innerScreen->setId($this->getId());
        $this->innerScreen->setUpdated(false);
        $this->innerScreen->setChildren(array_filter($this->children, function ($child) {
            return !$child->getDisableInner();
        }));
        $this->innerScreen->setBack($this);
        $this->innerScreen->getHTMLNode($xml, $settings);
	}
	
	/**
	 *
	 * @param \DOMElement $items
	 * @param \DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
     * @param \AppShed\Style\CSSDocument $css
     * @param array $javascripts
	 */
	protected function addHTMLChildren($items, $xml, $settings, $css, &$javascripts) {
		$items->appendChild($itemsInner = $xml->createElement('div', 'items-inner'));
		$itemsInner->appendChild($table = $xml->createElement('table'));
		$table->appendChild($row = $xml->createElement('tr'));
		
		$settings->pushCurrentScreen($this->getId());
		
		$i = 0;
		$headButtons = array();
		foreach ($this->children as $child) {
            if($child->getHeaderItem()) {
                $headButtons[] = $child;
            }
            else {
                $child->getCSS($css, $settings);
                $outerChild = new AppShed\Element\Item\GalleryOuterImage($child->getThumbImage());
                $outerChild->copyStyles($child);
                $id = $child->getId(true);
                $outerChild->setId($id);
                if(!$child->getDisableInner()) {
                    $outerChild->setScreenLink($this->innerScreen, '#' . $child->getIdType() . $settings->getPrefix() . $child->getId());
                }
                $outerChildNode = $outerChild->getHTMLNode($xml, $settings);
                if ($outerChildNode) {
                    if($i == $this->columns) {
                        $table->appendChild($row = $xml->createElement('tr'));
                        $i = 0;
                    }
                    $i++;
                    $row->appendChild($outerChildNode);
                }
            }
		}
		while($i < $this->columns) {
			$row->appendChild($xml->createElement('td'));
			$i++;
		}
		
		$settings->popCurrentScreen();
        
        return $headButtons;
	}
}
