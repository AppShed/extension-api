<?php
namespace AppShed\Element\Screen;

class Map extends Screen
{
    const TYPE = 'map';
    const TYPE_CLASS = 'map';

    protected $zoom = 12;
    protected $scroll = false;

    /**
     * @var \AppShed\Element\Item\Marker[]
     */
    protected $children = [];

    public function getZoom()
    {
        return $this->zoom;
    }

    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
    }

    /**
     * @param \AppShed\Element\Item\Marker[] $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @param \AppShed\Element\Item\Marker $child
     */
    public function addChild($child)
    {
        $this->children[] = $child;
    }

    /**
     * @return \AppShed\Element\Item\Marker[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Get the html node for this element
     *
     * @param \DOMElement $node
     * @param \AppShed\XML\DOMDocument $xml
     * @param \AppShed\HTML\Settings $settings
     * @param \AppShed\Style\CSSDocument $css
     * @param array $javascripts
     */
    protected function getHTMLNodeBase($node, $xml, $settings, $css, &$javascripts)
    {
        parent::getHTMLNodeBase($node, $xml, $settings, $css, $javascripts);
        $node->setAttribute('data-zoom', $this->zoom);
    }

    /**
     *
     * @param \DOMElement $items
     * @param \AppShed\XML\DOMDocument $xml
     * @param \AppShed\HTML\Settings $settings
     * @param \AppShed\Style\CSSDocument $css
     * @param array $javascripts
     *
     * @return \AppShed\Element\Item\Item[] of header items
     */
    protected function addHTMLChildren($items, $xml, $settings, $css, &$javascripts)
    {
        $items->appendChild($itemsInner = $xml->createElement('script', array('type' => 'application/json')));

        $settings->pushCurrentScreen($this->getId());

        $locs = array();
        $headButtons = array();
        foreach ($this->children as $child) {
            if ($child->getHeaderItem()) {
                $headButtons[] = $child;
            } else {
                $locs[] = $child->getMarkerObject($xml, $settings);
                $child->getCSS($css, $settings);
                $child->getJavascript($javascripts, $settings);
            }

        }
        $itemsInner->appendChild($xml->createTextNode(json_encode($locs)));

        $settings->popCurrentScreen();

        return $headButtons;
    }
}
