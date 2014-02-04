<?php
namespace AppShed\Remote\HTML;

use AppShed\Remote\Element\App;
use AppShed\Remote\XML\DOMDocument;

/**
 * Provides functions to send AppShed objects to an app
 *
 * @package AppShed\HTML
 */
class Remote
{
    /**
     *
     * @var \AppShed\Remote\Element\Root
     */
    protected $root;

    /**
     *
     * @var \AppShed\Remote\Element\Root[]
     */
    protected $roots = array();

    /**
     * @var string
     */
    protected $requestUrl;

    /**
     *
     * @var int
     */
    protected $refreshAfter = 0;

    /**
     * Create a response with the main Element $root
     *
     * @param \AppShed\Remote\Element\Root $root
     */
    public function __construct($root)
    {
        $this->root = $root;
    }

    /**
     * Add additional roots to the response
     *
     * @param \AppShed\Remote\Element\Root $root
     */
    public function addRoot($root)
    {
        $this->roots[] = $root;
    }

    /**
     * @param int $refreshAfter Time in seconds after which the screen should be refreshed
     */
    public function setRefreshAfter($refreshAfter)
    {
        $this->refreshAfter = $refreshAfter;
    }

    /**
     * Get the settings sent from the app
     *
     * @return \AppShed\Remote\HTML\Settings
     */
    public function getSettings()
    {
        $settings = new Settings();
        $requestUrl = $this->getRequestUrl();
        $settings->setFetchUrl($requestUrl);
        $settings->setPrefix(sha1($requestUrl));
        $settings->setEmailPreview(isset($_REQUEST['emailPreview']) ? $_REQUEST['emailPreview'] === 'true' : false);
        $settings->setPhonePreview(isset($_REQUEST['telPreview']) ? $_REQUEST['telPreview'] === 'true' : false);
        return $settings;
    }

    /**
     * Get the JSON object that should be sent to the client
     *
     * @param \AppShed\Remote\HTML\Settings $settings
     *
     * @return array
     */
    public function getResponseObject($settings = null)
    {
        if (!$settings) {
            $settings = $this->getSettings();
        }

        $xml = new DOMDocument();
        $this->root->getHTMLNode($xml, $settings);
        foreach ($this->roots as $root) {
            $root->getHTMLNode($xml, $settings);
        }

        return array(
            'app' => $settings->getApps(),
            'screen' => $settings->getScreens(),
            'settings' => array(
                'main' => $settings->getPrefix() . $this->root->getId(),
                'maintype' => $this->root instanceof App ? 'app' : 'screen'
            )
        );
    }

    /**
     * Get the response text for the client, as either json, or jsonp
     *
     * @param \AppShed\Remote\HTML\Settings $settings
     * @param bool $header Whether to set the correct headers
     * @param bool $return if true the response is returned, otherwise it will be echoed
     *
     * @return string
     */
    public function getResponse($settings = null, $header = true, $return = false)
    {
        $callback = $this->getCallback();

        if ($header) {
            if ($callback) {
                header('Content-type: application/javascript');
            } else {
                header('Content-type: application/json');
            }

            if (isset($_SERVER['HTTP_ORIGIN'])) {
                header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
                header('Access-Control-Allow-Credentials: true');
                header('Access-Control-Max-Age: 86400'); // cache for 1 day
            }
            // Access-Control headers are received during OPTIONS requests
            if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

                if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
                }

                if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
                }

                exit(0);
            }
        }

        if (!$settings) {
            $settings = $this->getSettings();
        }
        $data = $this->getResponseObject($settings);

        $data['remote'] = array(
            'url' => $settings->getFetchUrl(),
            'refreshAfter' => $this->refreshAfter
        );
        $data['remote'][$settings->getFetchUrl()] = $data['settings']['main'];

        $json = json_encode($data);

        if ($callback) {
            $ret = "$callback(" . $json . ");";
        } else {
            $ret = $json;
        }

        if ($return) {
            return $ret;
        }
        echo $ret;
        return null;
    }

    /**
     * Creates a Symfony response object to simplify using the API in Symfony or frameworks that use the
     * HttpFoundation component
     *
     * @param \AppShed\Remote\HTML\Settings $settings
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getSymfonyResponse($settings = null)
    {
        $headers = [];

        if (isset($_SERVER['HTTP_ORIGIN'])) {
            $headers['Access-Control-Allow-Origin'] = $_SERVER['HTTP_ORIGIN'];
            $headers['Access-Control-Allow-Credentials'] = 'true';
            $headers['Access-Control-Max-Age'] = '86400';
        }

        // Access-Control headers are received during OPTIONS requests
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                $headers['Access-Control-Allow-Methods'] = 'GET, POST, OPTIONS';
            }

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                $headers['Access-Control-Allow-Headers'] = $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'];
            }

            return new \Symfony\Component\HttpFoundation\Response('', 200, $headers);
        }

        if (!$settings) {
            $settings = $this->getSettings();
        }
        $data = $this->getResponseObject($settings);

        $data['remote'] = array(
            'url' => $settings->getFetchUrl(),
            'refreshAfter' => $this->refreshAfter
        );
        $data['remote'][$settings->getFetchUrl()] = $data['settings']['main'];

        $response = new \Symfony\Component\HttpFoundation\JsonResponse($data, 200, $headers);

        if (($callback = $this->getCallback())) {
            $response->setCallback($callback);
        }

        return $response;
    }

    /**
     * Override the detected request url
     *
     * @param $url
     */
    public function setRequestUrl($url)
    {
        $this->requestUrl = $url;
    }

    protected function getRequestUrl()
    {
        if ($this->requestUrl) {
            return $this->requestUrl;
        } else {
            if (isset($_REQUEST['fetchURL'])) {
                return $_REQUEST['fetchURL'];
            } else {
                if (isset($_SERVER['HTTP_HOST']) && isset($_SERVER['REQUEST_URI'])) {
                    return (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                } else {
                    return "";
                }
            }
        }
    }

    protected function getCallback()
    {
        if (isset($_REQUEST['callback'])) {
            return $_REQUEST['callback'];
        }
        return false;
    }
}
