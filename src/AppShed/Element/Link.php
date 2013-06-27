<?php

namespace AppShed\Element;

use AppShed\Element\LinkConsts;

trait Link {
    
    /**
     *
     * @var boolean
     */
    protected $linkArrow = true;
    /**
     *
     * @var string
     */
    protected $linktype;
    /**
     *
     * @var string
     */
    protected $javascript;
    /**
     *
     * @var string|\AppShed\Element\App
     */
    protected $app;
    /**
     *
     * @var string|\AppShed\Element\Screen\Screen
     */
    protected $screen;
    /**
     *
     * @var string
     */
    protected $elementId;
    
    /**
     *
     * @var \AppShed\Element\Tab|string $tab
     */
    protected $tab;
    
    /**
     *
     * @var string
     */
    protected $fileUrl;
    
    /**
     *
     * @var string
     */
    protected $fileName;
    /**
     *
     * @var string
     */
    protected $webUrl;
    /**
     *
     * @var string
     */
    protected $webType;
    
    protected $youTubeUrl;
    protected $vimeoUrl;
    protected $phoneNumber;
    protected $twitterScreenName;
    protected $facebookUrl;
    protected $emailTo;
    protected $emailSubject;
    protected $emailBody;
    protected $backScreenId;
    
    public function getLinkArrow() {
        return $this->linkArrow;
    }

    public function setLinkArrow($linkArrow) {
        $this->linkArrow = $linkArrow;
    }

    /**
     * 
     * @param string $javascript
     */
    public function setJavascriptLink($javascript) {
        $this->linktype = LinkConsts::LINK_JAVASCRIPT;
        $this->javascript = $javascript;
    }
    
    /**
     * 
     * @param \AppShed\Element\App|string $app
     */
    public function setAppLink($app) {
        $this->linktype = LinkConsts::LINK_APP;
        $this->app = $app;
    }
    
    /**
     * 
     * @param \AppShed\Element\Screen\Screen|string $screen
     * @param string $elementId
     */
    public function setScreenLink($screen, $elementId = null) {
        $this->linktype = LinkConsts::LINK_SCREEN;
        $this->screen = $screen;
        $this->elementId = $elementId;
    }
    
    /**
     * 
     * @param \AppShed\Element\Tab|string $tab
     */
    public function setTabLink($tab) {
        $this->linktype = LinkConsts::LINK_TAB;
        $this->tab = $tab;
    }
    
    /**
     * 
     * @param string $url
     * @param string $fileName
     */
    public function setFileLink($url, $fileName = null) {
        $this->linktype = LinkConsts::LINK_FILE;
        $this->fileUrl = $url;
        $this->fileName = $fileName;
    }

    public function setWebLink($url, $type = LinkConsts::WEBLINK_NORMAL) {
        $this->linktype = LinkConsts::LINK_WEB;
        $this->webUrl = $url;
        $this->webType = $type;
    }
    
    public function setYouTubeLink($url) {
        $this->linktype = LinkConsts::LINK_YOUTUBE;
        $this->youTubeUrl = $url;
    }
    
    public function setVimeoLink($url) {
        $this->linktype = LinkConsts::LINK_VIMEO;
        $this->vimeoUrl = $url;
    }
    
    public function setPhoneLink($number) {
        $this->linktype = LinkConsts::LINK_PHONE;
        $this->phoneNumber = $number;
    }
    
    public function setTwitterLink($screenName) {
        $this->linktype = LinkConsts::LINK_TWITTER;
        $this->twitterScreenName - $screenName;
    }
    
    public function setFacebookLink($url) {
        $this->linktype = LinkConsts::LINK_FACEBOOK;
        $this->facebookUrl = $url;
    }
    
    public function setRefreshLink() {
        $this->linktype = LinkConsts::LINK_REFRESH;
    }
    
    public function setBBMLink() {
        $this->linktype = LinkConsts::LINK_BBM;
    }
    
    public function setEmailLink($to, $subject, $body) {
        $this->linktype = LinkConsts::LINK_EMAIL;
        $this->emailTo = $to;
        $this->emailSubject = $subject;
        $this->emailBody = $body;
    }
    
    public function setBackLink($screenId = null) {
        $this->linktype = LinkConsts::LINK_BACK;
        $this->backScreenId = $screenId;
    }

