<?php

class Admin extends Controller {

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
        $this->view->rendor('admin/index', $data);
    }

    public function officers(){

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
            'tabs' => [ ['label' =>'Register New Officer',
                          'path' => 'admin/#'
                        ],
                        ['label' =>'some label',
                          'path' => 'admin/#'
                        ],            
                      ],
            'cropReqData' => $cropReqData,
        ];
        
        $this->view->rendor('admin/officers', $pageData);
    }
}