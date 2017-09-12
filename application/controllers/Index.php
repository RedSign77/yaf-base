<?php
/**
 * Created by PhpStorm.
 * User: info
 * Date: 2017. 04. 12.
 * Time: 22:29
 */
class IndexController extends Yaf_Controller_Abstract {

    private $_layout;

    public function init(){
        $this->_layout = Yaf_Registry::get('layout');
    }

    public function indexAction() {

        /*layout*/
        $this->_layout->meta_title = 'Essentia.cloud';
        $this->getView()->word = "Essentia.cloud - under development";
    }
}