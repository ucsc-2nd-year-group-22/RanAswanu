<?php

class Vendor_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //retrieve all vendors
    public function vendorList()
    {
        $st = $this->db->prepare("SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'vendor' GROUP BY user.user_id");

        // SELECT user.user_name, user.first_name, group_concat(user_tel.tel_no) FROM user JOIN user_tel on user.user_id =user_tel.user_id GROUP BY user.user_id
        $st->execute(array(
            ':role' => 'vendor'
        ));
        // print_r($st->fetchAll());

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxListCrop()
    {      

       
        $st=$this->db->prepare("SELECT selling_request.* , user.*, crop.crop_type ,divisional_secratariast.ds_name FROM harvest 
        JOIN crop ON crop.crop_id=harvest.harvest_id 
        JOIN divisional_secratariast ON divisional_secratariast.ds_id=harvest.gs_id 
        JOIN selling_request ON selling_request.harvest_id=harvest.harvest_id JOIN user ON user.user_id=harvest.farmer_user_id
        ");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
        
    }


    // public function viewprofile(){
        
        
    //     $st=$this->db->prepare("SELECT * FROM user");
    //     $st->execute(array(
    //         ':user_id'=>'user_id'
   
    //     ));
    //     //print_r($st->fetchAll);
    //     return $st->fetchAll();
    // }


    public function viewprofile($user_id){
        
       // $st=$this->db->prepare("SELECT user.*,selling_request.* From user JOIN selling_request on selling_request.farmer_user_id=user.user_id WHERE user_id=$user_id");  
        
       $st=$this->db->prepare("SELECT selling_request.* ,user.*,user_tel.tel_no FROM user 
       JOIN selling_request ON selling_request.farmer_user_id= user.user_id
       JOIN user_tel ON user_tel.user_id=user.user_id
       where user.user_id=$user_id");
        // $st=$this->db->prepare("SELECT user.user_id,user.first_name,user.last_name,user_tel.tel_no FROM user 
        // JOIN user_tel ON user_tel.user_id=user.user_id
        // where user.user_id=$user_id ");

        
         $st->execute(array(
             ':user_id'=>$user_id,
         ));
        //print_r($st->fetch);
        return $st->fetch();
    }

    // public function countsellingreq($user_id){
    //     $st=$this->db->prepare("SELECT COUNT(selling_request.selling_req_id) FROM selling_request 
    //     JOIN user ON user.user_id=selling_request.farmer_user_id
    //      where user.user_id=$user_id");
    // }
    

    
    //////////////////////////////PREVIOUS FUNCTIONS////////////////////
    //display Crops
    //public function 

    /*

    //delete a vendor
    public function delete($id)
    {
        $st = $this->db->prepare('DELETE FROM user WHERE user_id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }


    //Thishan's functions
    //show details of farmers
    public function farmerDetail($id)
    {

        $st = $this->db->prepare("SELECT   firstname, id, sex, email, address, tel FROM users WHERE id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }

    //retrieve advertisements posted by the farmer
    public function cropDetails()
    {
        $st = $this->db->prepare("SELECT  aId, cropsid, selectCrop, weight, exprice, district FROM sellcrops ");
        $st->execute();
        return $st->fetchAll();
    }

    //make an offer for a sellreq
    public function setOffer($data)
    {
        $st = $this->db->prepare("INSERT INTO request (`adid`, `vid`, `amount`) VALUES (:adid, :vid, :amount)");
        $st->execute(array(
            ':adid' => $data['aId'],
            ':vid' => $data['Vid'],
            ':amount' => $data['Ammount']
        ));
    }

    //update sent offers
    public function updateOffer($data)
    {
        $st = $this->db->prepare('UPDATE request SET `amount` = :amount WHERE reqid = :reqid');
        $st->execute(array(
            ':reqid' => $data['reqid'],
            ':amount' => $data['amount'],
        ));
    }

    //delete sent offers
    public function undoOffer($data)
    {
        $st = $this->db->prepare('DELETE FROM request WHERE reqid = :id');
        $st->execute(array(
            ':id' => $data['reqid']
        ));
    }

    //getting offers sent by vendor (logged in)
    public function myOffers($id)
    {
        $st = $this->db->prepare("SELECT * FROM request WHERE vid = :id");
        $st->execute(array(
            ':id' => $id
        ));
        return $st->fetchAll();
    }

    

    */
}
