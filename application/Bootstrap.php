<?php
/**
 * Created by PhpStorm.
 * User: Zoltán Németh
 * Date: 2017. 04. 12.
 * Time: 22:29
 */
class Bootstrap extends Yaf_Bootstrap_Abstract {

    private $_config;

    public function _initBootstrap(){
        $this->_config = Yaf_Application::app()->getConfig();
    }

    public function _initErrors(){
        if($this->_config->application->showErrors){
            error_reporting (-1);
            ini_set('display_errors','On');
        }
    }

    public function _initNamespaces(){
    }

    public function _initRoutes(){
        /**
        Yaf_Dispatcher::getInstance()->getRouter()->addRoute(
            "paging_example",
            new Yaf_Route_Regex(
                "#^/index/page/(\d+)#",
                array('controller' => "index"),
                array(1 => "page")
            )
        );
         */

    }

    public function _initLayout(Yaf_Dispatcher $dispatcher){
        $layout = new LayoutPlugin('layout.phtml');
        Yaf_Registry::set('layout', $layout);
        /*add the plugin to the dispatcher*/
        $dispatcher->registerPlugin($layout);
    }

    public function _initSession(Yaf_Dispatcher $dispatcher) {
        $session = Yaf_Session::getInstance();
        $session->start();
    }

    public function _initDatabase(Yaf_Dispatcher $dispatcher) {
        //@TODO: Database connection with Singleton
    }

}
