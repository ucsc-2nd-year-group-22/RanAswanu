<?php

class Farmer extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();
        if( Session::get('loggedIn') == false || Session::get('role') != 'admin') {
            Session::destroy();
            header('location: '. URL .'user/login');
            exit;
        }
    }

    function index() {
        $this->view->rendor('farmer/index');
    }

    public function farmers(){

        // This is a dummy data object for testing 
        $cropReqData = [
            [
                'farmerId' => 443,
                'farmerName' => "Nimal",
                'nic' => "874568123v"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Madupala",
                'nic' => "874568123v"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Nimal",
                'nic' => "874568123v"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Madupala",
                'nic' => "874568123v"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Nimal",
                'nic' => "874568123v"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Madupala",
                'nic' => "874568123v"       
            ],
        ];

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [],
            'cropReqData' => $cropReqData,
        ];
        
        $this->view->rendor('farmer/farmers', $pageData);
    }
}