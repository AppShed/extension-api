<?php
namespace AppShed\Element\Screen;

/**
 * @internal The inner of the gallery screens, you never need to create one yourself
 */
class GalleryInner extends Screen {
    const TYPE = 'photo';
    const TYPE_CLASS = 'gallery';
    
    public function getId() {
		return 'gallery' . parent::getId();
	}
}
