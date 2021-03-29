<?php

class Vendor extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::init();
    }

    function index()
    {
        // $sellData = $this->model->cropDetails();
        // $data['Req'] = $sellData;
        // $myOffers = $this->model->myOffers(Session::get('user_id'));
        // $data['myOffers'] = $myOffers;
        
        //print_r($data);
        $this->setActivePage('index');
        $this->view->rendor('vendor/sellingReq');
    }

    function MyOffers()
    {
        // $myOffers = $this->model->myOffers(Session::get('user_id'));
        // $data['myOffers'] = $myOffers;
        $this->setActivePage('MyOffers');
        $this->view->rendor('vendor/myOffers');
    }

    public function register($arg = false)
    {
        $this->view->rendor('vendor/register');
    }

    //retriev all vendors
    public function vendors()
    {

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
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'vendor/vendors');
    }

    //MY FUNCTIONS
    public function placeaOffer($id)
    {
        $data['aId'] = $id;
        $this->view->rendor('vendor/placeaOffer', $data);
    }

    public function offer($aId)
    {
        $data['Vid'] = Session::get('id');
        $data['aId'] =  $aId;
        $data['Ammount'] =  $_POST['ammount'];
        $this->model->setOffer($data);
        header('location: ' . URL . 'vendor/index');
    }

    public function updateOffer($id)
    {
        $data['reqid'] = $id;
        $this->view->rendor('vendor/updateOffer', $data);
    }

    public function update($reqid)
    {
        $data['reqid'] =  $reqid;
        $data['amount'] =  $_POST['ammount'];
        $this->model->updateOffer($data);
        header('location: ' . URL . 'vendor/index');
    }

    public function undoOffer($id)
    {
        $data['offer_id'] = $id;
        $this->model->undoOffer($data);
        header('location: ' . URL . 'vendor/index');
    }

    public function viewFarmer($id)
    {
        $farmerData = $this->model->farmerDetail($id);
        $data['Fdata'] = $farmerData;
        $this->view->rendor('farmer/viewFarmer', $data);
    }

    public function viewCrops()
    {

        $crop =  [
            [
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

        $Cropdata = ['Cdata' => $crop];
        $this->view->rendor('farmer/viewCrops', $Cropdata);
    }

    //Search vendors by name
    public function ajxSearchVendorName()
    {

        $d = $this->model->ajxSearchVendorName($_POST['search']);
        $data['farmerData'] = $d;
        // print_r($data['farmerData']);
        if (!empty($d)) {
            $this->view->rendor('vendor/ajxVendorList', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    //Search vendor by NIC 
    public function ajxSearchVendorNic()
    {
        $d = $this->model->ajxSearchVendorNic($_POST['search']);
        $data['farmerData'] = $d;
        // print_r($data['farmerData']);
        if (!empty($d)) {
            $this->view->rendor('vendor/ajxVendorList', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    //Sort vendors
    public function ajxFilterVendor()
    {

        $d = $this->model->ajxFilterVendor($_POST['filter'], $_POST['ascOrDsc']);
        $data['farmerData'] = $d;

        // print_r($data['farmerData']);
        if (!empty($d)) {
            $this->view->rendor('vendor/ajxVendorList', $data, $withoutHeaderFooter = true);
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
       // print_r($data['myOffers']);
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
            $this->view->rendor('vendor/ajxCrop', $data, $withoutHeaderFooter = true);
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

  
}
