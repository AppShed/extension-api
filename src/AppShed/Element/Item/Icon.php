<?php

namespace AppShed\Element\Item;

class Icon extends Item
{
    use \AppShed\Element\Link;

    const HTML_TAG = 'td';

    /**
     *
     * @var string
     */
    protected $title;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $icon;

    public function __construct($title, \AppShed\Style\Image $icon = null)
    {
        parent::__construct();
        $this->title = $title;
        $this->icon = $icon;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function setIcon(\AppShed\Style\Image $icon)
    {
        $this->icon = $icon;
    }

    protected function getClass()
    {
        return parent::getClass() . " icon";
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
        $node->appendChild($inner = $xml->createElement('div', 'item-icon-inner'));
        $inner->appendChild($xml->createImgElement($this->icon->getUrl(), 'image', $this->icon->getSize()));
        $inner->appendChild($xml->createElement('div', array('class' => 'title', 'text' => $this->title)));
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
