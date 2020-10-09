<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false) {
            Session::destroy();
            header('location: '. URL .'login');
            exit;
        }

        $this->view->js = array('dashboard/js/default.js');
    }

    function index() {
        $this->view->rendor('dashboard/index');
    }
    
    // xhr => xml http request
    function xhrInsert () {
        $this->model->xhrInsert();
    }

    function xhrGetListings() {
        $this->model->xhrGetListings();
    }

    function xhrDeleteListing() {
        $this->model->xhrDeleteListing();
    }
    
    
}  