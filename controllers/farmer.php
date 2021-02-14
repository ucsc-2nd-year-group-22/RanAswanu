<?php
        
class Farmer extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
    }

    
    public function index() {
        $data = array(
            'role' => $role
        );

        if((Session::get('role') =='farmer'|| 'admin') && Session::get('loggedIn')==true)
            $this->view->rendor('farmer/index', $data);
        else {
            $data['errMsg'] = "Unuthorized Acces ! Only Farmers & Admins can visit the requested page";
            $this->view->rendor('error/index', $data);
        }
            
    }

    public function ajxSearchFarmerName() {
        $d = $this->model->ajxSearchFarmerName($_POST['search']);
        $data['farmerData'] = $d;
        // print_r($data['farmerData']);
        if(!empty($d)) {
            $this->view->rendor('farmer/ajxFarmerList', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }

    public function ajxSearchFarmerNic() {
        $d = $this->model->ajxSearchFarmerNic($_POST['search']);
        $data['farmerData'] = $d;
        // print_r($data['farmerData']);
        if(!empty($d)) {
            $this->view->rendor('farmer/ajxFarmerList', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }

    public function ajxFilterFarmer() {

        $d = $this->model->ajxFilterFarmer($_POST['filter'], $_POST['ascOrDsc']);
        $data['farmerData'] = $d;

        // print_r($data['farmerData']);
        if(!empty($d)) {
            $this->view->rendor('farmer/ajxFarmerList', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }

    public function farmerMng() {
       
        $farmerData = $this->model->farmerList();

        // if(isset($_GET))

        $data['farmerData'] = $farmerData;
        $this->setActivePage('farmerMng');
        if((Session::get('role') =='farmer'|| 'admin') && Session::get('loggedIn')==true)
            $this->view->rendor('farmer/farmerMng', $data);
        else {
            $data['errMsg'] = "Unuthorized Acces ! Only Farmers & Admins can visit the requested page";
            $this->view->rendor('error/index', $data);
        }
    }

   
    public function damageclaim($arg = false) {
        

        if((Session::get('role') =='farmer'|| 'admin') && Session::get('loggedIn')==true)
            $this->view->rendor('farmer/farmerMng', $data);
        else {
            $data['errMsg'] = "Unuthorized Acces ! Only Farmers & Admins can visit the requested page";
            $this->view->rendor('farmer/damageclaim');
        }
    }
     
    //display damageclaim
    public function damageclaimif($arg = false) {
        $dmgclaimData = $this->model->damageclaimList();
        $data['damageclaimData'] = $dmgclaimData;
        $this->setActivePage('damageclaimif');
        $this->view->rendor('farmer/damageclaimif', $data);
    }
    
    //Display croprequest
    public function cropReqif($arg = false) {
        $cropReqifData= $this->model->cropReqList();  
        $data['cropRequestData'] = $cropReqifData;
        $this->setActivePage('cropReqif');
        $this->view->rendor('farmer/cropReqif', $data);
        

    }

    //Display sellyourcrops
    public function sellyourcropsif() {
        $sellcropsData=$this->model->sellcropsList();
        $data['sellurcropsData'] = $sellcropsData;
        $this->setActivePage('sellyourcropsif');
        $this->view->rendor('farmer/sellyourcropsif', $data);
     

    }    


    public function cropReq($arg = false) {
        $this->view->rendor('farmer/cropReq');
    }
    
    public function sellyourcrops() {
        $this->view->rendor('farmer/sellyourcrops');
    }
   
    //instert damage claim information to the database
    public function creates($arg = false)
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
        header('location: ' . URL . 'farmer/damageclaimif');
       
    }

    
    
     //insterting crop details of farmers' which expect to sell
   public function sellurcropsA()
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
        // print_r($data);
        $this->model->sellurcrops($data);
        header('location: ' . URL . 'farmer/sellyourcropsif');

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
      header('location: ' . URL . 'farmer/cropReqif');



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

//remove damage claim data
public function deletedmg($dmgid){
    $this->model->deletedmg($dmgid);
    header('location: ' . URL . 'farmer/damageclaimif');
}

//remove sellcrops data
public function deletesellcrops($cropsid){
    $this->model->deletesellcrops($cropsid);
    header('location: ' . URL . 'farmer/sellyourcropsif');
}

//remove crop request data
public function deletecropreq($cropreqid){
    $this->model->deletecropreq($cropreqid);
    header('location: ' . URL . 'farmer/cropReqif');
}






// route to the edit croprequest form with retrieved data
public function editcropReq($cropreqid){
    $data['cropreqid']=$cropreqid;
    $this->view->farmer = $this->model->cropRequestList($cropreqid);
    $this->view->rendor('farmer/editcropReq',$data);
}

//update the database(cropreq)
public function updatecropReq($aId){

    $data = array();

  

   /* $data['district'] = $_POST['district'];
    $data['address'] = $_POST['address'];
    $data['areasize'] = $_POST['areasize'];
    $data['exptdate'] = $_POST['exptdate'];                
    $data['selectCrop'] = $_POST['selectCrop'];
    $data['cropVariety'] = $_POST['cropVariety'];
    $data['cropreqid']=$cropreqid;  */
  

    $data['province'] = $_POST['province'];
    $data['district'] = $_POST['district'];
    $data['gramasewa'] = $_POST['gramasewa'];
    $data['address'] = $_POST['address'];
    $data['areasize'] = $_POST['areasize'];
    $data['exptdate'] = $_POST['exptdate'];
   // $data['croptype'] = $_POST['croptype'];
    $data['selectCrop'] = $_POST['selectCrop'];
    $data['cropVariety'] = $_POST['cropVariety'];
    $data['otherdetails'] = $_POST['otherdetails'];
    $data['aId']=$aId;

    
    $this->model->updatecropReq($data);
    header('location: ' . URL . 'farmer/cropReqif');
}

// route to the edit sellurcrops form with retrieved data
public function editsellyourcrops($aId){
    $data['aId']=$aId;
    $this->view->farmer = $this->model->sellurcropsList($aId);
    $this->view->rendor('farmer/editsellyourcrops',$data);
    
}

//update the database(cropreq)
public function updatesellyourcrops($aId){

    $data = array();




    $data['province'] =$_POST['province'];
    $data['district'] = $_POST['district'];
    $data['state'] =$_POST['state'];
    $data['selectCrop'] =$_POST['selectCrop'];
    $data['cropVariety'] = $_POST['cropVariety'];
    $data['exprice'] = $_POST ['exprice'];
    $data['weight'] = $_POST['weight'];
  //  $data['display']= $_POST['display'];
    $data['cropsid']= 111;
    $data['aId'] = $aId;

    

    // print_r($data);
    
    $this->model->updatesellyourcrops($data);
    
    header('location: ' . URL . 'farmer/sellyourcropsif');
}




// route to the edit dmgclaim form with retrieved data
public function editdmgclaim($dmgid){
    $data['dmgid']=$dmgid;
    $this->view->farmer = $this->model-> dmgclaimList($dmgid);
    $this->view->rendor('farmer/editdmgclaim',$data);
}

    //update the database(dmgclaim)
public function updatedmgclaim($dmgid){

    $data = array();


        $data['dmgdate'] = $_POST['dmgdate'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['gramasewa'] = $_POST['gramasewa'];
        $data['address'] = $_POST['address'];
        $data['estdmgarea'] = $_POST['estdmgarea'];
        $data['waydmg'] = $_POST['waydmg'];
        $data['details'] = $_POST['details'];
        $data['dmgid'] =$dmgid;
        



    
    $this->model->updatedmgclaim($data);
    header('location: ' . URL . 'farmer/damageclaimif');
}



//view damageclaim
/*public function viewdamageclaim($arg = false) {
    $dmgclaimData = $this->model->damageclaimList();
    $data['damageclaimData'] = $dmgclaimData;
    $this->setActivePage('viewdamageclaim');
    $this->view->rendor('farmer/viewdamageclaim', $data);
}


*/

// route to the viwe dmgclaim form with retrieved data
public function viewdamageclaim($dmgid){
    $data['dmgid']=$dmgid;
    $this->view->farmer = $this->model-> dmgclaimList($dmgid);
    $this->view->rendor('farmer/viewdamageclaim',$data);
}


// route to the view cropreq form with retrieved data
public function viewcropReq($cropreqid){
    $data['cropreqid']=$cropreqid;
    $this->view->farmer = $this->model-> cropRequestList($cropreqid);
    $this->view->rendor('farmer/viewcropReq',$data);
}

// route to the view cropreq form with retrieved data
public function viewsellyourcrops($cropsid){
    $data['cropsid']=$cropsid;
    $this->view->farmer = $this->model-> sellurcropsList($cropsid);
    $this->view->rendor('farmer/viewsellyourcrops',$data);
}


}