<?php

namespace AppShed\Element;

trait Container
{
    protected $children = array();

    public function setChildren($children)
    {
        $this->children = $children;
    }

    public function addChild($child)
    {
        $this->children[] = $child;
    }

    public function getChildren()
    {
        return $this->children;
    }
}
