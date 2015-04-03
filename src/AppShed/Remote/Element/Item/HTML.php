<?php

namespace AppShed\Remote\Element\Item;

class HTML extends Item
{
    /**
     *
     * @var string
     */
    protected $html;

    public function __construct($html)
    {
        parent::__construct();
        $this->html = $html;
    }

    protected function getClass()
    {
        return parent::getClass() . ' html';
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function setHtml($html)
    {
        $this->html = $html;
    }


    /**
     * Get the html node for this element
     *
     * @param \DOMElement $node
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    protected function getHTMLNodeInner($node, $xml, $settings)
    {
        $node->appendChild($htmlNode = $xml->createElement('div', 'html'));
        $html = $this->html;

        if ($html != '') {
            $fragDoc = new \DOMDocument();
            $libxml_previous_state = libxml_use_internal_errors(true);
            $fragDoc->loadHTML(
                '<?xml version="1.0" encoding="utf-8" standalone="yes"?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/ loose.dtd"><html><head><title></title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head><body>' . $html . '</body></html>'
            );
            libxml_clear_errors();
            libxml_use_internal_errors($libxml_previous_state);
            if ($fragDoc->hasChildNodes()) {
                $body = $fragDoc->getElementsByTagName('body')->item(0);
                if ($body->hasChildNodes()) {
                    for ($i = 0; $i < $body->childNodes->length; $i++) {
                        $iNode = $body->childNodes->item($i);
                        $importedNode = $xml->importNode($iNode, true);
                        $htmlNode->appendChild($importedNode);
                    }

                    $this->checkNode($xml, $htmlNode);
                }
            }
        }
    }

    /**
     *
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \DOMNode $node
     */
    private function checkNode($xml, $node)
    {
        if ($node->hasChildNodes()) {
            for ($i = 0; $i < $node->childNodes->length; $i++) {
                $this->checkNode($xml, $node->childNodes->item($i));
            }
        } else {
            if ($node instanceof \DOMElement && !in_array($node->tagName, ['img', 'br'])) {
                $node->appendChild($xml->createTextNode(''));
            }
        }
    }
}
