<?php

namespace AppShed\Element\Item;

class Input extends Item {
    use FormItem;
    
    const INPUT_TYPE = 'text';
    
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
    
    /**
     *
     * @var string
     */
    protected $placeHolder;
    
    /**
     *
     * @var string
     */
    protected $autocomplete;
    
    /**
     *
     * @var string
     */
    protected $autoCompleteUrl;
    
    /**
     *
     * @var string
     */
    protected $autoCompleteVariable;


    /**
     *
     * @var boolean
     */
    protected $localsearch;
    
    public function __construct($variableName, $title, $value = null, $placeHolder = null) {
        parent::__construct();
        $this->title = $title;
        $this->variableName = $variableName;
        $this->value = $value;
        $this->placeholder = $placeHolder;
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

    public function getPlaceHolder() {
        return $this->placeHolder;
    }

    public function setPlaceHolder($placeHolder) {
        $this->placeHolder = $placeHolder;
    }

    public function getAutoCompleteUrl() {
        return $this->autoCompleteUrl;
    }

    public function setAutoCompleteUrl($autoCompleteUrl, $variable = null) {
        $this->autoCompleteUrl = $autoCompleteUrl;
        $this->autoCompleteVariable = $variable;
    }
    
    public function getAutoCompleteVariable() {
        return $this->autoCompleteVariable;
    }

    public function getLocalSearch() {
        return $this->localSearch;
    }

    public function setLocalSearch($localSearch) {
        $this->localsearch = $localSearch;
    }

    protected function getClass() {
		return parent::getClass() . " textbox";
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
		$node->appendChild($inner = $xml->createElement('div', 'textbox-container' . (empty($this->title) ? ' no-title' : '')));
		$inner->appendChild($xml->createElement('input', array(
			'class'=>'textbox' . ($this->localsearch ? ' localsearch' : ''),
			'type'=>static::INPUT_TYPE,
			'name'=>$this->variableName,
			'value'=>$this->value,
			'placeholder'=>$this->placeholder,
			'data-variable' => $this->variableName,
			'data-save-value' => $this->save,
			'data-autocomplete-url' => $this->autocomplete,
			'data-autocomplete-variable' => $this->autoCompleteVariable ? $this->autoCompleteVariable : $this->variableName)));
    }
}
