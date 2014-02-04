<?php

namespace AppShed\Remote\Element\Item;

use AppShed\Remote\Style\Image;

class GalleryImage extends Item
{
    /**
     *
     * @var Image
     */
    protected $image;

    /**
     *
     * @var Image
     */
    protected $thumbImage;

    /**
     *
     * @var boolean
     */
    protected $disableInner;


    public function __construct(Image $image, Image $thumbImage = null)
    {
        parent::__construct();
        $this->image = $image;
        $this->thumbImage = $thumbImage;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage(Image $image)
    {
        $this->image = $image;
    }

    public function getThumbImage()
    {
        return $this->thumbImage ? $this->thumbImage : $this->image;
    }

    public function setThumbImage(Image $thumbImage)
    {
        $this->thumbImage = $thumbImage;
    }

    public function getDisableInner()
    {
        return $this->disableInner;
    }

    public function setDisableInner($disableInner)
    {
        $this->disableInner = $disableInner;
    }

    protected function getClass()
    {
        return parent::getClass() . ' gallery';
    }

    public function getId($plain = false)
    {
        if ($plain) {
            return parent::getId();
        }
        return 'gallery' . parent::getId();
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
    }
}
