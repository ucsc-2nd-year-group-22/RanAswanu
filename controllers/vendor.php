<?php

class Vendor extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();

    }

    function index() {
        $this->view->rendor('vendor/index');
    }

    public function register($arg = false) {
        $this->view->rendor('vendor/register');
    }

    public function viewVendor(){
        $this->view->rendor('vendor/view');
    }

    //view all vendors
    public function vendors(){

        $vendorData = $this->model->vendorList();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [],
            'vendorData' => $vendorData,
        ];
        
        $this->setActivePage('userMgt');
        $this->view->rendor('vendor/vendors', $pageData);
    }

    //remove a vendor
    public function delete($id){
        $this->model->delete($id);
        header('location: ' . URL . 'vendor/vendors');
    }

    //MY FUNCTIONS
    public function placeaOffer()
    {
        $this->view->rendor('vendor/placeaOffer');
    }

    public function viewFarmer()
    {

       // $farmerData = ['name'=>'kamal','telephone'=>'0713568802', 'address'=>'261,gallroad,kaluthara.'];

        $this->view->rendor('farmer/viewFarmer');
    }

    public function viewCrops()
    {
        $this->view->rendor('farmer/viewCrops');
    }

    public function sellingReq()
    {
         /*$cropReqData = [
            [
                'name' => "Suneetha Madawala",
                'id' => "Pumpkin, Carrot",
                'type' => "Horowpathana-south",
               
            ],
            [
                'name' => "Suneetha Madawala",
                'id' => "Pumpkin, Carrot",
                'type' => "Horowpathana-south",
               
            ],
            [
                'name' => "Suneetha Madawala",
                'id' => "Pumpkin, Carrot",
                'type' => "Horowpathana-south",
               
            ],
        ];*/

        $this->view->rendor('vendor/sellingReq');
    }

}