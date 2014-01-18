<?php

namespace AppShed\Element\Item;

/**
 * @internal
 */
class GalleryOuterImage extends Item
{
    use \AppShed\Element\Link;

    const HTML_TAG = 'td';

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $thumbImage;

    public function __construct(\AppShed\Style\Image $thumbImage)
    {
        parent::__construct();
        $this->thumbImage = $thumbImage;
    }

    public function getThumbImage()
    {
        return $this->thumbImage;
    }

    public function setThumbImage(\AppShed\Style\Image $thumbImage)
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
     * @param \Appshed\XML\DOMDocument $xml
     * @param \AppShed\HTML\Settings $settings
     */
    protected function getHTMLNodeInner($node, $xml, $settings)
    {
        $imageDiv = $xml->createElement('div', array('class' => 'image-container'));
        $imageDiv->appendChild($xml->createImgElement($this->thumbImage->getUrl(), 'image'));
        $node->appendChild($imageDiv);
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
