<?php
namespace AppShed\Remote\Element;

interface Root
{
    /**
     * Get the html node for this element
     *
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
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
