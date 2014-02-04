<?php

namespace AppShed\Remote\Element\Item;

class CheckBox extends Item implements FormVariable
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
     * @var boolean
     */
    protected $checked;

    public function __construct($variableName, $title, $value, $checked = false)
    {
        parent::__construct();
        $this->variableName = $variableName;
        $this->title = $title;
        $this->value = $value;
        $this->checked = $checked;
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

    public function getChecked()
    {
        return $this->checked;
    }

    public function setChecked($checked)
    {
        $this->checked = $checked;
    }

    protected function getClass()
    {
        return parent::getClass() . " textbox checkbox";
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
            $node->appendChild($xml->createElement('div', array('class' => 'title', 'text' => $this->title)));
        }
        $node->appendChild(
            $inner = $xml->createElement('div', 'textbox-container' . (empty($this->title) ? ' no-title' : ''))
        );
        $inner->appendChild(
            $xml->createElement(
                'input',
                array(
                    'type' => 'checkbox',
                    'name' => $this->variableName,
                    'data-variable' => $this->variableName,
                    'data-save-value' => $this->save,
                    'checked' => $this->checked ? 'checked' : null,
                    'value' => $this->value
                )
            )
        );
    }
}
