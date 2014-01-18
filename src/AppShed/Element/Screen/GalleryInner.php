<?php
namespace AppShed\Element\Screen;

/**
 * @internal The inner of the gallery screens, you never need to create one yourself
 */
class GalleryInner extends Screen
{
    const TYPE = 'photo';
    const TYPE_CLASS = 'gallery';

    /**
     * @var \AppShed\Element\Item\GalleryImage[]
     */
    protected $children = [];

    public function getId()
    {
        return 'gallery' . parent::getId();
    }

    /**
     * @param \AppShed\Element\Item\GalleryImage[] $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @param \AppShed\Element\Item\GalleryImage $child
     */
    public function addChild($child)
    {
        $this->children[] = $child;
    }

    /**
     * @return \AppShed\Element\Item\GalleryImage[]
     */
    public function getChildren()
    {
        return $this->children;
    }
}
