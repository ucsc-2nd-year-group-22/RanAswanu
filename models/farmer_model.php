<?php 

class Farmer_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function farmerList() {
        $st = $this->db->prepare("SELECT * FROM user WHERE role = :role");
        $st->execute(array(
            ':role' => 'farmer'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();
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
    
}



   



        
    
    
