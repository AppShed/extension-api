<?php
namespace AppShed\Remote\Element\Screen;

class Icon extends Screen
{
    const TYPE = 'icon';
    const TYPE_CLASS = 'icon';

    /**
     *
     * @var int
     */
    protected $columns = 3;

    /**
     * @var \AppShed\Remote\Element\Item\Icon[]
     */
    protected $children = [];

    public function __construct($title, $columns = 3)
    {
        parent::__construct($title);
        $this->columns = $columns;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /**
     * @param \AppShed\Remote\Element\Item\Icon[] $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @param \AppShed\Remote\Element\Item\Icon $child
     */
    public function addChild($child)
    {
        $this->children[] = $child;
    }

    /**
     * @return \AppShed\Remote\Element\Item\Icon[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     *
     * @param \DOMElement $items
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
     * @param \AppShed\Remote\Style\CSSDocument $css
     * @param array $javascripts
     *
     * @return \AppShed\Remote\Element\Item\Item[] of header items
     */
    protected function addHTMLChildren($items, $xml, $settings, $css, &$javascripts)
    {
        $items->appendChild($itemsInner = $xml->createElement('div', 'items-inner'));
        $itemsInner->appendChild($table = $xml->createElement('table'));
        $table->appendChild($row = $xml->createElement('tr'));

        $settings->pushCurrentScreen($this->getId());

        $i = 0;
        $headButtons = array();
        foreach ($this->children as $child) {
            if ($child->getHeaderItem()) {
                $headButtons[] = $child;
            } else {
                $childNode = $child->getHTMLNode($xml, $settings);
                if ($childNode) {
                    if ($i == $this->columns) {
                        $table->appendChild($row = $xml->createElement('tr'));
                        $i = 0;
                    }
                    $i++;
                    $row->appendChild($childNode);
                }
                $child->getCSS($css, $settings);
                $child->getJavascript($javascripts, $settings);
            }
        }

        while ($i < $this->columns) {
            $row->appendChild($xml->createElement('td'));
            $i++;
        }

        $settings->popCurrentScreen();

        return $headButtons;
    }
}
