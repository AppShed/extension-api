<?php

namespace AppShed\Element\Item;

class Image extends Item
{
    use \AppShed\Element\Link;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $image;

    public function __construct(\AppShed\Style\Image $image)
    {
        parent::__construct();
        $this->linkArrow = null;
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage(\AppShed\Style\Image $image)
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
     * @param \Appshed\XML\DOMDocument $xml
     * @param \AppShed\HTML\Settings $settings
     */
    protected function getHTMLNodeInner($node, $xml, $settings)
    {
        $node->appendChild($xml->createImgElement($this->image->getUrl(), 'image'));
        $this->applyLinkToNode($xml, $node, $settings);
    }
}
