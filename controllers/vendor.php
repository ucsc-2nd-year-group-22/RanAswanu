<?php

class Vendor extends Controller{

    function __construct() {
        parent::__construct();
        
    }

    function index() {
        $this->view->rendor('vendor/index');
    }

    public function register($arg = false) {
        $this->view->rendor('vendor/register');
    }
}