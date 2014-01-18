<?php
namespace AppShed\HTML;

/**
 * Represents some settings about how html should be generated
 *
 * @package AppShed\HTML
 */
class Settings
{
    protected $prefix = '';
    protected $fetchUrl;
    protected $fetchId;
    protected $emailPreview = false;
    protected $phonePreview = false;
    protected $apps = array();
    protected $screens = array();
    protected $currentScreens = array();

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    public function getFetchUrl()
    {
        return $this->fetchUrl;
    }

    public function setFetchUrl($fetchUrl)
    {
        $this->fetchUrl = $fetchUrl;
    }

    public function getFetchId()
    {
        return $this->fetchId;
    }

    public function setFetchId($fetchId)
    {
        $this->fetchId = $fetchId;
    }

    public function getEmailPreview()
    {
        return $this->emailPreview;
    }

    public function setEmailPreview($emailPreview)
    {
        $this->emailPreview = $emailPreview;
    }

    public function getPhonePreview()
    {
        return $this->phonePreview;
    }

    public function setPhonePreview($phonePreview)
    {
        $this->phonePreview = $phonePreview;
    }

    public function pushCurrentScreen($screen)
    {
        $this->currentScreens[] = $screen;
    }

    public function getCurrentScreen()
    {
        if (($count = count($this->currentScreens))) {
            return $this->currentScreens[$count - 1];
        }
        return true;
    }

    public function popCurrentScreen()
    {
        array_pop($this->currentScreens);
    }

    /**
     *
     * @param string $id
     * @param string $html
     * @param \AppShed\Style\CSSDocument $css
     * @param string $splashHtml
     * @param \DateTime $updated
     * @param array $secure
     * @param string $js
     */
    public function addApp($id, $html, $css, $splashHtml, $updated, $secure, $js)
    {
        $this->apps[$this->getPrefix() . $id] = array(
            'html' => "<style scoped>" . $css->toString() . "</style>$html",
            'splashhtml' => $splashHtml ? "<style scoped>" . $css->toSplashString() . "</style>$splashHtml" : null,
            'updated' => $updated ? $updated->getTimestamp() : null,
            'secure' => $secure,
            'javascript' => $js
        );
    }

    /**
     *
     * @param string $id
     * @param string $html
     * @param \AppShed\Style\CSSDocument $css
     * @param \DateTime $updated
     * @param boolean $secure
     * @param array $js
     */
    public function addScreen($id, $html, $css, $updated, $secure, $js)
    {
        $this->screens[$this->getPrefix() . $id] = array(
            'html' => "<style scoped>" . $css->toString() . "</style>$html",
            'updated' => $updated ? $updated->getTimestamp() : null,
            'secure' => $secure,
            'javascripts' => $js
        );
    }

    public function getApps()
    {
        return count($this->apps) ? $this->apps : null;
    }

    public function getScreens()
    {
        return count($this->screens) ? $this->screens : null;
    }
}
