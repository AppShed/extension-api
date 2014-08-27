<?php

namespace AppShed\Remote\Element\Item;

class Link extends Item
{
    use \AppShed\Remote\Element\Link;

    /**
     *
     * @var string
     */
    protected $title;

    /**
     *
     * @var \AppShed\Remote\Style\Image
     */
    protected $image;

    public function __construct($title, \AppShed\Remote\Style\Image $image = null)
    {
        parent::__construct();
        $this->title = $title;
        $this->image = $image;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage(\AppShed\Remote\Style\Image $image)
    {
        $this->image = $image;
    }

    protected function getClass()
    {
        return parent::getClass() . " plain";
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
        if ($this->image) {
            $node->appendChild($xml->createImgElement($this->image->getUrl(), 'icon', $this->image->getSize()));
        }
        $node->appendChild($xml->createElement('div', ['class' => 'text', 'text' => $this->title]));
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
