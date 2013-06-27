<?php

namespace AppShed\Element\Item;

class Thumb extends Plain {
    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $image;
    
    public function __construct($title, $subtitle, \AppShed\Style\Image $image = null) {
        parent::__construct($title, $subtitle);
        $this->image = $image;
    }
    
    public function getImage() {
        return $this->image;
    }

    public function setImage(\AppShed\Style\Image $image) {
        $this->image = $image;
    }

    /**
	 * Get the html node for this element
     * @param \DOMElement $node
	 * @param \Appshed\XML\DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
	 */
    protected function getHTMLNodeInner($node, $xml, $settings) {
		if($this->image) {
			$imageDiv = $xml->createElement('div', array('class' => 'image-container'));
			$node->appendChild($imageDiv);
			$imageDiv->appendChild($xml->createImgElement($this->image->getUrl(), 'image', $this->image->getSize()));
		}
		parent::getHTMLNodeInner($node, $xml, $settings);
	}
}
