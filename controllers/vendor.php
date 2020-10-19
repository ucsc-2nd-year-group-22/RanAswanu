<?php

class Vendor extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();

    }

  
    public function viewVendor(){
        $this->view->rendor('vendor/view');
    }

    //view all vendors
    public function manageVendors(){

        $vendorData = $this->model->vendorList();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [],
            'vendorData' => $vendorData,
        ];
        
        $this->setActivePage('userMgt');
        $this->view->rendor('vendor/manageVendors', $pageData);
    }

    //remove a vendor
    public function delete($id){
        $this->model->delete($id);
        header('location: ' . URL . 'vendor/manageVendors');
    }



    public function sellingReq(){
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
        // Session::set('activePage', 'cropReq');
        //$this->view->js = 'officer/js/default';  //why do we need this JS file
        $this->setActivePage('sellingReq');
        $this->view->rendor('vendor/sellingReq', $pageData);
    }


    function placeaOffer(){
        $this->view->rendor('vendor/placeaOffer');
    }

    function viewFarmer(){
        $this->view->rendor('vendor/viewFarmer');
    }

      function index() {
        $this->view->rendor('vendor/index');
    }

    public function register($arg = false) {
        $this->view->rendor('vendor/register');
    }



}