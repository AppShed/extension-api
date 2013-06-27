<?php

namespace AppShed\Element\Item;

class Text extends HTML {
    
    /**
     *
     * @var string
     */
    protected $text;
    
    public function __construct($text) {
        $this->text = $text;
        parent::__construct(nl2br(htmlentities($text)));
    }
    
    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
        $this->setHtml(nl2br(htmlentities($text)));
    }
}
