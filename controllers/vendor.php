<?php

class Vendor extends Controller{

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
    }

    function index() {
        $sellData = $this->model->cropDetails();
        $data['Req'] = $sellData;

        $myOffers = $this->model->myOffers(Session::get('id'));
        $data['myOffers'] = $myOffers;
        
        // print_r($data);
        //$this->setActivePage('index');
       // $this->view->rendor('vendor/sellingReq', $data);

    }

    //Display Cropsmng
    Public function allCrops(){
        $this->setActivePage('allCrops');
        $this->view->rendor('vendor/allCrops');

    } 

    //Display Offermng
    public function OffersMng(){
        $this->setActivePage('OffersMng');
        $this->view->rendor('vendor/OffersMng');
    }

    Public function viewfarmerprofile($user_id){
        // $data=['user_id'=>$user_id];
        $data['user_id']=$user_id;
        
        // $data['farmerprofiledata']=$this->model->viewprofile($user_id);
        $ss=$this->view->vendr=$this->model->viewprofile($user_id);
        $data['details']=$ss;
        $this->view->rendor('vendor/viewfarmerprofile',$data);
        //print_r($data['ccc']);
    } 

    // public function countsellingreqid($user_id){
    //     $data['user_id']=$user_id;
        
    //     // $data['farmerprofiledata']=$this->model->viewprofile($user_id);
    //     $ss=$this->model->countsellingreq($user_id);
    //     $data['sellingreq']=$ss;
    //     $this->view->rendor('vendor/viewfarmerprofile',$data);

    // }


    //////////////////////////AJAX///////////////////
    public function ajxListCrop() {
        // $d = $this->model->ajxListCrop($_POST['harvest_id']);
        $d = $this->model->ajxListCrop();
        $data['crops'] = $d;
       // print_r($data['crops']);
        
        if (!empty($d)) {
            
            $this->view->rendor('vendor/ajxCrop', $data,$withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data,$withoutHeaderFooter = true);
        }
    }
    


    





    ///////////////////////////PREVIOUS FUNCTIONS/////////////////////////
    /*
    public function register($arg = false) {
        $this->view->rendor('vendor/register');
    }

    //retriev all vendors
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
        $data['aId']= $id;
        $this->view->rendor('vendor/placeaOffer',$data);
    }

    public function offer($aId)
    {
        $data['Vid'] = Session::get('id');
        $data['aId'] =  $aId;
        $data['Ammount'] =  $_POST['ammount'];
        $this->model-> setOffer($data);
        header('location: ' . URL . 'vendor/index');
    }

 

    public function update($reqid)
    {
        $data['reqid'] =  $reqid;
        $data['amount'] =  $_POST['ammount'];
        $this->model-> updateOffer($data);
        header('location: ' . URL . 'vendor/index');
    }

    public function undoOffer($id)
    {
        $data['reqid']= $id;
        $this->model->undoOffer($data);
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

    public function ajxListcrop(){
        $d=$this->model->ajxListcrop($_POST['vendor_id']);
        $data['crops']=$d;
        if(!empty($d)){
            $this->view->rendor('vendor/ajxCrop',$data);
        }else{
            $data['errMsg']="No Result Found !";
            $this->view->rendor('error/index',$data);
        }
    }

    
    public function ajxSortCrop() {
        $d = $this->model->ajxSortCrop($_POST['filter'], $_POST['ascOrDsc']);
        $data['crops'] = $d;

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxCrop', $data);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data);
        }
    }

    */


}