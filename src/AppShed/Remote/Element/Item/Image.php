<?php

namespace AppShed\Remote\Element\Item;

use AppShed\Remote\Element\Link;

class Image extends Item
{
    use Link;

    /**
     *
     * @var \AppShed\Remote\Style\Image
     */
    protected $image;

    public function __construct(\AppShed\Remote\Style\Image $image)
    {
        parent::__construct();
        $this->linkArrow = null;
        $this->image = $image;
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
        return parent::getClass() . ' image';
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
        $node->appendChild($xml->createImgElement($this->image->getUrl(), 'image'));
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
