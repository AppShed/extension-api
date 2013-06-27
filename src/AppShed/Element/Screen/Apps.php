<?php
namespace AppShed\Element\Screen;

class Apps extends Screen {
    const TYPE = 'app';
    const TYPE_CLASS = 'appsscreen';
	
    /**
     *
     * @var int
     */
    protected $columns = 3;
    
    protected $homeChildren = array();
    
    public function __construct($title, $columns = 3) {
        parent::__construct($title);
        $this->columns = $columns;
    }
    
    public function getColumns() {
        return $this->columns;
    }

    public function setColumns($columns) {
        $this->columns = $columns;
    }
    
    public function addHomeChild($item) {
		if (count($this->homeChildren) <= 4) {
			$this->homeChildren[] = $item;
		}
		else {
			return false;
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
		//Each screen has up to 16 apps
		$screens = array_chunk($this->children, 16);

		//Home bar
		$items->appendChild($homebar = $xml->createElement('div', array('class' => 'home-bar')));
		$items->appendChild($xml->createElement('div', 'home-underlay'));

		//Dots
		$homebar->appendChild($homeDots = $xml->createElement('div', array('class' => 'home-dots')));
		$homebar->appendChild($xml->createElement('div', array('class' => 'home-bar-bg')));
		$homeDots->appendChild($cnt = $xml->createElement('div', array('class' => 'home-dots-inner')));
		$screensCount = count($screens) + 1;
		for ($i = 0; $i < $screensCount; $i++) {
			$cnt->appendChild($xml->createElement('div', array('class' => 'dot ' . ($i == 0 ? 'curr search' : 'page' ), 'text' => $i == 0 ? '' : $i)));
		}
		//Empty screen if there are no apps
		if(count($screens) == 0) {
			$cnt->appendChild($xml->createElement('div', array('class' => 'dot page', 'text' => '1')));
		}
		$homeDots->appendChild($xml->createElement('div', array('style' => 'clear:both')));

		//Home bar buttons
		if (count($this->homeChildren) > 0) {
			$homebar->appendChild($homebarButtons = $xml->createElement('div', array('class' => 'home-bar-buttons')));
			foreach ($this->homeChildren as $homeButton) {
				$childNode = $homeButton->getHTMLNode($xml, $settings);
				if ($childNode) {
					$homebarButtons->appendChild($childNode);
				}
				$homeButton->getCSS($css, $settings);
				$homeButton->getJavascript($javascripts);
			}
		}

		//Search
		$itemsInner->appendChild($searchEl = $xml->createElement('div', array('class' => 'apps search')));
		$searchEl->appendChild($appInner = $xml->createElement('div', array('class' => 'apps-inner')));
		$appInner->appendChild($searchContainer = $xml->createElement('div', array('class' => 'search-holder')));
		$searchContainer->appendChild($inp = $xml->createElement('input', array('type' => 'search', 'placeholder' => 'Search', 'class' => 'search-box', 'x-webkit-speech' => 'x-webkit-speech')));
		$appInner->appendChild($searchResults = $xml->createElement('div', array('class' => 'search-results')));
		
		$settings->pushCurrentScreen($this->getId());
		
        $i = 1;
        $headButtons = array();
		foreach ($screens as $screen) {
			$itemsInner->appendChild($appsEl = $xml->createElement('div', array('class' => 'apps')));
			$appsEl->appendChild($xml->createElement('div', array('class' => 'apps-title', 'text' => "Page $i")));
			$appsEl->appendChild($appInner = $xml->createElement('div', array('class' => 'apps-inner')));
			foreach ($screen as $app) {
                if($app->getHeaderItem()) {
                    $headButtons[] = $app;
                }
                else {
                    $childNode = $app->getHTMLNode($xml, $settings);
                    if ($childNode) {
                        $appInner->appendChild($childNode);
                    }
                    $app->getCSS($css, $settings);
                    $app->getJavascript($javascripts, $settings);
                }
			}
			$i++;
		}
		//Empty screen if there are no apps
		if(count($screens) == 0) {
			$itemsInner->appendChild($appsEl = $xml->createElement('div', array('class' => 'apps')));
			$appsEl->appendChild($xml->createElement('div', array('class' => 'apps-title', 'text' => "Page $i")));
			$appsEl->appendChild($appInner = $xml->createElement('div', array('class' => 'apps-inner')));
		}
		
        $settings->popCurrentScreen();
        
        return $headButtons;
	}
}
