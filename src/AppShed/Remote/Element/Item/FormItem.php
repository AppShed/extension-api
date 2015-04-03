<?php

namespace AppShed\Remote\Element\Item;

trait FormItem
{
    /**
     *
     * @var string
     */
    protected $variableName;
    /**
     *
     * @var boolean
     */
    protected $save;
    /**
     *
     * @var boolean
     */
    protected $post;

    public function getVariableName()
    {
        return $this->variableName;
    }

    public function setVariableName($variableName)
    {
        $this->variableName = $variableName;
    }

    public function getSave()
    {
        return $this->save;
    }

    public function setSave($save)
    {
        $this->save = $save;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function setPost($post)
    {
        $this->post = $post;
    }
}
