<?php

namespace AppShed\Element\Item;

class Select extends Item
{
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

    /**
     *
     * @var array
     */
    protected $options = array();

    public function __construct($variableName, $title)
    {
        parent::__construct();
        $this->variableName = $variableName;
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    protected function getClass()
    {
        return parent::getClass() . " select";
    }

    public function addOption($name, $value)
    {
        $this->options[] = array(
            'name' => $name,
            'value' => $value
        );
    }


    /**
     * Get the html node for this element
     *
     * @param \DOMElement $node
     * @param \Appshed\XML\DOMDocument $xml
     * @param \AppShed\HTML\Settings $settings
     */
    protected function getHTMLNodeInner($node, $xml, $settings)
    {
        if (!empty($this->title)) {
            $node->appendChild($xml->createElement('div', array('class' => 'title', 'text' => $this->title)));
        }

        $node->appendChild(
            $inner = $xml->createElement(
                'div',
                'selected-container' . (empty($this->title) ? ' no-title' : '')
            )
        );

        $inner->appendChild(
            $select = $xml->createElement(
                'select',
                array(
                    'name' => $this->variableName,
                    'data-variable' => $this->variableName,
                    'data-save-value' => $this->save
                )
            )
        );

        foreach ($this->options as $option) {
            $optionNode = $xml->createElement('option', array('value' => $option['value'], 'text' => $option['name']));
            $select->appendChild($optionNode);
            if ($option['value'] == $this->value) {
                $optionNode->setAttribute('selected', 'selected');
            }
        }
    }
}
