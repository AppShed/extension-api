<?php

namespace AppShed\Element\Item;

class TextArea extends Item {
    use FormItem;
    /**
     *
     * @var string
     */
    protected $title;
    
    /**
     *
     * @var string
     */
    protected $value;
    
    public function __construct($variableName, $title, $value = null) {
        parent::__construct();
        $this->variableName = $variableName;
        $this->title = $title;
        $this->value = $value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    protected function getClass() {
		return parent::getClass() . " textarea";
	}
    
    /**
	 * Get the html node for this element
     * @param \DOMElement $node
	 * @param \Appshed\XML\DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
	 */
    protected function getHTMLNodeInner($node, $xml, $settings) {
        if(!empty($this->title)) {
			$node->appendChild($xml->createElement('div', array('class'=>'title', 'text'=> $this->title)));
		}
		$node->appendChild($inner = $xml->createElement('div', 'textarea-container' . (empty($this->title) ? ' no-title' : '')));
		$inner->appendChild($xml->createElement('textarea', array(
			'class' => 'textarea',
			'name' => $this->variableName,
			'text' => $this->value,
			'data-variable' => $this->variableName,
			'data-save-value' => $this->save)));
    }
}
