<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
    }

    function index() {
        $this->setActivePage('homepage');
        $this->view->rendor('index/index');
    }



}