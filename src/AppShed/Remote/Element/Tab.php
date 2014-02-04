<?php
namespace AppShed\Remote\Element;

use AppShed\Remote\Style\Image;

class Tab extends Element
{
    use Link;

    protected $title;
    protected $icon;

    const HTML_TAG = 'td';

    public function __construct($title, Image $icon)
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

    public function getIconSrc()
    {
        return $this->icon;
    }

    public function setIcon(Image $icon)
    {
        $this->icon = $icon;
    }

    protected function getIdType()
    {
        return 'tab';
    }

    protected function getClass()
    {
        return "tab " . parent::getClass();
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
        $node->appendChild($inner = $xml->createElement('div', 'tab-inner'));
        $inner->appendChild($xml->createElement('div', array('class' => 'label', 'text' => $this->title)));
        $inner->appendChild($xml->createImgElement($this->icon->getUrl(), 'icon'));
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
