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
                          'path' => 'officer/register'
                        ],
                        ['label' =>'some label',
                          'path' => 'admin/#'
                        ],            
                      ],
            'cropReqData' => $cropReqData,
        ];
        
        $this->view->rendor('officer/officers', $pageData);
    }
    public function createofficer(){

    }

    public function crops(){

        // This is a dummy data object for testing 
        $cropReqData = [
            [
                'farmerId' => 443,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
        ];

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [ ['label' =>'Register New Crop',
                          'path' => 'crop/register'
                        ],
                        ['label' =>'some label',
                          'path' => 'admin/#'
                        ],            
                      ],
            'cropReqData' => $cropReqData,
        ];
        
        $this->view->rendor('crop/crops', $pageData);
    }

    public function admins(){

        // This is a dummy data object for testing 
        $cropReqData = [
            [
                'farmerId' => 443,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Carrot",
                'nic' => "2"
            ],
        ];

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [ ['label' =>'Register New Crop',
                          'path' => 'admin/register'
                        ],
                        ['label' =>'some label',
                          'path' => 'admin/#'
                        ],            
                      ],
            'cropReqData' => $cropReqData,
        ];
        
        $this->view->rendor('admin/admins', $pageData);
    }
}