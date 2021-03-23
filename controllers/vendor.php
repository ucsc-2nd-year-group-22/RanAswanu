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

    public function ajxSortCrops() {
        $d = $this->model->ajxSortCrops($_POST['filter'], $_POST['ascOrDsc']);
        $data['crops'] = $d;
       

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxCrop', $data, $withoutHeaderFooter = true);
            
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
    

        }
    }

    //Search Crops by name
    public function ajxSearchCrops() {
        
        $d = $this->model->ajxSearchCrops($_POST['search']);
        $data['crops'] = $d;
    
        if(!empty($d)) {
            $this->view->rendor('vendor/ajxCrop', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }

     //Search Crops by district_name
     public function ajxSearchCrops() {
        
        $d = $this->model->ajxSearchCrops($_POST['search']);
        $data['crops'] = $d;
    
        if(!empty($d)) {
            $this->view->rendor('vendor/ajxCrop', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }
}