<?php

namespace AppShed\Remote\Element\Item;

class Select extends Item implements FormVariable
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
    protected $options = [];

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
        $this->options[] = [
            'name' => $name,
            'value' => $value
        ];
    }


    /**
     * Get the html node for this element
     *
     * @param \DOMElement $node
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    protected function getHTMLNodeInner($node, $xml, $settings)
    {
        if (!empty($this->title)) {
            $node->appendChild($xml->createElement('div', ['class' => 'title', 'text' => $this->title]));
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
                [
                    'name' => $this->variableName,
                    'data-variable' => $this->variableName,
                    'data-save-value' => $this->save
                ]
            )
        );

        foreach ($this->options as $option) {
            $optionNode = $xml->createElement('option', ['value' => $option['value'], 'text' => $option['name']]);
            $select->appendChild($optionNode);
            if ($option['value'] == $this->value) {
                $optionNode->setAttribute('selected', 'selected');
            }
        }
    }
}
