<?php

namespace AppShed\Remote\Element\Item;

use AppShed\Remote\Style\Image;

class Thumb extends Plain
{
    /**
     *
     * @var Image
     */
    protected $image;

    public function __construct($title, $subtitle, Image $image = null)
    {
        parent::__construct($title, $subtitle);
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage(Image $image)
    {
        $this->image = $image;
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
            $imageDiv = $xml->createElement('div', array('class' => 'image-container'));
            $node->appendChild($imageDiv);
            $imageDiv->appendChild($xml->createImgElement($this->image->getUrl(), 'image', $this->image->getSize()));
        }
        parent::getHTMLNodeInner($node, $xml, $settings);
    }
}
