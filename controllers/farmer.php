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
        $this->setActivePage('damageclaim');
        $this->view->rendor('farmer/damageclaim');
    }

<<<<<<< HEAD


    public function cropReq($arg = false) {
=======
    public function cropReq($arg = false) {
        $this->setActivePage('cropReq');
>>>>>>> 7d98a3239aebcea78e048622e92cf8de47fb3411
        $this->view->rendor('farmer/cropReq');
    }
    
    public function sellyourcrops($arg = false) {
<<<<<<< HEAD
=======
        $this->setActivePage('sellyourcrops');
>>>>>>> 7d98a3239aebcea78e048622e92cf8de47fb3411
        $this->view->rendor('farmer/sellyourcrops');
    }
   
    public function vendOffers($arg = false) {
<<<<<<< HEAD
=======
        $this->setActivePage('vendOffers');
>>>>>>> 7d98a3239aebcea78e048622e92cf8de47fb3411
        $this->view->rendor('farmer/vendOffers');
    }

    //instert damage claim information to the database
<<<<<<< HEAD
    public function creates()
    {
        
=======
    public function create()
    {
>>>>>>> 7d98a3239aebcea78e048622e92cf8de47fb3411
        $data=array();

        $data['username'] = $_POST['username'];
        $data['dmgdate'] = $_POST['dmgdate'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['gramasewa'] = $_POST['gramasewa'];
        $data['address'] = $_POST['address'];
        $data['estdmgarea'] = $_POST['estdmgarea'];
        $data['waydmg'] = $_POST['waydmg'];
        $data['details'] = $_POST['details'];
<<<<<<< HEAD

        $this->model->creates($data);
        header('location: ' . URL . 'farmer/damageclaim');
=======
>>>>>>> 7d98a3239aebcea78e048622e92cf8de47fb3411
       
    }

    
    
<<<<<<< HEAD
     //insterting crop details of farmers' which expect to sell
   public function sellurcrops()
    {
        $data=array();

        $data['username'] = $_POST['username'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['croptype'] = $_POST['croptype'];
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

        $data['username'] = $_POST['username'];
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

 /*  public function vendOffers()
    {
        $venderoffersdata= [
            [


            ]

            [

            ]


        ];
    }


  */  
    
=======
>>>>>>> 7d98a3239aebcea78e048622e92cf8de47fb3411

}