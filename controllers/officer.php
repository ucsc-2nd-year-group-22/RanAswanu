<?php

class Officer extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();


    }

    public function index() {
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        $data = array(
            'role' => $role
        );
        $this->view->rendor('officer/index', $data);
    }

    public function cropReq() {
        $cropReqData = [
            [
                'farmerId' => 443,
                'farmerName' => "Nimal",
                'cropType' => "Carrot"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Madupala",
                'cropType' => "Beans"
            ],
        ];

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => ['Crop Requests', 'other-tab'],
            'cropReqData' => $cropReqData,
        ];
        
        $this->view->rendor('officer/cropReq', $pageData);
    }

    public function damageClaims() {
        $this->view->rendor('officer/damageClaims', $data);
    }

    public function reports() {
        $this->view->rendor('officer/reports', $data);
    }

    public function notifications() {
        $this->view->rendor('officer/notifications', $data);
    }


}