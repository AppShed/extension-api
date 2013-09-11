<?php

namespace AppShed\Element\Item;

class Marker extends Item {
    use \AppShed\Element\Link;

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
    
    
    public function __construct($title, $subtitle, $longitude, $latitude) {
        parent::__construct();
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->setPosition($longitude, $latitude);
    }

    public function setTitle($title) {
        if (strlen($title) == 0) {
            $title = ' ';
        }
        $this->setAttribute('title', $title);
    }

    public function setSubTitle($title) {
        if (strlen($title) == 0) {
            $title = ' ';
        }
        $this->setAttribute('subtitle', $title);
    }

    public function setPosition($longitude, $latitude) {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    /* HTML Export */

    protected function getClass() {
        return parent::getClass() . " marker";
    }

    /**
     * Get the html node for this element
     * @param AppBuilderAPIDOMDocument $xml
     * @param array $data
     * @return DOMElement
     */
    public function getHTMLNodeInner($node, $xml, $settings) {
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
    }
    
    public function getMarkerObject($xml, &$data) {
		return array(
			'title' => $this->title,
			'subtitle' => $this->subtitle,
			'latitude' => $this->latitude,
			'longitude' => $this->longitude,
			'html' => $xml->saveXML($this->getHTMLNode($xml, $data))
		);
	}

}
