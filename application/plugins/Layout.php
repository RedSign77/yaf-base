<?php

/**
 * Class LayoutPlugin
 */
class LayoutPlugin extends Yaf_Plugin_Abstract
{
    private $_layoutDir;
    private $_layoutFile;
    private $_layoutVars = array();

    public function __construct($layoutFile, $layoutDir = null)
    {
        $this->_layoutFile = $layoutFile;
        $this->_layoutDir  = ($layoutDir) ? $layoutDir : __DIR__ . '/../views';
    }

    public function __set($name, $value)
    {
        $this->_layoutVars[$name] = $value;
    }

    public function postDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
    {
        $body = $response->getBody();
        $response->clearBody();
        $layout          = new Yaf_View_Simple($this->_layoutDir);
        $layout->content = $body;
        $layout->assign('layout', $this->_layoutVars);
        $response->setBody($layout->render($this->_layoutFile));
    }

}
