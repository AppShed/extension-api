<?php

namespace AppShed\Remote\Element\Item;

class Plain extends Item
{
    use \AppShed\Remote\Element\Link;

    /**
     *
     * @var string
     */
    protected $title;
    /**
     *
     * @var string
     */
    protected $subtitle;

    public function __construct($title, $subtitle)
    {
        parent::__construct();
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    protected function getClass()
    {
        return parent::getClass() . " thumb";
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
        $node->appendChild($xml->createElement('div', array('class' => 'title', 'text' => $this->title)));
        $node->appendChild($xml->createElement('div', array('class' => 'text', 'text' => $this->subtitle)));
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
