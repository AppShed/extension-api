<?php

namespace AppShed\Element\Item;

class GalleryImage extends Item
{
    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $image;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $thumbImage;

    /**
     *
     * @var boolean
     */
    protected $disableInner;


    public function __construct(\AppShed\Style\Image $image, \AppShed\Style\Image $thumbImage = null)
    {
        parent::__construct();
        $this->image = $image;
        $this->thumbImage = $thumbImage;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage(\AppShed\Style\Image $image)
    {
        $this->image = $image;
    }

    public function getThumbImage()
    {
        return $this->thumbImage ? $this->thumbImage : $this->image;
    }

    public function setThumbImage(\AppShed\Style\Image $thumbImage)
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
     * @param \Appshed\XML\DOMDocument $xml
     * @param \AppShed\HTML\Settings $settings
     */
    protected function getHTMLNodeInner($node, $xml, $settings)
    {
        $node->appendChild($xml->createImgElement($this->image->getUrl(), 'image'));
    }
}
