<?php

class Admin extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        
    }

    public function index() {
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        $isAdmin = Session::get('isadmin');
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
                          'path' => 'user/register'
                        ]        
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
                        ]            
                      ],
            'cropReqData' => $cropReqData,
        ];
        
        $this->view->rendor('crop/crops', $pageData);
    }

    public function collectingcenters(){

        $centerData = $this->model->centerList();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [['label' =>'Register New Col. Center',
                        'path' => 'collectingcenter/register'
                        ] 
                    ],
            'centerData' => $centerData,
        ];
        
        $this->view->rendor('collectingcenter/collectingcenters', $pageData);
    }

    public function admins(){

        // This is a dummy data object for testing 
        $cropReqData = [
            [
                'farmerId' => 443,
                'farmerName' => "Kamal",
                'nic' => "864753012v"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Kamal",
                'nic' => "864753012v"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Kamal",
                'nic' => "864753012v"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Kamal",
                'nic' => "864753012v"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Kamal",
                'nic' => "864753012v"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Kamal",
                'nic' => "864753012v"
            ],
        ];

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [ ['label' =>'Register New admin',
                          'path' => 'user/register'
                        ]           
                      ],
            'cropReqData' => $cropReqData,
        ];
        
        $this->view->rendor('admin/admins', $pageData);
    }

    //view all vendors
    public function vendors(){

        $vendorData = $this->model->vendorList();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [],
            'vendorData' => $vendorData,
        ];
        
        $this->view->rendor('vendor/vendors', $pageData);
    }
    //remove a vendor
    public function deleteVendor($id){
        $this->model->delete($id);
        header('location: ' . URL . 'admin/vendors');
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

    //change role to officer
    public function toofficer($id){

        $data = array();
        $data['id'] = $id;
        $data['role'] = 'officer';

        $this->model->toofficer($data);
        Session::set('role', 'officer');
        header('location: ' . URL . 'user');
    }
    //change role to admin
    public function toadmin($id){

        $data = array();
        $data['id'] = $id;
        $data['role'] = 'admin';

        $this->model->toofficer($data);
        Session::set('role', 'admin');
        header('location: ' . URL . 'user');
    }
}