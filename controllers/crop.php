<?php

class Crop extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();
    }

    function index() {
        $this->view->rendor('crop/crops');
    }

    //route to the crop register form
    public function register($arg = false) {
        $this->view->rendor('crop/register');
    }

    //get the post data and create the crop in the database
    public function create(){
        $data = array();

        $data['crop_varient'] = $_POST['crop_varient'];
        $data['crop_type'] = $_POST['crop_type'];
        $data['best_area'] = $_POST['best_area'];
        $data['harvest_per_land'] = $_POST['harvest_per_land'];
        $data['harvest_period'] = $_POST['harvest_period'];
        $data['discription'] = $_POST['discription'];

        // TODO: Do error checking

        $this->model->create($data);
        header('location: ' . URL . 'crop/crops');
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