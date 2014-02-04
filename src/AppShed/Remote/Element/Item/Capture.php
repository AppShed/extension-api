<?php

namespace AppShed\Remote\Element\Item;

class Capture extends Item implements FormVariable
{
    use FormItem;

    const TYPE_VIDEO = 'video';
    const TYPE_AUDIO = 'audio';
    const TYPE_PHOTO = 'photo';

    protected $type = self::TYPE_PHOTO;

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

    public function __construct($variableName, $type, $title, $subtitle = null)
    {
        parent::__construct();
        $this->variableName = $variableName;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->type = $type;
        $this->post = true;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    protected function getClass()
    {
        return parent::getClass() . " capture thumb {$this->type}";
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
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
        $node->setAttribute('data-capturetype', $this->type);
        $node->setAttribute('data-name', $this->variableName);
        $node->setAttribute('data-save-value', $this->save);

        $node->appendChild($on = $xml->createElement('div', 'on'));

        $on->appendChild($xml->createElement('div', 'image'));
        $on->appendChild($xml->createElement('div', array('class' => 'title', 'text' => $this->title)));
        $on->appendChild($xml->createElement('div', array('class' => 'text', 'text' => $this->subtitle)));

        $on->appendChild($xml->createElement('button', array('class' => 'capture', 'text' => 'Capture')));
        $on->appendChild($xml->createElement('button', array('class' => 'choose', 'text' => 'Choose')));

        $node->appendChild($off = $xml->createElement('div', 'off'));

        $off->appendChild(
            $xml->createElement('div', array('class' => 'title', 'text' => ucfirst($this->type) . ' Capture'))
        );
        $off->appendChild(
            $xml->createElement(
                'div',
                array(
                    'class' => 'text',
                    'text' => "You need to install this app via the store to use {$this->type} capture"
                )
            )
        );
    }
}
