<?php

class Vendor extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();
    }

    function index() {
        $this->view->rendor('vendor/index');
    }

    public function register($arg = false) {
        $this->view->rendor('vendor/register');
    }

    public function viewVendor(){
        $this->view->rendor('vendor/view');
    }
}