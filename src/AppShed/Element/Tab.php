<?php
namespace AppShed\Element;

class Tab {
    use Link;
    
    protected $title;
    protected $iconSrc;
    
    const HTML_TAG = 'td';
    
    public function __construct($title, $iconSrc) {
        parent::__construct();
        $this->title = $title;
        $this->iconSrc = $iconSrc;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getIconSrc() {
        return $this->iconSrc;
    }

    public function setIconSrc($iconSrc) {
        $this->iconSrc = $iconSrc;
    }
    
	protected function getIdType() {
        return 'tab';
    }
    
    protected function getClass() {
		return "tab " . parent::getClass();
	}
    
    /**
	 * Get the html node for this element
     * @param \DOMElement $node
	 * @param \Appshed\XML\DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
	 */
    protected function getHTMLNodeInner($node, $xml, $settings) {
        $node->appendChild($inner = $xml->createElement('div', 'tab-inner'));
        $inner->appendChild($xml->createElement('div', array('class'=>'label', 'text' => $this->title)));
        $inner->appendChild($xml->createImgElement($this->iconSrc, 'icon'));
    }
}
