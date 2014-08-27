<?php
namespace AppShed\Remote\Element\Screen;

use AppShed\Remote\Exceptions\TooManyIconsException;

class Apps extends Screen
{
    const TYPE = 'app';
    const TYPE_CLASS = 'appsscreen';

    /**
     *
     * @var int
     */
    protected $columns = 3;

    /**
     * @var \AppShed\Remote\Element\Item\AppIcon[]
     */
    protected $homeChildren = [];

    /**
     * @var \AppShed\Remote\Element\Item\AppIcon[]
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
     * @throws TooManyIconsException
     *
     * @param \AppShed\Remote\Element\Item\AppIcon $item
     *
     * @return bool ret
     */
    public function addHomeChild($item)
    {
        if (count($this->homeChildren) >= 45) {
            throw new TooManyIconsException("Cannot have more than 5 home icons");
        }
        $this->homeChildren[] = $item;
    }

    /**
     * @param \AppShed\Remote\Element\Item\AppIcon[] $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @param \AppShed\Remote\Element\Item\AppIcon $child
     */
    public function addChild($child)
    {
        $this->children[] = $child;
    }

    /**
     * @return \AppShed\Remote\Element\Item\AppIcon[]
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
        //Each screen has up to 16 apps
        /**
         * @var \AppShed\Remote\Element\Item\AppIcon[][]
         */
        $screens = array_chunk($this->children, 16);

        //Home bar
        $items->appendChild($homeBar = $xml->createElement('div', ['class' => 'home-bar']));
        $items->appendChild($xml->createElement('div', 'home-underlay'));

        //Dots
        $homeBar->appendChild($homeDots = $xml->createElement('div', ['class' => 'home-dots']));
        $homeBar->appendChild($xml->createElement('div', ['class' => 'home-bar-bg']));
        $homeDots->appendChild($cnt = $xml->createElement('div', ['class' => 'home-dots-inner']));
        $screensCount = count($screens) + 1;
        for ($i = 0; $i < $screensCount; $i++) {
            $cnt->appendChild(
                $xml->createElement(
                    'div',
                    ['class' => 'dot ' . ($i == 0 ? 'curr search' : 'page'), 'text' => $i == 0 ? '' : $i]
                )
            );
        }
        //Empty screen if there are no apps
        if (count($screens) == 0) {
            $cnt->appendChild($xml->createElement('div', ['class' => 'dot page', 'text' => '1']));
        }
        $homeDots->appendChild($xml->createElement('div', ['style' => 'clear:both']));

        //Home bar buttons
        if (count($this->homeChildren) > 0) {
            $homeBar->appendChild($homeBarButtons = $xml->createElement('div', ['class' => 'home-bar-buttons']));
            foreach ($this->homeChildren as $homeButton) {
                $childNode = $homeButton->getHTMLNode($xml, $settings);
                if ($childNode) {
                    $homeBarButtons->appendChild($childNode);
                }
                $homeButton->getCSS($css, $settings);
                $homeButton->getJavascript($javascripts, $settings);
            }
        }

        //Search
        $itemsInner->appendChild($searchEl = $xml->createElement('div', ['class' => 'apps search']));
        $searchEl->appendChild($appInner = $xml->createElement('div', ['class' => 'apps-inner']));
        $appInner->appendChild($searchContainer = $xml->createElement('div', ['class' => 'search-holder']));
        $searchContainer->appendChild(
            $inp = $xml->createElement(
                'input',
                [
                    'type' => 'search',
                    'placeholder' => 'Search',
                    'class' => 'search-box',
                    'x-webkit-speech' => 'x-webkit-speech'
                ]
            )
        );
        $appInner->appendChild($searchResults = $xml->createElement('div', ['class' => 'search-results']));

        $settings->pushCurrentScreen($this->getId());

        $i = 1;
        $headButtons = [];
        /** @var \AppShed\Remote\Element\Item\AppIcon[] $screen */
        foreach ($screens as $screen) {
            $itemsInner->appendChild($appsEl = $xml->createElement('div', ['class' => 'apps']));
            $appsEl->appendChild($xml->createElement('div', ['class' => 'apps-title', 'text' => "Page $i"]));
            $appsEl->appendChild($appInner = $xml->createElement('div', ['class' => 'apps-inner']));
            foreach ($screen as $app) {
                if ($app->getHeaderItem()) {
                    $headButtons[] = $app;
                } else {
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
        if (count($screens) == 0) {
            $itemsInner->appendChild($appsEl = $xml->createElement('div', ['class' => 'apps']));
            $appsEl->appendChild($xml->createElement('div', ['class' => 'apps-title', 'text' => "Page $i"]));
            $appsEl->appendChild($appInner = $xml->createElement('div', ['class' => 'apps-inner']));
        }

        $settings->popCurrentScreen();

        return $headButtons;
    }
}
