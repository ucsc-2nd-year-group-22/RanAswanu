<?php

class Vendor extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();

    }

    function index() {
        $sellData = $this->model->cropDetails();
        $data['Req'] = $sellData;
        $this->setActivePage('index');
        $this->view->rendor('vendor/sellingReq', $data);

    }

    public function register($arg = false) {
        $this->view->rendor('vendor/register');
    }

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
    public function placeaOffer($id)
    { 
        $data['adid']= $id;
        $this->view->rendor('vendor/placeaOffer',$data);
    }

      public function offer($adid)
    {
        $data['Vid'] = Session::get('id');
        $data['Adid'] =  $adid;
        $data['Ammount'] =  $_POST['ammount'];
        $this->model-> setOffer($data);
        header('location: ' . URL . 'vendor/index');
    }

    public function updateOffer($id)
    {
        $data['adid']= $id;
        $this->view->rendor('vendor/updateOffer',$data);
    }

    public function update($adid)
    {
        $data['Vid'] = Session::get('id');
        $data['Adid'] =  $adid;
        $data['Ammount'] =  $_POST['ammount'];
        $this->model-> updateOffer($data);
        header('location: ' . URL . 'vendor/index');
    }

    public function deleteOffer($id)
    {
        $data['Adid']= $id;
        $data['Vid'] = Session::get('id');
        $this->model->deleteOffer($data);
        header('location: ' . URL . 'vendor/index');
    }

    public function viewFarmer($id)
    {
        $farmerData = $this->model->farmerDetail($id);
        $data['Fdata'] = $farmerData ;
        $this->view->rendor('farmer/viewFarmer',$data);
    }

    public function viewCrops()
    {

        $crop =  [[
                'name' => "Orange",
                'type' => "MICH-Y1",
                'ammount' => "12",
            ],
            [
                'name' => "Orange",
                'type' => "MICH-Y1",
                'ammount' => "12",
            ],
        ];

        $Cropdata = ['Cdata'=>$crop];
        $this->view->rendor('farmer/viewCrops',$Cropdata);
    }

}