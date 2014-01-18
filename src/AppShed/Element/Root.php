<?php
namespace AppShed\Element;

trait Root
{
    /**
     * Get the html node for this element
     *
     * @param \AppShed\XML\DOMDocument $xml
     * @param \AppShed\HTML\Settings $settings
     *
     * @return \DOMElement
     */
    abstract public function getHTMLNode($xml, $settings);

    /**
     *
     * @return string
     */
    abstract public function getId();
}
