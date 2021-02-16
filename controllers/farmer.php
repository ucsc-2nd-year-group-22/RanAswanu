<?php


/////////////////////// Naming Conventions for Farmer Controller

///////// dipslay and manage

// sellCropMng
// offerMng
// damageMng
// cropReqMng

///////// Forms - Create new 

// newSellCropForm
// newDmgClaimForm
// newCropReqForm

///////// Views - Forms - Update existing

// editSellCropForm
// editDmgClaimForm
// editCropReqForm

///////// Views - View content of one item

// viewSellCrop
// viewDmg
// viewCropReq
// viewOtherCrops
// viewFarmer

///////// Insert into DB

// insertCropReq
// insertSellCrop
// insertDmg
// insertOffer


class Farmer extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
    }


    public function index()
    {
        // $data = array(
        //     'role' => $role
        // );

        // if((Session::get('role') =='farmer'|| 'admin') && Session::get('loggedIn')==true)
        //     $this->view->rendor('farmer/index', $data);
        // else {
        //     $data['errMsg'] = "Unuthorized Acces ! Only Farmers & Admins can visit the requested page";
        //     $this->view->rendor('error/index', $data);
        // }
        $data = array();
        $this->view->rendor('farmer/viewSellCrop', $data);
    }

    // Damges Claim ============================================================

    public function damageMng($arg = false)
    {
        $dmgclaimData = $this->model->damageclaimList();
        $data['damageclaimData'] = $dmgclaimData;
        $this->setActivePage('damageMng');
        $this->view->rendor('farmer/damageMng', $data);
    }

    public function newDmgClaimForm()
    {
        $this->view->rendor('farmer/newDmgClaimForm', $data);
    }

    //instert damage claim information to the database
    public function insertDmg($arg = false)
    {
        $data['dmgdate'] = $_POST['dmgdate'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['gramasewa'] = $_POST['gramasewa'];
        $data['address'] = $_POST['address'];
        $data['estdmgarea'] = $_POST['estdmgarea'];
        $data['waydmg'] = $_POST['waydmg'];
        $data['details'] = $_POST['details'];
        $this->model->creates($data);
        header('location: ' . URL . 'farmer/damageclaimif');
    }

    // Crop Request ============================================================

    //Display croprequest
    public function cropReqMng()
    {
        // $cropReqifData= $this->model->cropReqList();  
        // $data['cropRequestData'] = $cropReqifData;
        $this->setActivePage('cropReqMng');
        $this->view->rendor('farmer/cropReqMng');
    }

    public function newCropReqForm()
    {
        $this->view->rendor('farmer/newCropReqForm');
    }

    public function insertCropReq()
    {
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['gramasewa'] = $_POST['gramasewa'];
        $data['address'] = $_POST['address'];
        $data['areasize'] = $_POST['areasize'];
        $data['exptdate'] = $_POST['exptdate'];
        $data['croptype'] = $_POST['croptype'];
        $data['selectCrop'] = $_POST['selectCrop'];
        $data['cropVariety'] = $_POST['cropVariety'];
        $data['otherdetails'] = $_POST['otherdetails'];
        //  $data['conditions'] = $_POST['conditions'];

        $this->model->cropRequest($data);
        header('location: ' . URL . 'farmer/cropReqif');
    }

    // Sell Crops ============================================================

    //Display sellyourcrops
    public function sellCropMng()
    {
        $sellcropsData = $this->model->sellcropsList();
        $data['sellurcropsData'] = $sellcropsData;
        $this->setActivePage('sellCropMng');
        $this->view->rendor('farmer/sellCropMng', $data);
    }

    public function insertSellCrop()
    {
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['state'] = $_POST['state'];
        $data['selectCrop'] = $_POST['selectCrop'];
        $data['cropVariety'] = $_POST['cropVariety'];
        $data['exprice'] = $_POST['exprice'];
        $data['weight'] = $_POST['weight'];
        $data['display'] = $_POST['display'];
        // print_r($data);
        $this->model->sellurcrops($data);
        header('location: ' . URL . 'farmer/sellyourcropsif');
    }

    public function sellCropsForm()
    {
        $this->view->rendor('farmer/sellyourcrops');
    }

    // Vendor Offer ============================================================

    public function offerMng()
    {
        $verdoffersData = [
            [
                'vendername' => "Nimal Siripala",
                'croptype' => "Potatoe-CG1",
                //  'weight' => "7 weeks",
                'price' => "34",
                'district' => "Colombo",
                'dateTime' => "10-05-2020 | 10.00 AM",

            ],




        ];

        $pageData = [
            'role' => Session::get('role'),
            'verdoffersData' => $verdoffersData,
        ];
        // Session::set('activePage', 'cropReq');
        $this->view->js = 'officer/js/default';
        $this->setActivePage('offerMng');
        $this->view->rendor('farmer/offerMng', $pageData);
    }

    // !!!!!!!!!!!!!!!!!  Handled by Officer role --------------- !!!!!!!!!!!!
    public function farmerMng()
    {

        $farmerData = $this->model->farmerList();

        // if(isset($_GET))

        $data['farmerData'] = $farmerData;
        $this->setActivePage('farmerMng');
        if ((Session::get('role') == 'farmer' || 'admin') && Session::get('loggedIn') == true)
            $this->view->rendor('farmer/farmerMng', $data);
        else {
            $data['errMsg'] = "Unuthorized Acces ! Only Farmers & Admins can visit the requested page";
            $this->view->rendor('error/index', $data);
        }
    }

    // AJAX CALLS ////////////////////////////////////////////////////////////////////////////////////////////////////

    public function ajxSearchFarmerName()
    {
        $d = $this->model->ajxSearchFarmerName($_POST['search']);
        $data['farmerData'] = $d;
        // print_r($data['farmerData']);
        if (!empty($d)) {
            $this->view->rendor('farmer/ajxFarmerList', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function ajxSearchFarmerNic()
    {
        $d = $this->model->ajxSearchFarmerNic($_POST['search']);
        $data['farmerData'] = $d;
        // print_r($data['farmerData']);
        if (!empty($d)) {
            $this->view->rendor('farmer/ajxFarmerList', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function ajxFilterFarmer()
    {

        $d = $this->model->ajxFilterFarmer($_POST['filter'], $_POST['ascOrDsc']);
        $data['farmerData'] = $d;

        // print_r($data['farmerData']);
        if (!empty($d)) {
            $this->view->rendor('farmer/ajxFarmerList', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function ajxListCropReq()
    {
        $d = $this->model->ajxListCropReq($_POST['farmer_id']);
        $data['cropReqs'] = $d;
        // print_r($data['cropReqs']);
        if (!empty($d)) {
            $this->view->rendor('farmer/ajxCropMng', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }



    //######################################## END OF Farmer ###################################################################################################
}
