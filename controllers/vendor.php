<?php

class Vendor extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
    }

   
    function MyOffers()
    {
        // $myOffers = $this->model->myOffers(Session::get('user_id'));
        // $data['myOffers'] = $myOffers;
        $this->setActivePage('MyOffers');
        $this->view->rendor('vendor/myOffers');
    }
 

    //Display Cropsmng
    public function allCrops()
    {
        $this->setActivePage('allCrops');

        $this->view->rendor('vendor/allCrops');
    }

    //Display Offermng
    public function OffersMng()
    {
        $this->setActivePage('OffersMng');
        $this->view->rendor('vendor/OffersMng');
    }

    //trasfer data from db to giveoffer page
    public function giveOffer($selling_req_id)
    {
        $user_id = Session::get('user_id');

        $data['selling_req_id'] = $selling_req_id;
        $data['user_id']=$user_id;
        $this->view->offer = $this->model->giveOffer($selling_req_id,$user_id);
        //$data['selling_req_id'] = $selling_req_id;
        $this->view->rendor('vendor/giveOffer', $data);
        // print_r($this->view->offer);
        // $this->setActivePage('giveOffer');
        // $this->view->rendor('vendor/giveOffer');
    }


    public function updatevenOffer($selling_req_id)
    {
        
        // $data['offer_id'] = $offer_id;
        // $this->view->rendor('vendor/updateOffer', $data);
        // print_r($_POST);
        $data['max_offer'] = $_POST['max_offer'];   
        $data['req_id'] = $selling_req_id;
        $data['user_id']=$_POST['user_id'];
        $this->model->updatevenOffer($data);

        header('location: ' . URL . 'vendor/allCrops');
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    public function updateOffer($offer_id)
    {
        $data['offer_id'] = $offer_id;
        $this->view->rendor('vendor/updateOffer',$data);
    }

    public function update($reqid)
    {
        $data['reqid'] =  $reqid;
        $data['amount'] =  $_POST['ammount'];
        $this->model->updateOffer($data);
        header('location: ' . URL . 'vendor/MyOffers');
        
    }
    
    public function undoOffer($id)
    {
        $data['offer_id'] = $id;
        $this->model->undoOffer($data);
        header('location: ' . URL . 'vendor/MyOffers');
    }
////////////////////////////////////////////////////////////////////////////////////////////
    public function viewfarmerprofile($user_id)
    {
        // $data=['user_id'=>$user_id];
        $data['user_id'] = $user_id;

        $ss = $this->view->vendr = $this->model->viewprofile($user_id);
        $data['details'] = $ss;
        // print_r($data['details']);
        $this->view->rendor('vendor/viewfarmerprofile', $data);
        //print_r($data['ccc']);
    }

    public function viewcontacts($user_id)
    {
        // $data=['user_id'=>$user_id];
        $data['user_id'] = $user_id;

        $ss = $this->view->vendr = $this->model->viewprofile($user_id);
        $data['details'] = $ss;
        // print_r($data['details']);
        $this->view->rendor('vendor/viewcontacts', $data);
        //print_r($data['ccc']);
    }



    //display accepted offers from the farmer
    public function acceptedOffers()
    {

        $this->setActivePage('acceptedOffers');
        $this->view->rendor('vendor/acceptedOffers');
    }




    //////////////////////////AJAX///////////////////
    public function ajxListCrop()
    {
        // $d = $this->model->ajxListCrop($_POST['harvest_id']);
        $d = $this->model->ajxListCrop($_POST['vendor_id']);
        $data['crops'] = $d;
        // print_r($data['crops']);

        if (!empty($d)) {

            $this->view->rendor('vendor/ajxCrop', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function ajxSortCrops()
    {
       
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
    public function ajxSearchCrops()
    {

        $d = $this->model->ajxSearchCrops($_POST['search']);
        $data['crops'] = $d;

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxCrop', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    //Search Crops by district_name
    public function ajxSearchCropsdistrict()
    {

        $d = $this->model->ajxSearchCropsdistrict($_POST['search']);
        $data['crops'] = $d;

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxCrop', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }


    public function ajxacceptedOffers()
    {
        $d = $this->model->acceptedOffersList();
        $data['accepted_offers'] = $d;
        // print_r($data['accepted_offers']);

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxacceptedOffers', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }


    public function ajxSearchAcceptedCrops()
    {

        $d = $this->model->ajxSearchAcceptedCrops($_POST['search']);
        $data['accepted_offers'] = $d;

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxacceptedOffers', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function ajxSearchAcceptedCropsid()
    {

        $d = $this->model->ajxSearchAcceptedCropsid($_POST['search']);
        $data['accepted_offers'] = $d;

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxacceptedOffers', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    
    //////////////////////Ajx functions in my offers///////////////////////////////////////
    public function loadOffers()
    {
        $myOffers = $this->model->myOffers(Session::get('user_id'));
        $data['myOffers'] = $myOffers;
        //print_r($data['myOffers']);
        if (!empty($data['myOffers'])) {
            $this->view->rendor('vendor/ajxViewOffers', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function SearchCrops()
    {
        $d = $this->model->SearchCrops($_POST['search']);
        $data['myOffers'] = $d;

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxViewOffers', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function SearchCollectingCenter()
    {
        $d = $this->model->SearchCollectingCenter($_POST['search']);
        $data['myOffers'] = $d;

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxViewOffers', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function SortWeightOffer()
    {
        $d = $this->model->SortWeightOffer($_POST['search']);
        $data['myOffers'] = $d;

        if (!empty($d)) {
            $this->view->rendor('vendor/ajxCrop', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

  

    // public function ajxSortAcceptedCrops()
    // {
    //     $d = $this->model->ajxSortAcceptedCrops($_POST['filter'], $_POST['ascOrDsc']);
    //     $data['accepted_offers'] = $d;


    //     if (!empty($d)) {
    //         $this->view->rendor('vendor/ajxacceptedOffers', $data, $withoutHeaderFooter = true);
    //     } else {
    //         $data['errMsg'] = "No Result Found !";
    //         $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
    //     }
    // }

    
}
