<?php

namespace AppShed\Remote\Element;

use AppShed\Remote\Element\Item\Button;
use AppShed\Remote\Element\Item\Input;
use AppShed\Remote\Element\Item\Link as LinkElement;
use AppShed\Remote\Element\Item\TextArea;
use AppShed\Remote\Element\Screen\Screen;

trait Link
{
    use Id;

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
     * @var string|App
     */
    protected $app;

    /**
     *
     * @var string|Screen
     */
    protected $screen;

    /**
     *
     * @var string
     */
    protected $elementId;

    /**
     *
     * @var Tab|string $tab
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
    protected $soundUrl;

    /**
     *
     * @var string
     */
    protected $soundName;

    /**
     *
     * @var string
     */
    protected $webUrl;

    /**
     *
     * @var string
     */
    protected $videoUrl;

    /**
     *
     * @var string
     */
    protected $webType;
    protected $remoteUrl;
    protected $youTubeUrl;
    protected $vimeoUrl;
    protected $phoneNumber;
    protected $twitterScreenName;
    protected $facebookUrl;
    protected $emailTo;
    protected $emailSubject;
    protected $emailBody;
    protected $backScreenId;

    /**
     * @var \AppShed\Remote\Element\Item\FormVariable[]
     */
    protected $variables;

    public function getLinkArrow()
    {
        return $this->linkArrow;
    }

    public function setLinkArrow($linkArrow)
    {
        $this->linkArrow = $linkArrow;
    }

    /**
     *
     * @param string $javascript
     */
    public function setJavascriptLink($javascript)
    {
        $this->linktype = LinkConstants::LINK_JAVASCRIPT;
        $this->javascript = $javascript;
    }

    /**
     *
     * @param App|string $app
     */
    public function setAppLink($app)
    {
        $this->linktype = LinkConstants::LINK_APP;
        $this->app = $app;
    }

    /**
     *
     * @param Screen|string $screen
     * @param string $elementId
     */
    public function setScreenLink($screen, $elementId = null)
    {
        $this->linktype = LinkConstants::LINK_SCREEN;
        $this->screen = $screen;
        $this->elementId = $elementId;
    }

    /**
     *
     * @param Tab|string $tab
     */
    public function setTabLink($tab)
    {
        $this->linktype = LinkConstants::LINK_TAB;
        $this->tab = $tab;
    }

    /**
     *
     * @param string $url
     * @param string $fileName
     */
    public function setFileLink($url, $fileName = null)
    {
        $this->linktype = LinkConstants::LINK_FILE;
        $this->fileUrl = $url;
        $this->fileName = $fileName;
    }

    /**
     *
     * @param string $url
     * @param string $fileName
     */
    public function setSoundLink($url, $fileName = null)
    {
        $this->linktype = LinkConstants::LINK_SOUND;
        $this->soundUrl = $url;
        $this->soundName = $fileName;
    }

    public function setWebLink($url, $type = LinkConstants::WEBLINK_NORMAL)
    {
        $this->linktype = LinkConstants::LINK_WEB;
        $this->webUrl = $url;
        $this->webType = $type;
    }

    public function setYouTubeLink($url)
    {
        $this->linktype = LinkConstants::LINK_YOUTUBE;
        $this->youTubeUrl = $url;
    }

    public function setVimeoLink($url)
    {
        $this->linktype = LinkConstants::LINK_VIMEO;
        $this->vimeoUrl = $url;
    }

    public function setVideoLink($url)
    {
        $this->linktype = LinkConstants::LINK_VIDEO;
        $this->videoUrl = $url;
    }

    public function setPhoneLink($number)
    {
        $this->linktype = LinkConstants::LINK_PHONE;
        $this->phoneNumber = $number;
    }

    public function setTwitterLink($screenName)
    {
        $this->linktype = LinkConstants::LINK_TWITTER;
        $this->twitterScreenName = $screenName;
    }

    public function setRemoteLink($url)
    {
        $this->linktype = LinkConstants::LINK_REMOTE;
        $this->remoteUrl = $url;
    }

    public function setFacebookLink($url)
    {
        $this->linktype = LinkConstants::LINK_FACEBOOK;
        $this->facebookUrl = $url;
    }

    public function setRefreshLink()
    {
        $this->linktype = LinkConstants::LINK_REFRESH;
    }

    public function setBBMLink()
    {
        $this->linktype = LinkConstants::LINK_BBM;
    }

