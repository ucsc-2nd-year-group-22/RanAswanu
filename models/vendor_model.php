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

       
        // $st=$this->db->prepare("SELECT selling_request.* , user.user_id, crop.crop_type ,divisional_secratariast.ds_name FROM harvest 
        // JOIN crop ON crop.crop_id=harvest.harvest_id 
        // JOIN divisional_secratariast ON divisional_secratariast.ds_id=harvest.gs_id 
        // JOIN selling_request ON selling_request.harvest_id=harvest.harvest_id JOIN user ON user.user_id=harvest.farmer_user_id
        // ");

        $st=$this->db->prepare("SELECT selling_request.*,crop.*,user.user_id,user.first_name,user.last_name, district.ds_name 
        FROM `selling_request` 
        JOIN harvest ON harvest.harvest_id = selling_request.harvest_id 
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
        JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id 
        JOIN district ON district.district_id = divisional_secratariast.district_id
        JOIN user ON user.user_id=harvest.farmer_user_id 
        JOIN crop ON crop.crop_id=harvest.crop_id");
        // JOIN user_tel ON user_tel.user_id=user.user_id


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
        
       $st=$this->db->prepare("SELECT selling_request.* ,user.user_id ,user.first_name,user.last_name,user_tel.tel_no FROM user 
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
    

    
    
    public function ajxSortCrops($filter, $ascOrDsc) {
        
        if ($ascOrDsc == 'ASC') {
            $det="SELECT selling_request.*,crop.*,user.user_id,user.first_name,user.last_name, district.ds_name 
            FROM `selling_request` 
            JOIN harvest ON harvest.harvest_id = selling_request.harvest_id 
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
            JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id 
            JOIN district ON district.district_id = divisional_secratariast.district_id
            JOIN user ON user.user_id=harvest.farmer_user_id 
            JOIN crop ON crop.crop_id=harvest.crop_id ORDER BY selling_request.$filter ASC";
            }

        if ($ascOrDsc == 'DESC') {
            $det="SELECT selling_request.*,crop.*,user.user_id,user.first_name,user.last_name, district.ds_name 
            FROM `selling_request` 
            JOIN harvest ON harvest.harvest_id = selling_request.harvest_id 
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
            JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id 
            JOIN district ON district.district_id = divisional_secratariast.district_id
            JOIN user ON user.user_id=harvest.farmer_user_id 
            JOIN crop ON crop.crop_id=harvest.crop_id ORDER BY selling_request.$filter DESC";
            }

            $st=$this->db->prepare($det);
            $st->execute();
           // print_r($st->fetchAll);
            return $st->fetchAll(PDO::FETCH_ASSOC);
    

    }

    public function ajxSearchCrops($crop_name){
        $st="SELECT selling_request.*,crop.*,user.user_id,user.first_name,user.last_name, district.ds_name 
        FROM `selling_request` 
        JOIN harvest ON harvest.harvest_id = selling_request.harvest_id 
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
        JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id 
        JOIN district ON district.district_id = divisional_secratariast.district_id
        JOIN user ON user.user_id=harvest.farmer_user_id 
        JOIN crop ON crop.crop_id=harvest.crop_id
        WHERE crop.crop_type LIKE :crops";

        $st=$this->db->prepare($st);
        $st->execute(array(
            'crops'=>"$crop_name%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);

    }
        



   

}