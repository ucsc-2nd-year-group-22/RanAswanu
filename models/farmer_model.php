<?php 

class Farmer_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    //Display damageclaim
    public function damageclaimList(){
        $st = $this->db->prepare("SELECT * FROM dmgclaim  ");
        $st->execute(array(
            ':dmgid' => 'dmgid'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();

    }

    //edit damageclaim
    public function dmgclaimList($dmgid){
        $st = $this->db->prepare("SELECT * FROM dmgclaim WHERE dmgid=:dmgid");
        $st->execute(array(
            ':dmgid' => $dmgid,
        ));
        // print_r($st->fetchAll());
        return $st->fetch();

    }

    //Display croprequest
    public function cropReqList(){
        $st = $this->db->prepare("SELECT * FROM croprequest  ");
        $st->execute(array(
            ':cropreqid' => 'cropreqid'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();

    }
    
    //Edit croprequest
    public function cropRequestList($cropreqid){
        $st = $this->db->prepare("SELECT * FROM croprequest WHERE cropreqid =:cropreqid ");
        $st->execute(array(
            ':cropreqid' => $cropreqid,
        ));
        // print_r($st->fetchAll());
        return $st->fetch();

    }

    public function sellcropsList(){
        $st = $this->db->prepare("SELECT * FROM sellcrops  ");
        $st->execute(array(
            ':cropsid' => 'cropsid'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();

    }
    
    //edit sellyourcrops
    public function sellurcropsList($aId){
        $st = $this->db->prepare("SELECT * FROM sellcrops WHERE aId=:aId");
        $st->execute(array(
            ':aId' => $aId,
        ));
        // print_r($st->fetchAll());
        return $st->fetch();

    }



    public function creates($data)
    {
        // print_r($data);
    $st = $this->db->prepare("INSERT INTO dmgclaim ( `dmgdate` , `province` , `district` , `gramasewa` , `address` , `estdmgarea` , `waydmg` , `details`) VALUES ( :dmgdate , :province , :district , :gramasewa , :address , :estdmgarea , :waydmg , :details)");
        $st-> execute(array(
            
            ':dmgdate' => $data['dmgdate'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':gramasewa' => $data['gramasewa'],
            ':address' => $data['address'],
            ':estdmgarea' => $data['estdmgarea'],
            ':waydmg' => $data['waydmg'],
            ':details' => $data['details']


        ));
    }

  

    public function sellurcrops($data)
    {
    print_r($data);
    $st=$this->db->prepare("INSERT INTO sellcrops ( `province` , `district` , `state` , `selectCrop`  , `cropVariety` , `exprice` , `weight` , `display`, `cropsid` ) VALUES (  :province , :district  ,:state , :selectCrop , :cropVariety , :exprice , :weight , :display, :cropsid)");
        $st-> execute(array(
    
            ':province' =>$data['province'],
            ':district' => $data['district'],
            ':state' =>$data['state'],
            ':selectCrop' =>$data['selectCrop'],
            ':cropVariety' => $data['cropVariety'],
            ':exprice' => $data ['exprice'],
            ':weight' => $data['weight'],
            ':display'=> $data['display'],
            ':cropsid' => 111

        ));
    }


    public function cropRequest($data)
    {
        $st=$this->db->prepare("INSERT INTO croprequest ( `province` , `district` , `gramasewa` , `address` , `areasize` , `exptdate` , `croptype` , `selectCrop` , `cropVariety` , `otherdetails`) VALUES (  :province , :district , :gramasewa , :address , :areasize , :exptdate , :croptype , :selectCrop , :cropVariety , :otherdetails)");
        $st->execute(array(           
            
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':gramasewa' => $data['gramasewa'],
            ':address' => $data['address'],
            ':areasize' => $data['areasize'],
            ':exptdate' => $data['exptdate'],
            ':croptype' => $data['croptype'],
            ':selectCrop' => $data['selectCrop'],
            ':cropVariety' => $data['cropVariety'],
            ':otherdetails' => $data['otherdetails']
       //     ':conditions' => $data['conditions']

        ));
    }

    //deleting dmgclaim data
    public function deletedmg($dmgid){
        $st = $this->db->prepare("DELETE FROM dmgclaim WHERE dmgid = :dmgid ");
        $st->execute(array(
            ':dmgid' => $dmgid
        ));
       
    }
    
    //deleting sellcrops data
    public function deletesellcrops($cropsid){
        $st = $this->db->prepare("DELETE FROM sellcrops WHERE aId = :cropsid ");
        $st->execute(array(
            ':cropsid' => $cropsid
        ));
       
    }

    //deleting cropreq data
    public function deletecropreq($cropreqid){
        $st = $this->db->prepare("DELETE FROM croprequest WHERE cropreqid = :cropreqid ");
        $st->execute(array(
            ':cropreqid' => $cropreqid
        ));

    }

    

    //update cropreq
    public function updatecropReq($data){
        $st = $this->db->prepare("UPDATE croprequest SET `province`=:province, `district` = :district,`gramasewa`=:gramasewa, `address` = :address, `areasize` = :areasize, `exptdate` = :exptdate, `selectCrop` = :selectCrop, `cropVariety` = :cropVariety, `otherdetails`=:otherdetails WHERE `cropreqid` = :cropreqid");
        $st->execute(array(
           // ':id' => $data['id'],
           // ':cropreqid' =>$data['cropreqid'],
           ':province' => $data['province'],
            ':district' => $data['district'],
            ':gramasewa' => $data['gramasewa'],
            ':address' => $data['address'],
            ':areasize' => $data['areasize'],
            ':exptdate' => $data['exptdate'],
            ':selectCrop' => $data['selectCrop'],
            ':cropVariety' => $data['cropVariety'],
            ':otherdetails' => $data['otherdetails'],
            ':cropreqid' =>$data['cropreqid']

        ));
    }

    //update sellcrops
    public function updatesellyourcrops($data){
       // $st = $this->db->prepare("UPDATE sellcrops SET `province`=:province, `district` = :district ,`state`=:state, `selectCrop` = :selectCrop, `cropVariety` = :cropVariety, `exprice` = :exprice, `weight` = :weight, `display` = :display, `otherdetails`=:otherdetails WHERE `cropsid` = :cropsid");
        $st = $this->db->prepare("UPDATE sellcrops SET `province` = :province, `district` = :district, `state` = :state, `selectCrop` = :selectCrop, `cropVariety` = :cropVariety, `exprice` = :exprice, `weight` = :weight, `cropsid` = :cropsid WHERE `aId` = :aId");
        $st->execute(array(
            ':province' =>$data['province'],
            ':district' => $data['district'],
            ':state' =>$data['state'],
            ':selectCrop' =>$data['selectCrop'],
            ':cropVariety' => $data['cropVariety'],
            ':exprice' => $data ['exprice'],
            ':weight' => $data['weight'],
           // ':display'=> $data['display'],
            ':cropsid' =>$data['cropsid'],
            ':aId' => $data['aId']
        ));
        // print_r($st);
    }


    //update dmgclaim
    public function updatedmgclaim($data){
        // $st = $this->db->prepare("UPDATE sellcrops SET `province`=:province, `district` = :district ,`state`=:state, `selectCrop` = :selectCrop, `cropVariety` = :cropVariety, `exprice` = :exprice, `weight` = :weight, `display` = :display, `otherdetails`=:otherdetails WHERE `cropsid` = :cropsid");
         $st = $this->db->prepare("UPDATE dmgclaim SET `dmgdate`=:dmgdate, `province`=:province, `district` = :district, `gramasewa`=:gramasewa, `address`=:address, `estdmgarea`=:estdmgarea, `waydmg`=:waydmg, `details`=:details  WHERE `dmgid` = :dmgid");
         $st->execute(array(
           
            ':dmgdate' => $data['dmgdate'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':gramasewa' => $data['gramasewa'],
            ':address' => $data['address'],
            ':estdmgarea' => $data['estdmgarea'],
            ':waydmg' => $data['waydmg'],
            ':details' => $data['details'],
            ':dmgid' =>$data['dmgid']
            
 
         ));
     }




    /// !!!!!!!!!!!!!!! Handled by OFficer !!!!!!!!!!!!!!!!!!!!!!1
    public function farmerList() {
        $st = $this->db->prepare("SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'farmer' GROUP BY user.user_id");

        // SELECT user.user_name, user.first_name, group_concat(user_tel.tel_no) FROM user JOIN user_tel on user.user_id =user_tel.user_id GROUP BY user.user_id
        $st->execute(array(
            ':role' => 'farmer'
        ));
        // print_r($st->fetchAll());
        
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }


    ////////////// AJAX CALLS /////////////////////////////////////////////////////////////

    public function ajxSearchFarmerName($farmerName) {
        $escaped_name = addcslashes($farmerName, '%');
        $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'farmer' AND user.first_name LIKE :first_name OR user.last_name LIKE :first_name GROUP BY user.user_id";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':first_name' => "$farmerName%"
        ));
        
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxFilterFarmer($filter, $ascOrDsc) {
    //    echo $ascOrDsc;

        if($ascOrDsc == 'ASC') {
            $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'farmer' GROUP BY user.user_id ORDER BY $filter ASC";
        } else if ($ascOrDsc == 'DESC') {
            $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'farmer' GROUP BY user.user_id ORDER BY $filter DESC";
        }

        
        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function ajxSearchFarmerNic($nic) {
        $escaped_name = addcslashes($nic, '%');
        $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'farmer' AND user.nic LIKE :nic  GROUP BY user.user_id";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':nic' => "$nic%"
        ));
        
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
    



    ##################################### END OF FARMER MODEL ##############################################################################
}



   



        
    
    
