<?php
namespace AppShed\Remote\XML;

/**
 * Adds some useful functions for creating HTML elements for AppShed
 */
class DOMDocument extends \DOMDocument
{

    /**
     * Set the defaults for AppShed HTML documents
     */
    public function __construct()
    {
        parent::__construct('1.0', 'UTF-8');
        $this->preserveWhiteSpace = false;
        $this->formatOutput = false;
    }

    /**
     * Create a new domelement with either a class or array of attributes given
     *
     * @param string $tag
     * @param string|array $attributes if its a string it will be the class attribute
     *
     * @return \DOMElement
     */
    public function createElement($tag, $attributes = null)
    {
        $node = parent::createElement($tag);
        $text = false;
        if (is_string($attributes)) {
            $node->setAttribute('class', $attributes);
        } else {
            if (is_array($attributes)) {
                foreach ($attributes as $key => $value) {
                    if ($key == 'text') {
                        $node->appendChild($this->createTextNode($value));
                        $text = true;
                    } else {
                        if (!is_null($value)) {
                            $node->setAttribute($key, $value);
                        }
                    }
                }
            }
        }
        if (!$text && !in_array($tag, ['img', 'br', 'input'])) {
            $node->appendChild($this->createTextNode(''));
        }
        return $node;
    }

    /**
     * Add a class to the element
     *
     * @param \DOMElement $node
     * @param string $class
     */
    public function addClass($node, $class)
    {
        $c = $node->getAttribute('class');
        $c .= " $class";
        $node->setAttribute('class', $c);
    }

    /**
     *
     * @param string $src
     * @param string|array $attributes if its a string it will be the class attribute
     * @param \AppShed\Remote\Style\Size $imageSize an array containing width and height
     *
     * @return \DOMElement
     */
    public function createImgElement($src, $attributes, $imageSize = null)
    {
        if (empty($src)) {
            $tag = 'div';
        } else {
            $tag = 'img';
            if (is_array($attributes)) {
                $attributes['src'] = $src;
            } else {
                $attributes = [
                    'class' => $attributes,
                    'src' => $src
                ];
            }
            if ($imageSize) {
                $attributes['width'] = $imageSize['width'];
                $attributes['height'] = $imageSize['height'];
            }
        }
        return $this->createElement($tag, $attributes);
    }
}
