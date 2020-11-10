<?php

class Farmer extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
    }

    public function index() {
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        $data = array(
            'role' => $role
        );
        if(($role=='farmer'|| 'admin') && $logged==true)

            $this->view->rendor('farmer/index', $data);
        else {
            $data['errMsg'] = "Unuthorized Acces ! Only Farmers & Admins can visit the requested page";
            $this->view->rendor('error/index', $data);
        }
            
    }

    public function farmerMng() {
       
        $farmerData = $this->model->farmerList();
        $data['officerData'] = $farmerData;
        $this->setActivePage('farmerMng');
        $this->view->rendor('farmer/farmerMng', $data);
    }

   
    public function damageclaim($arg = false) {
        $this->view->rendor('farmer/damageclaim');
    }



    public function cropReq($arg = false) {
        $this->view->rendor('farmer/cropReq');
    }
    
    public function sellyourcrops($arg = false) {
        $this->view->rendor('farmer/sellyourcrops');
    }
   
  /*  public function vendOffers($arg = false) {
        $this->view->rendor('farmer/vendOffers');
    }

*/



    //instert damage claim information to the database
    public function creates()
    {
        
        $data=array();

        
        $data['dmgdate'] = $_POST['dmgdate'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['gramasewa'] = $_POST['gramasewa'];
        $data['address'] = $_POST['address'];
        $data['estdmgarea'] = $_POST['estdmgarea'];
        $data['waydmg'] = $_POST['waydmg'];
        $data['details'] = $_POST['details'];

        $this->model->creates($data);
        header('location: ' . URL . 'farmer/damageclaim');
       
    }

    
    
     //insterting crop details of farmers' which expect to sell
   public function sellurcrops()
    {
        $data=array();

        
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['state'] = $_POST['state'];
        $data['selectCrop'] = $_POST['selectCrop'];
        $data['cropVariety'] = $_POST['cropVariety'];
        $data['exprice'] = $_POST['exprice'];
        $data['weight'] = $_POST['weight'];
        $data['display'] = $_POST['display'];
        
        $this->model->sellurcrops($data);
        header('location: ' . URL . 'farmer/sellyourcrops');

    }

       //inserting crop request details
    public function cropRequest()
    {
        $data=array();

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
      header('location: ' . URL . 'farmer/cropReq');



    }

 


  public function vendOffers() {
    $verdoffersData= [
        [
            'vendername' => "Nimal Siripala",
            'croptype' => "Potatoe-CG1",
          //  'weight' => "7 weeks",
            'price' => "34",
            'district' => "Colombo",
            'dateTime' => "10-05-2020 | 10.00 AM",
            
        ],


    /*    [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],
        [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],
        [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],*/

    ];

    $pageData = [
        'role' => Session::get('role'),
        'verdoffersData' => $verdoffersData,
    ];
    // Session::set('activePage', 'cropReq');
    $this->view->js = 'officer/js/default';
    $this->setActivePage('vendOffers');
    $this->view->rendor('farmer/vendOffers', $pageData);
}


 public function damageclaimif() {
    $damageclaimData= [
        [
            'dmgdate' => "10-05-2020",
            'district' => "Kandy",
          //  'weight' => "7 weeks",
            'address' => "12,kandy rd,Kandy", 
            'approval'=>"pending",          
        ],


    /*    [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],
        [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],
        [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],*/

    ];

    $pageData = [
        'role' => Session::get('role'),
        'damageclaimData' => $damageclaimData,
    ];
    // Session::set('activePage', 'cropReq');
    $this->view->js = 'officer/js/default';
    $this->setActivePage('damageclaimif');
    $this->view->rendor('farmer/damageclaimif', $pageData);
}

  


public function sellyourcropsif() {
    $sellurcropsData= [
        [
            
            'district' => "Colombo",
            'state' => "After Harvest",
          //  'weight' => "7 weeks",
            'croptype' => "Potatoe-CG1", 
            'exptprice'=>"45",
            'totalweight' =>"560"          
        ],


    /*    [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],
        [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],
        [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],*/

    ];

    $pageData = [
        'role' => Session::get('role'),
        'sellurcropsData' => $sellurcropsData,
    ];
    // Session::set('activePage', 'cropReq');
    $this->view->js = 'officer/js/default';
    $this->setActivePage('sellyourcropsif');
    $this->view->rendor('farmer/sellyourcropsif', $pageData);
}


public function cropReqif() {
    $cropReqifData= [
        [
            
            'district' => "Kandy",
            'address' => "12,kandy rd,Kandy",
          //  'weight' => "7 weeks",
            'areasize' => "20", 
            'expectdate'=>"10-05-2020",
            'croptype' =>"Potatoe-CG1"          
        ],


    /*    [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],
        [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],
        [
            'farmer' => "Nimal Siripala",
            'crop' => "Potatoe-CG1",
            'period' => "7 weeks",
            'area' => "Udawalawe-north",
            'harvest' => "1.2 MT",
            'demand' => "Below",
            'dateTime' => "10-05-2020 | 10.00 AM"
        ],*/

    ];

    $pageData = [
        'role' => Session::get('role'),
        'cropReqifData' => $cropReqifData,
    ];
    // Session::set('activePage', 'cropReq');
    $this->view->js = 'officer/js/default';
    $this->setActivePage('cropReqif');
    $this->view->rendor('farmer/cropReqif', $pageData);
}




}