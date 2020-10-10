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

        $this->view->js = array('dashboard/js/default.js');
    }

    function index() {
        $logged = Session::get('loggedIn');
        $role = Session::get('role');

        

        if($role == 'admin') {
            header('Location: admin');
        }
        if($role == 'officer')
            header('Location: officer');

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