<?php 

class Farmer_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function farmerList() {
        $st = $this->db->prepare("SELECT * FROM users WHERE role = :role");
        $st->execute(array(
            ':role' => 'farmer'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();
    }
    

    public function creates($data)
    {

    $st = $this->db->prepare("INSERT INTO dmgclaim (`username` , `dmgdate` , `province` , `district` , `gramasewa` , `address` , `estdmgarea` , `waydmg` , `details`) VALUES ( :username , :dmgdate , :province , :district , :gramasewa , :address , :estdmgarea , :waydmg , :details)");
        $st-> execute(array(
            ':username' => $data['username'],
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
        $st=$this->db->prepare("INSERT INTO sellcrops (`username` , `province` , `district`, `croptype` , `state` , `selectCrop`  , `cropVariety` , `exprice` , `weight` , `display`) VALUES ( :username , :province , :district , :croptype ,:state , :selectCrop , :cropVariety , :exprice , :weight , :display)");
        $st->execute(array(
            ':username' => $data['username'],
            ':province' =>$data['province'],
            ':district' => $data['district'],
            ':croptype' =>$data['croptype'],
            ':state' =>$data['state'],
            ':selectCrop' =>$data['selectCrop'],
            ':cropVariety' => $data['cropVariety'],
            ':exprice' => $data ['exprice'],
            ':weight' => $data['weight'],
            ':display'=> $data['display']
            

        ));
    }

    public function cropRequest($data)
    {
        $st=$this->db->prepare("INSERT INTO croprequest(`username` , `province` , `district` , `gramasewa` , `address` , `areasize` , `exptdate` , `croptype` , `selectCrop` , `cropVariety` , `otherdetails`) VALUES ( :username , :province , :district , :gramasewa , :address , :areasize , :exptdate , :croptype , :selectCrop , :cropVariety , :otherdetails)");
        $st->execute(array(           
            ':username' => $data['username'],
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

   



        
    
    
}