<?php
namespace AppShed\Element;


trait Id
{

    /**
     * Get the Id of this element
     * @return string
     */
    abstract public function getId();

    /**
     * Get the id type for this element, will be overridden by various elements
     * @return string
     */
    abstract protected function getIdType();
}
