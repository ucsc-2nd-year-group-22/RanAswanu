<?php

class Vendor extends Controller{

    function __construct() {
        parent::__construct();
        
    }

    function index() {
        $this->view->rendor('vendor/index');
    }

    public function other($arg = false) {
        require 'models/help_model.php';
        $model = new Help_Model();
        $this->view->rendor('help/index', $data);
        
        // $this->view->blah = $model->blah();
    }
}