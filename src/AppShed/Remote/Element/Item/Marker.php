<?php

namespace AppShed\Remote\Element\Item;

use AppShed\Remote\Element\Link;

class Marker extends Item
{
    use Link;

    /**
     *
     * @var string
     */
    protected $title;

    /**
     *
     * @var string
     */
    protected $subtitle;

    /**
     *
     * @var float
     */
    protected $longitude;

    /**
     *
     * @var float
     */
    protected $latitude;


    public function __construct($title, $subtitle, $longitude, $latitude)
    {
        parent::__construct();
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->setPosition($longitude, $latitude);
    }

    public function setTitle($title)
    {
        if (strlen($title) == 0) {
            $title = ' ';
        }
        $this->title = $title;
    }

    public function setSubTitle($title)
    {
        if (strlen($title) == 0) {
            $title = ' ';
        }
        $this->subtitle = $title;
    }

    public function setPosition($longitude, $latitude)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    /* HTML Export */

    protected function getClass()
    {
        return parent::getClass() . " marker";
    }

    /**
     * Get the html node for this element
     *
     * @param \DOMElement $node
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
     *
     * @return \DOMElement
     */
    public function getHTMLNodeInner($node, $xml, $settings)
    {
        $node->setAttribute('data-latitude', $this->latitude);
        $node->setAttribute('data-longitude', $this->longitude);
        $this->applyLinkToNode($xml, $node, $settings);
        $node->appendChild($xml->createElement('div', array('class' => 'title', 'text' => $this->title)));
        $subtitle = $this->subtitle;
        if (empty($subtitle)) {
            $xml->addClass($node, 'no-subtitle');
        } else {
            $node->appendChild($xml->createElement('div', array('class' => 'text', 'text' => $this->subtitle)));
        }
        return $node;
    }

    /**
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
     *
     * @return array
     */
    public function getMarkerObject($xml, $settings)
    {
        return array(
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'html' => $xml->saveXML($this->getHTMLNode($xml, $settings))
        );
    }

}
