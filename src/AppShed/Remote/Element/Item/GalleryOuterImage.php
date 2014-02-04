<?php

namespace AppShed\Remote\Element\Item;

use AppShed\Remote\Element\Link;
use AppShed\Remote\Style\Image;

/**
 * @internal
 */
class GalleryOuterImage extends Item
{
    use Link;

    const HTML_TAG = 'td';

    /**
     *
     * @var Image
     */
    protected $thumbImage;

    public function __construct(Image $thumbImage)
    {
        parent::__construct();
        $this->thumbImage = $thumbImage;
    }

    public function getThumbImage()
    {
        return $this->thumbImage;
    }

    public function setThumbImage(Image $thumbImage)
    {
        $this->thumbImage = $thumbImage;
    }

    protected function getClass()
    {
        return parent::getClass() . ' photo';
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
        $imageDiv = $xml->createElement('div', array('class' => 'image-container'));
        $imageDiv->appendChild($xml->createImgElement($this->thumbImage->getUrl(), 'image'));
        $node->appendChild($imageDiv);
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
