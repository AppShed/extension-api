<?php

namespace AppShed\Remote\Element;

abstract class Element implements Styleable
{
    use Style;

    private static $ID = 0;

    private $id;

    protected $editable = false;
    /**
     *
     * @var array
     */
    protected $classes = [];

    /**
     *
     * @var \DOMElement
     */
    protected $node;

    const HTML_TAG = 'div';

    /**
     * Create a new item
     */
    protected function __construct()
    {
        $this->id = static::id();
    }

    /**
     * Ids should be unique, most of the time the generated id will be fine
     * @internal Used by AppShed, but you should never need to use it
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add a class to this element
     *
     * @param string $class
     */
    public function addClass($class)
    {
        $this->classes[] = $class;
    }

    /**
     * Get the classes on this element
     * @return array
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * Get the classes as a string to put in the attribute
     * @return string
     */
    protected function getClass()
    {
        return implode(' ', $this->classes);
    }

    /**
     * Mark element as editable in AppShed
     *
     * @internal Used to allow AppShed to edit elements
     *
     * @param bool $editable
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;
    }


    /**
     * Get the html node for this element
     *
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
     *
     * @return \DOMElement
     */
    public function getHTMLNode($xml, $settings)
    {
        if (!$this->node) {
            $this->node = $xml->createElement(static::HTML_TAG, $this->getClass());
            $this->node->setAttribute('id', $this->getIdType() . $settings->getPrefix() . $this->getId());
            if (!$this->editable) {
                $this->node->setAttribute('data-editable', 'false');
            }
            $this->getHTMLNodeInner($this->node, $xml, $settings);
        }
        return $this->node;
    }

    /**
     * Get the html node for this element
     *
     * @param \DOMElement $node
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    abstract protected function getHTMLNodeInner($node, $xml, $settings);

    /**
     * Generates unique ids for elements
     * @return string
     */
    private static function id()
    {
        return "a" . self::$ID++;
    }
}
