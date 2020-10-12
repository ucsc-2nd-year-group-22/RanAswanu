<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        
        // if($logged == false) {
        //     Session::destroy();
        //     header('location: '. URL .'login');
        //     exit;
        // }

        $this->view->js ='dashboard/js/default.js';
    }

    function index() {
        // $logged = Session::get('loggedIn');
        // $role = Session::get('role');
        $this->setActivePage('dashboard');
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