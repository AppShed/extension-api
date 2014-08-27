<?php

namespace AppShed\Remote\Element\Item;

class Button extends Item
{
    use \AppShed\Remote\Element\Link;

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
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    protected function getHTMLNodeInner($node, $xml, $settings)
    {
        $node->appendChild($xml->createElement('button', ['class' => 'button', 'text' => $this->title]));
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