    /**
	 * Get the html node for this element
     * @param \DOMElement $node
	 * @param \Appshed\XML\DOMDocument $xml
	 * @param \AppShed\HTML\Settings $settings
	 */
    protected function applyLinkToNode($xml, $node, $settings) {
        switch($this->linktype) {
            case LinkConsts::LINK_JAVASCRIPT:
                $node->setAttribute('data-linktype', LinkConsts::LINK_JAVASCRIPT);
                break;
            case LinkConsts::LINK_APP:
                $node->setAttribute('data-linktype', LinkConsts::LINK_APP);
                if($this->screen instanceof \AppShed\Element\App) {
                    $this->app->getHTMLNode($xml, $settings);
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->app->getId());
                }
                else {
                  $node->setAttribute('data-href', $settings->getPrefix() . $this->app);
                }
				break;
            case LinkConsts::LINK_SCREEN:
                $node->setAttribute('data-linktype', LinkConsts::LINK_SCREEN);
                if($this->screen instanceof \AppShed\Element\Screen\Screen) {
                    $this->screen->getHTMLNode($xml, $settings);
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->screen->getId());
                }
                else {
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->screen);
                }
                if (!empty($this->elementId)) {
                    $node->setAttribute('data-element', $this->elementId);
                }
                break;
            case LinkConsts::LINK_TAB:
                $node->setAttribute('data-linktype', LinkConsts::LINK_TAB);
                if($this->tab instanceof \AppShed\Element\Tab) {
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->tab->getId());
                }
                else {
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->tab);
                }
                break;
            case LinkConsts::LINK_FILE:
                $node->setAttribute('data-linktype', LinkConsts::LINK_FILE);
                $node->setAttribute('data-href', $this->fileUrl);
                if ($this->fileName) {
					$node->setAttribute('data-filename', $this->fileName);
				}
                break;
            case LinkConsts::LINK_WEB:
                $node->setAttribute('data-linktype', LinkConsts::LINK_WEB);
                $node->setAttribute('data-href', $this->webUrl);
                $node->setAttribute('data-weblinktype', $this->webType);
                break;
            case LinkConsts::LINK_YOUTUBE:
                $node->setAttribute('data-linktype', LinkConsts::LINK_YOUTUBE);
                $node->setAttribute('data-href', $this->youTubeUrl);
                break;
            case LinkConsts::LINK_VIMEO:
                $node->setAttribute('data-linktype', LinkConsts::LINK_VIMEO);
                $node->setAttribute('data-href', $this->vimeoUrl);
                break;
            case LinkConsts::LINK_FACEBOOK:
                $node->setAttribute('data-linktype', LinkConsts::LINK_FACEBOOK);
                $node->setAttribute('data-href', $this->facebookUrl);
                break;
            case LinkConsts::LINK_TWITTER:
                $node->setAttribute('data-linktype', LinkConsts::LINK_TWITTER);
                $node->setAttribute('data-href', $this->twitterScreenName);
                break;
            case LinkConsts::LINK_BBM:
                $node->setAttribute('data-linktype', LinkConsts::LINK_BBM);
                break;
            case LinkConsts::LINK_REFRESH:
                $node->setAttribute('data-linktype', LinkConsts::LINK_REFRESH);
                break;
            case LinkConsts::LINK_EMAIL:
                if ($settings->getEmailPreview()) {
					$screen = new \AppShed\Element\Screen('Email');
					$screen->setId('email' . $this->getId());
					$screen->setUpdated(false);
					$screen->setEditable(false);
					$screen->setBack($settings->getCurrentScreen());
					
					$screen->addChild(new \AppShed\Element\Item\Input('email_to', 'To', $this->emailTo));
					$screen->addChild(new \AppShed\Element\Item\Input('email_subject', 'Subject', $this->emailSubject));
					$screen->addChild(new \AppShed\Element\Item\TextArea('email_body', 'Message', $this->emailBody));

					$send = new \AppShed\Element\Item\Button('Send');
					$send->setWebLink('mailto:{email_to}?subject={email_subject}&body={email_body}', LinkConsts::WEBLINK_EXTERNAL);
					$screen->addChild($send);
					$screen->getHTMLNode($xml, $settings);
					$node->setAttribute('data-linktype', LinkConsts::LINK_SCREEN);
					$node->setAttribute('data-href', $settings->getPrefix() . $screen->getId());
				}
				else {
					$node->setAttribute('data-linktype', LinkConsts::LINK_WEB);
					$node->setAttribute('data-href', 'mailto:' . $this->emailTo . '?' . http_build_query(array(
                        'subject' => $this->emailSubject,
                        'body' => $this->emailBody
                    )));
					$node->setAttribute('data-weblinktype', LinkConsts::WEBLINK_EXTERNAL);
				}
                break;
            case LinkConsts::LINK_PHONE:
                if ($settings->getPhonePreview()) {
					$screen = new \AppShed\Element\Screen('Phone');
					$screen->setId('phone' . $this->getId());
					$screen->setUpdated(false);
					$screen->setScrolling(false);
					$screen->setEditable(false);
					$screen->setBack($settings->getCurrentScreen());
					$screen->addClass('phone-screen');
					$screen->setHeader(false);
					$screen->setTabs(false);

					$top = new \AppShed\Element\Item\Link($this->phoneNumber);
					$top->addClass('top');
					$screen->addChild($top);

					$end = new \AppShed\Element\Item\Link('End');
					$end->addClass('bottom');
					$end->setBackLink();
					$screen->addChild($end);

					$screen->getHTMLNode($xml, $settings);
					$node->setAttribute('data-linktype', LinkConsts::LINK_SCREEN);
					$node->setAttribute('data-href', $settings->getPrefix() . $screen->getId());
				}
				else {
					$node->setAttribute('data-linktype', 'web');
					$node->setAttribute('data-href', 'tel:' . $this->phoneNumber);
					$node->setAttribute('data-weblinktype', LinkConsts::WEBLINK_CONFIRM);
					$node->setAttribute('data-confirm-message', 'Click to make a call to ' . $this->phoneNumber);
					$node->setAttribute('data-okbtn', 'Call');
				}
                break;
            case LinkConsts::LINK_BACK:
                $node->setAttribute('data-linktype', LinkConsts::LINK_BACK);
                if($this->backScreenId) {
                    $node->setAttribute('data-href', $this->backScreenId);
                }
                break;
        }
        $xml->addClass($node, 'link');
        if ($this->linkArrow === true) {
            $node->appendChild($xml->createElement('div', 'link-arrow'));
        }
        else if ($this->linkArrow === false) {
            $xml->addClass($node, 'link-no-arrow');
        }
        $node->setAttribute('x-blackberry-focusable', 'true');
    }
    
    /**
	 * Get the html node for this element
     * @param array $javascripts
	 * @param \AppShed\HTML\Settings $settings
	 */
    public function getJavascript(&$javascripts, $settings) {
		if($this->linktype == LinkConsts::LINK_JAVASCRIPT) {
			$javascripts[$this->getIdType() . $settings->getPrefix() . $this->getId()] = $this->javascript;
		}
	}
}
