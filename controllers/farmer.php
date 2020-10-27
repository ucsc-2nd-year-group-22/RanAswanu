<?php

class Farmer extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
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
   
    public function vendOffers($arg = false) {
        $this->view->rendor('farmer/vendOffers');
    }

    //instert damage claim information to the database
    public function create()
    {
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
       
    }

    
    
     //insterting crop details of farmers' which expect to sell
   public function sellcrops()
    {
        $data=array();

        $data['username'] = $_POST['username'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['selectCrop'] = $_POST['selectCrop'];
        $data['state'] = $_POST['state'];
        $data['cropVariety'] = $_POST['cropVariety'];
        $data['exprice'] = $_POST['exprice'];
        $data['weight'] = $_POST['weight'];
        $data['display'] = $_POST['display'];
    }

    
    public function cropRequest()
    {
        $data=array();

        $data['username'] = $_POST['username'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['gramasewa'] = $_POST['gramasewa'];
        $data['address'] = $_POST['address'];
        $data['areasize'] = $_POST['areasize'];
        $data['Expdate'] = $_POST['Expdate'];
        $data['croptype'] = $_POST['croptype'];
        $data['selectCrop'] = $_POST['selectCrop'];
        $data['cropVariety'] = $_POST['cropVariety'];
        $data['otherdetails'] = $_POST['otherdetails'];
        $data['conditions'] = $_POST['conditions'];



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
    

}