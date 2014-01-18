<?php

namespace AppShed\Element;

use AppShed\Exceptions\TooManyTabsException;

class App extends Element
{

    use Root;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var string
     */
    protected $previewUrl;

    /**
     *
     * @var string
     */
    protected $webviewUrl;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $icon;

    /**
     *
     * @var string
     */
    protected $flag;

    /**
     *
     * @var bool
     */
    protected $ads;

    /**
     *
     * @var \DateTime
     */
    protected $updated;

    /**
     *
     * @var \AppShed\Style\Image
     */
    protected $splash;

    /**
     *
     * @var string
     */
    protected $js;

    /**
     *
     * @var string
     */
    protected $customCSS;

    /**
     * @var Tab[]
     */
    protected $children = [];

    /**
     *
     * @param string $name
     * @param \AppShed\Style\Image $icon
     */
    public function __construct($name = null, $icon = null)
    {
        parent::__construct();
        $this->setName($name);
        $this->setIcon($icon);
    }

    /**
     * Set the name of the app
     * @internal used in appbuilder
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @internal used in appbuilder
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Link for preview
     * @internal used in appbuilder
     *
     * @param string $url
     */
    public function setPreviewUrl($url)
    {
        $this->previewUrl = $url;
    }

    /**
     * Link to webapp
     * @internal used in appbuilder
     *
     * @param string $url
     */
    public function setWebviewUrl($url)
    {
        $this->webviewUrl = $url;
    }

    /**
     * @internal used in appbuilder
     *
     * @param string $flag
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

    /**
     * @internal used in appbuilder
     *
     * @param \AppShed\Style\Image $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * Show ads in this app
     *
     * @param boolean $ads
     */
    public function setAds($ads)
    {
        $this->ads = $ads;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;
    }

    public function getSplash()
    {
        return $this->splash;
    }

    public function setSplash(\AppShed\Style\Image $splash)
    {
        $this->splash = $splash;
    }

    public function getJs()
    {
        return $this->js;
    }

    public function setJs($js)
    {
        $this->js = $js;
    }

    public function getCustomCSS()
    {
        return $this->customCSS;
    }

    public function setCustomCSS($customCSS)
    {
        $this->customCSS = $customCSS;
    }

    protected function getIdType()
    {
        return 'app';
    }

    protected function getClass()
    {
        return "app " . parent::getClass();
    }

    /**
     * @throws TooManyTabsException
     *
     * @param Tab[] $children
     */
    public function setChildren($children)
    {
        if(count($children) > 5) {
            throw new TooManyTabsException("Cannot have more than 5 tabs");
        }
        $this->children = $children;
    }

    /**
     * @throws TooManyTabsException
     *
     * @param Tab $child
     */
    public function addChild($child)
    {
        if(count($this->children) >= 5) {
            throw new TooManyTabsException("Cannot have more than 5 tabs");
        }
        $this->children[] = $child;
    }

    /**
     * @return Tab[]
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
     */
    protected function getHTMLNodeInner($node, $xml, $settings)
    {
        $css = new \AppShed\Style\CSSDocument();
        $idselector = $css->getIdSelector($this->getIdType() . $settings->getPrefix() . $this->getId());
        if ($this->customCSS) {
            $css->addCSSText($this->customCSS, $idselector);
        }
        $this->getCSS($css, $settings);
        if ($this->splash) {
            $this->splash->toCSS($css, $idselector . $css->getClassSelector('splash'));
        }

        if ($this->name) {
            $node->setAttribute('data-name', $this->name);
        }

        if ($this->description) {
            $node->setAttribute('data-description', $this->description);
        }

        if ($this->flag) {
            $node->setAttribute('data-flag', $this->flag);
        }

        if ($this->previewUrl) {
            $node->setAttribute('data-preview-url', $this->previewUrl);
        }

        if ($this->webviewUrl) {
            $node->setAttribute('data-webview-url', $this->webviewUrl);
        }

        if ($this->icon) {
            $node->setAttribute('data-icon', $this->icon->getUrl());
            $idselector = $css->getIdSelector($this->getIdType() . $settings->getPrefix() . $this->getId());
            $css->addRule(
                array(".android .phone-navigator $idselector.app .app-navigator .screen .header .back"),
                'background-image',
                $css->getURLValue($this->icon->getUrl())
            );
            $css->addRule(
                array(".blackberry .phone-navigator $idselector.app .app-navigator .screen .header"),
                'background-image',
                $css->getURLValue($this->icon->getUrl())
            );
        }

        if ($settings->getFetchUrl()) {
            $node->setAttribute('data-fetch-url', $settings->getFetchUrl());
        }

        $node->appendChild($navigator = $xml->createElement('div', 'app-navigator'));
        $navigator->appendChild($navinner = $xml->createElement('div', 'app-navigator-inner'));
        $navinner->appendChild($xml->createElement('div', 'app-navigator-inner-sides'));
        $navinner->appendChild($xml->createElement('div', 'app-navigator-inner-sides'));

        if ($this->ads) {
            $xml->addClass($navigator, 'ads');
            $node->appendChild($xml->createElement('div', 'ad-holder'));
        }

        $node->appendChild(($tabbarOuter = $xml->createElement('div', 'tab-bar')));
        $tabbarOuter->appendChild(($tabbar = $xml->createElement('table')));
        $tabbar->appendChild(($tabbarinner = $xml->createElement('tr', 'tar-bar-inner')));

        foreach ($this->children as $tab) {
            $tabbarinner->appendChild($tab->getHTMLNode($xml, $settings));
            $tab->getCSS($css, $settings);
        }

        $settings->addApp(
            $this->getId(),
            $xml->saveXML($node),
            $css,
            $this->splash ? "<style scoped>" . $css->toSplashString(
                ) . "</style><div class=\"splash\" id=\"app" . $this->getId() . "\"></div>" : null,
            $this->updated === true ? new \DateTime() : $this->updated,
            array('login' => null, 'register' => null),
            $this->js
        );
    }

}
