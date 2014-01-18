<?php

namespace AppShed\Element\Item;

class Button extends Item
{
    use \AppShed\Element\Link;

    /**
     *
     * @var string
     */
    protected $title;

    public function __construct($title)
    {
        parent::__construct();
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

    protected function getClass()
    {
        return parent::getClass() . " button";
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
        $node->appendChild($xml->createElement('button', array('class' => 'button', 'text' => $this->title)));
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
