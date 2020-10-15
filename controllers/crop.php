<?php

class Crop extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();
    }

    function index() {
        $this->view->rendor('crop/crops');
    }

    public function register($arg = false) {
        $this->view->rendor('crop/register');
    }

    public function create(){
        $data = array();

        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];

        // TODO: Do error checking

        $this->model->create($data);
        header('location: ' . URL . 'vendor');
    }

    //route to view all crops registered in the system
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
            'tabs' => [ ['label' =>'+ Register New Crop',
                          'path' => 'crop/register'
                        ]            
                      ],
            'cropReqData' => $cropReqData,
        ];
        $this->setActivePage('crops');
        $this->view->rendor('crop/crops', $pageData);
    }
}