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


class Farmer extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
    }


    public function index() {
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

    public function damageMng($arg = false) {
        $dmgclaimData = $this->model->damageclaimList();
        $data['damageclaimData'] = $dmgclaimData;
        $this->setActivePage('damageMng');
        $this->view->rendor('farmer/damageMng', $data);
    }

    public function newDmgClaimForm() {
        $this->view->rendor('farmer/newDmgClaimForm', $data);
    }

    //instert damage claim information to the database
    public function insertDmg($arg = false) {
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
    public function cropReqMng() {
        $this->setActivePage('cropReqMng');
        $this->view->rendor('farmer/cropReqMng');
    }

    public function newCropReqForm() {
        $provinces = $this->model->getProvinces();

        $pageData = [
            'provinces' => $provinces
        ];
        $this->view->rendor('farmer/newCropReqForm', $pageData);
    }

    public function insertCropReq() {
        // print_r($_POST);
        $data['harvesting_month'] = filter_var($_POST['harvesting_month'], FILTER_SANITIZE_STRING);
        $data['harvesting_month'] = date("m",strtotime($data['harvesting_month']));
        $data['starting_month'] = filter_var($_POST['startMonth'], FILTER_SANITIZE_STRING);
        $data['starting_month']  = date("m",strtotime($data['starting_month']));
        
        $data['expected_harvest'] = filter_var($_POST['expected_harvest'], FILTER_SANITIZE_STRING);
        $data['is_accept'] = 0;
        $data['gs_id'] = filter_var($_POST['gramaSewa'], FILTER_SANITIZE_STRING);
        $data['crop_id'] = filter_var($_POST['selectCrop'], FILTER_SANITIZE_STRING);
        $data['center_id'] = filter_var($_POST['selectCenter'], FILTER_SANITIZE_STRING);
        // $data['address'] = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
        // $data['cropVart'] = filter_var($_POST['cropVart'], FILTER_SANITIZE_STRING);
        $data['farmer_user_id'] = Session::get('user_id');
        $data['officer_user_id'] = '';

        // print_r($data);
        $this->model->insertCropReq($data);


        header('location: ' . URL . 'farmer/cropReqMng');
    }

    // Sell Crops ============================================================

    //Display sellyourcrops
    public function sellCropMng() {
        // $sellcropsData = $this->model->sellcropsList();
        $data['sellurcropsData'] = $sellcropsData;
        $this->setActivePage('sellCropMng');
        $this->view->rendor('farmer/sellCropMng', $data);
    }

    public function insertSellCrop() {
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

    public function sellCropsForm() {
        $this->view->rendor('farmer/sellyourcrops');
    }

    // Vendor Offer ============================================================

    public function offerMng() {
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
    public function farmerMng() {

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

    public function ajxSearchFarmerName() {
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

    public function ajxSearchFarmerNic() {
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

    public function ajxFilterFarmer() {

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

    public function ajxListCropReq() {
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

    public function ajxGetCropTypes() {
        $cropsTypes = $this->model->ajxGetCropTypes($_GET['district']);
        echo json_encode($cropsTypes);
    }

    public function ajxGetCropVart() {
        $varats = $this->model->ajxGetCropVart($_GET['type']);
        // print_r($varats);
        echo json_encode($varats);
    }

    public function ajxGetHarvPerLand() {
        // echo $_GET['vart'];
        $hpl = $this->model->ajxGetHarvPerLand($_GET['vart']);
        echo json_encode($hpl);
    }

    public function ajxGetCenters() {
        $centers = $this->model->ajxGetCenters();
        echo json_encode($centers);
    }

    public function ajxSortCropReqs() {
        $d = $this->model->ajxSortCropReqs($_POST['filter'], $_POST['ascOrDsc']);
        $data['cropReqs'] = $d;

        if (!empty($d)) {
            $this->view->rendor('farmer/ajxCropMng', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function ajxFilterCropReq() {
        $d = $this->model->ajxFilterCropReq($_POST['filter']);
        $data['cropReqs'] = $d;

        if (!empty($d)) {
            $this->view->rendor('farmer/ajxCropMng', $data, $withoutHeaderFooter = true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter = true);
        }
    }

    public function deleteCropReq($harvest_id) {
        echo $harvest_id;
        $this->model->deleteCropReq($harvest_id);
       
    }

    function editCropReqForm($harvest_id) {
        
        $provinces = $this->model->getProvinces();

        $data = [
            'provinces' => $provinces
        ];
        $data['cropReqData'] = $this->model->getCropReq($harvest_id);
        $this->view->rendor('farmer/editCropReqForm', $data);
        // print_r($data['cropReqData']);
    }



    //######################################## END OF Farmer ###################################################################################################
}
