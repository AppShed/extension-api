<?php

namespace AppShed\Element\Screen;

class Screen extends \AppShed\Element\Element {
    use \AppShed\Element\Container;
    use \AppShed\Element\Root;
    
    const TYPE = 'list';
    const TYPE_CLASS = 'list';
    
    /**
     *
     * @var boolean|int|Screen
     */
    protected $back = true;
    
    /**
     *
     * @var string
     */
    protected $title;
    
    /**
     * Display header with this screen, of float it
     * @var boolean|string
     */
    protected $header = true;
    
    /**
     * The tab this screen is displayed on
     * @var int
     */
    protected $tab;
    
    /**
     *
     * @var bool
     */
    protected $scroll = true;
    
    /**
     *
     * @var boolean
     */
    protected $secure;
    
    /**
     * float/black/normal
     * @var string
     */
    protected $statusBarStyle;
    
    /**
     *
     * @var boolean|\DateTime
     */
    protected $updated;
    
    /**
     * Display tabs with this screen, of float them
     * @var boolean|string
     */
    protected $tabs = true;
    
    /**
     *
     * @var string
     */
    protected $customCSS;


    public function __construct($title) {
        parent::__construct();
        $this->title = $title;
    }
    
    protected function getIdType() {
        return 'screen';
    }
	
	protected function getClass() {
		return parent::getClass() . " screen " . static::TYPE_CLASS;
	}
    
    public function getBack() {
        return $this->back;
    }

    public function setBack($back) {
        $this->back = $back;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getHeader() {
        return $this->header;
    }

    public function setHeader($header) {
        $this->header = $header;
    }

    public function getTab() {
        return $this->tab;
    }

    public function setTab($tab) {
        $this->tab = $tab;
    }

    public function getScroll() {
        return $this->scroll;
    }

    public function setScroll($scroll) {
        $this->scroll = $scroll;
    }

    public function getSecure() {
        return $this->secure;
    }

    public function setSecure($secure) {
        $this->secure = $secure;
    }

    public function getStatusBarStyle() {
        return $this->statusBarStyle;
    }

    public function setStatusBarStyle($statusBarStyle) {
        $this->statusBarStyle = $statusBarStyle;
    }
    
    public function getUpdated() {
        return $this->updated;
    }

    public function setUpdated($updated) {
        $this->updated = $updated;
    }
    
    public function getCustomCSS() {
        return $this->customCSS;
    }

    public function setCustomCSS($customCSS) {
        $this->customCSS = $customCSS;
    }
    
    /**
	 * Get the html node for this element
     * @param \DOMElement $node
	 * @param \Appshed\XML\DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
	 */
    protected function getHTMLNodeInner($node, $xml, $settings) {
        $css = new \AppShed\Style\CSSDocument();
        if ($this->customCSS) {
            $idselector = $css->getIdSelector($this->getIdType() . $settings->getPrefix() . $this->getId());
            $css->addCSSText($this->customCSS, $idselector);
        }
        $javascripts = array();
        $this->getHTMLNodeBase($node, $xml, $settings, $css, $javascripts);
        if($this->secure) {
            $node->setAttribute('data-secured', 'secure');
        }
        $settings->addScreen($this->getId(),
                $xml->saveXML($node),
                $css,
                $this->updated === true ? new DateTime() : $this->updated,
                $this->secure,
                $javascripts);
    }
    
    /**
	 * Get the html node for this element
     * @param \DOMElement $node
	 * @param \Appshed\XML\DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
     * @param \AppShed\Style\CSSDocument $css
     * @param array $javascripts
	 */
    protected function getHTMLNodeBase($node, $xml, $settings, $css, &$javascripts) {
        $node->setAttribute('data-screentype', static::TYPE);
		if($this->secure) {
			$xml->addClass($node, 'secured');
		}
		$this->getCSS($css, $settings);
        
		if ($this->tabs === 'float') {
			$node->setAttribute('data-tabs', 'float');
		}
		else if (!$this->tabs) {
			$node->setAttribute('data-tabs', 'hide');
		}

		if ($this->header === 'float') {
			$xml->addClass($node, 'float-header');
		}
		else if (!$this->header) {
			$xml->addClass($node, 'hide-header');
		}
		
		if($this->statusBarStyle === 'float') {
			$node->setAttribute('data-status', 'float');
		}
		else if($this->statusBarStyle === 'black') {
			$node->setAttribute('data-status', 'black');
		}
		
		if ($this->tab) {
			$node->setAttribute('data-tab', $this->tab);
		}
        
        if($settings->getFetchId()) {
            $node->setAttribute('data-fetch-id', $settings->getPrefix() . $settings->getFetchId());
        }

		if ($settings->getFetchUrl()) {
			$node->setAttribute('data-fetch-url', $settings->getFetchUrl());
		}
		
		$node->appendChild($navbar = $xml->createElement('div', 'header'));
		$navbar->setAttribute('x-blackberry-focusable', 'true');
		$navbar->appendChild($xml->createElement('div', 'background'));
		if ($this->back !== false) {
			$navbar->appendChild($back = $xml->createElement('div', array('class' => 'back', 'data-linktype' => 'back', 'text' => 'Back')));
			if ($this->back instanceof Screen) {
				$this->back->getHTMLNode($xml, $settings);
				$back->setAttribute('data-href', $settings->getPrefix() . $this->back->getId());
			}
			else if($this->back !== true) {
				$back->setAttribute('data-href', $settings->getPrefix() . $this->back);
			}
			$back->setAttribute('x-blackberry-focusable', 'true');
		}
		$navbar->appendChild($title = $xml->createElement('div', 'title'));
		
		$title->appendChild($xml->createElement('span', array('text' => $this->title)));

		$items = $xml->createElement('div', 'items' . ($this->scroll ? ' scrolling' : ''));
		$node->appendChild($items);
		$headButtons = $this->addHTMLChildren($items, $xml, $settings, $css, $javascripts);
		if (is_array($headButtons)) {
			foreach ($headButtons as $b) {
				$c = $b->getHTMLNode($xml, $settings);
				if ($c) {
					$navbar->appendChild($c);
				}
			}
		}
    }
    
    /**
	 *
	 * @param \DOMElement $items
	 * @param \DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
     * @param \AppShed\Style\CSSDocument $css
     * @param array $javascripts
	 */
	protected function addHTMLChildren($items, $xml, $settings, $css, &$javascripts) {
		$items->appendChild($itemsInner = $xml->createElement('div', 'items-inner'));
		
        $settings->pushCurrentScreen($this->getId());
		
        $headButtons = array();
		foreach ($this->children as $child) {
            if($child->getHeaderItem()) {
                $headButtons[] = $child;
            }
            else {
                $childNode = $child->getHTMLNode($xml, $settings);
				if ($childNode) {
					$itemsInner->appendChild($childNode);
				}
				$child->getCSS($css, $settings);
				$child->getJavascript($javascripts, $settings);
			}
		}
		
        $settings->popCurrentScreen();
        
		return $headButtons;
	}
}
