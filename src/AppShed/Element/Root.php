<?php
namespace AppShed\Element;

interface Root
{
    /**
     * Get the html node for this element
     *
     * @param \AppShed\XML\DOMDocument $xml
     * @param \AppShed\HTML\Settings $settings
     *
     * @return \DOMElement
     */
    public function getHTMLNode($xml, $settings);

    /**
     *
     * @return string
     */
    public function getId();
}
