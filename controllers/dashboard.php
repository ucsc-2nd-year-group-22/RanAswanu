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

    function submit(){
        $data = array();
        
        $data['crop_type'] = filter_var($_POST['cropType'], FILTER_SANITIZE_STRING);
        $data['crop_varient'] = filter_var($_POST['cropVart'], FILTER_SANITIZE_STRING);
        $data['month'] = filter_var($_POST['month'], FILTER_SANITIZE_STRING);
        $data['center_id'] = filter_var($_POST['center_name'], FILTER_SANITIZE_STRING);
        $data['center_name'] = $this->model->getCenter($data['center_id'])[0];
        $data['month_name'] = $this->model->getMonth($data['month'])[0];
       
        $this->view->rendor('dashboard/dashboard', $data);
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