    public function setEmailLink($to, $subject, $body)
    {
        $this->linktype = LinkConstants::LINK_EMAIL;
        $this->emailTo = $to;
        $this->emailSubject = $subject;
        $this->emailBody = $body;
    }

    public function setBackLink($screenId = null)
    {
        $this->linktype = LinkConstants::LINK_BACK;
        $this->backScreenId = $screenId;
    }

    /**
     * @param \AppShed\Remote\Element\Item\FormVariable $variable
     */
    public function addVariable($variable)
    {
        $this->variables[] = $variable;
    }

    /**
     * @param \AppShed\Remote\Element\Item\FormVariable[] $variables
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;
    }

    /**
     * Get the html node for this element
     *
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \DOMElement $node
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    protected function applyLinkToNode($xml, $node, $settings)
    {
        switch ($this->linktype) {
            case LinkConstants::LINK_JAVASCRIPT:
                $node->setAttribute('data-linktype', LinkConstants::LINK_JAVASCRIPT);
                break;
            case LinkConstants::LINK_APP:
                $node->setAttribute('data-linktype', LinkConstants::LINK_APP);
                if ($this->screen instanceof App) {
                    $this->app->getHTMLNode($xml, $settings);
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->app->getId());
                } else {
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->app);
                }
                break;
            case LinkConstants::LINK_SCREEN:
                $node->setAttribute('data-linktype', LinkConstants::LINK_SCREEN);
                if ($this->screen instanceof Screen) {
                    $this->screen->getHTMLNode($xml, $settings);
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->screen->getId());
                } else {
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->screen);
                }
                if (!empty($this->elementId)) {
                    $node->setAttribute('data-element', $this->elementId);
                }
                break;
            case LinkConstants::LINK_TAB:
                $node->setAttribute('data-linktype', LinkConstants::LINK_TAB);
                if ($this->tab instanceof Tab) {
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->tab->getId());
                } else {
                    $node->setAttribute('data-href', $settings->getPrefix() . $this->tab);
                }
                break;
            case LinkConstants::LINK_FILE:
                $node->setAttribute('data-linktype', LinkConstants::LINK_FILE);
                $node->setAttribute('data-href', $this->fileUrl);
                if ($this->fileName) {
                    $node->setAttribute('data-filename', $this->fileName);
                }
                break;
            case LinkConstants::LINK_SOUND:
                $node->setAttribute('data-linktype', LinkConstants::LINK_SOUND);
                $node->setAttribute('data-href', $this->soundUrl);
                if ($this->soundName) {
                    $node->setAttribute('data-filename', $this->soundName);
                }
                break;
            case LinkConstants::LINK_WEB:
                $node->setAttribute('data-linktype', LinkConstants::LINK_WEB);
                $node->setAttribute('data-href', $this->applyVariablesToUrl($this->webUrl));
                $node->setAttribute('data-weblinktype', $this->webType);
                break;
            case LinkConstants::LINK_REMOTE:
                $node->setAttribute('data-linktype', LinkConstants::LINK_REMOTE);
                $node->setAttribute('data-href', $this->applyVariablesToUrl($this->remoteUrl));
                $node->setAttribute('data-direct', 'direct');
                break;
            case LinkConstants::LINK_YOUTUBE:
                $node->setAttribute('data-linktype', LinkConstants::LINK_YOUTUBE);
                $node->setAttribute('data-href', $this->youTubeUrl);
                break;
            case LinkConstants::LINK_VIMEO:
                $node->setAttribute('data-linktype', LinkConstants::LINK_VIMEO);
                $node->setAttribute('data-href', $this->vimeoUrl);
                break;
            case LinkConstants::LINK_VIDEO:
                $node->setAttribute('data-linktype', LinkConstants::LINK_VIDEO);
                $node->setAttribute('data-href', $this->videoUrl);
                break;
            case LinkConstants::LINK_FACEBOOK:
                $node->setAttribute('data-linktype', LinkConstants::LINK_FACEBOOK);
                $node->setAttribute('data-href', $this->facebookUrl);
                break;
            case LinkConstants::LINK_TWITTER:
                $node->setAttribute('data-linktype', LinkConstants::LINK_TWITTER);
                $node->setAttribute('data-href', $this->twitterScreenName);
                break;
            case LinkConstants::LINK_BBM:
                $node->setAttribute('data-linktype', LinkConstants::LINK_BBM);
                break;
            case LinkConstants::LINK_REFRESH:
                $node->setAttribute('data-linktype', LinkConstants::LINK_REFRESH);
                break;
            case LinkConstants::LINK_EMAIL:
                if ($settings->getEmailPreview()) {
                    $screen = new Screen('Email');
                    $screen->setId('email' . $this->getId());
                    $screen->setUpdated(false);
                    $screen->setEditable(false);
                    $screen->setBack($settings->getCurrentScreen());

                    $screen->addChild(new Input('email_to', 'To', $this->emailTo));
                    $screen->addChild(new Input('email_subject', 'Subject', $this->emailSubject));
                    $screen->addChild(new TextArea('email_body', 'Message', $this->emailBody));

                    $send = new Button('Send');
                    $send->setWebLink(
                        'mailto:{email_to}?subject={email_subject}&body={email_body}',
                        LinkConstants::WEBLINK_EXTERNAL
                    );
                    $screen->addChild($send);
                    $screen->getHTMLNode($xml, $settings);
                    $node->setAttribute('data-linktype', LinkConstants::LINK_SCREEN);
                    $node->setAttribute('data-href', $settings->getPrefix() . $screen->getId());
                } else {
                    $node->setAttribute('data-linktype', LinkConstants::LINK_WEB);
                    $node->setAttribute(
                        'data-href',
                        'mailto:' . $this->emailTo . '?' . http_build_query(
                            array(
                                'subject' => $this->emailSubject,
                                'body' => $this->emailBody
                            )
                        )
                    );
                    $node->setAttribute('data-weblinktype', LinkConstants::WEBLINK_EXTERNAL);
                }
                break;
            case LinkConstants::LINK_PHONE:
                if ($settings->getPhonePreview()) {
                    $screen = new Screen('Phone');
                    $screen->setId('phone' . $this->getId());
                    $screen->setUpdated(false);
                    $screen->setScroll(false);
                    $screen->setEditable(false);
                    $screen->setBack($settings->getCurrentScreen());
                    $screen->addClass('phone-screen');
                    $screen->setHeader(false);
                    $screen->setTabs(false);

                    $top = new LinkElement($this->phoneNumber);
                    $top->addClass('top');
                    $screen->addChild($top);

                    $end = new LinkElement('End');
                    $end->addClass('bottom');
                    $end->setBackLink();
                    $screen->addChild($end);

                    $screen->getHTMLNode($xml, $settings);
                    $node->setAttribute('data-linktype', LinkConstants::LINK_SCREEN);
                    $node->setAttribute('data-href', $settings->getPrefix() . $screen->getId());
                } else {
                    $node->setAttribute('data-linktype', 'web');
                    $node->setAttribute('data-href', 'tel:' . $this->phoneNumber);
                    $node->setAttribute('data-weblinktype', LinkConstants::WEBLINK_CONFIRM);
                    $node->setAttribute('data-confirm-message', 'Click to make a call to ' . $this->phoneNumber);
                    $node->setAttribute('data-okbtn', 'Call');
                }
                break;
            case LinkConstants::LINK_BACK:
                $node->setAttribute('data-linktype', LinkConstants::LINK_BACK);
                if ($this->backScreenId) {
                    $node->setAttribute('data-href', $this->backScreenId);
                }
                break;
        }
        if ($node->hasAttribute('data-linktype')) {
            $xml->addClass($node, 'link');
            if ($this->linkArrow === true) {
                $node->appendChild($xml->createElement('div', 'link-arrow'));
            } else {
                if ($this->linkArrow === false) {
                    $xml->addClass($node, 'link-no-arrow');
                }
            }
            $node->setAttribute('x-blackberry-focusable', 'true');
        }
    }

    /**
     * Get the html node for this element
     *
     * @param array $javascripts
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    public function getJavascript(&$javascripts, $settings)
    {
        if ($this->linktype == LinkConstants::LINK_JAVASCRIPT) {
            $javascripts[$this->getIdType() . $settings->getPrefix() . $this->getId()] = $this->javascript;
        }
    }

    /**
     * @param string $url
     * @return string
     */
    protected function applyVariablesToUrl($url)
    {
        if (count($this->variables) > 0) {
            $newParams = [];
            foreach ($this->variables as $variable) {
                $name = $variable->getVariableName();
                $newParams[$name] = '{' . $name . '}';
            }
            $query = str_replace(['%7B', '%7D'], ['{', '}'], http_build_query($newParams));

            if (strpos($url, '?')) {
                return "$url&$query";
            }
            return "$url?$query";
        }
        return $url;
    }

}
