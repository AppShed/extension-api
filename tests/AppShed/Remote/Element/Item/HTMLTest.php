<?php

namespace AppShed\Remote\Element\Item;

use AppShed\Remote\HTML\Settings;
use AppShed\Remote\XML\DOMDocument;

class HTMLTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Checks that no errors are thrown
     */
    public function testInvalidHTML()
    {
        $item = new HTML('<b><i>my element');

        $doc = new DOMDocument();
        $settings = new Settings();
        $node = $item->getHTMLNode($doc, $settings);
        $xml = $doc->saveXML($node);

        $this->assertContains('<b><i>my element</i></b>', $xml);
    }
}
