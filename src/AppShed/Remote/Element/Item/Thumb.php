<?php

namespace AppShed\Remote\Element\Item;

class Thumb extends Plain
{
    /**
     *
     * @var Image
     */
    protected $image;

    public function __construct($title, $subtitle, \AppShed\Remote\Style\Image $image = null)
    {
        parent::__construct($title, $subtitle);
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
