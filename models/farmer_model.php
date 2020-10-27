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
    

    public function create($data)
    {
        $st = $this->db->prepare("INSERT INTO farmers ('username' , 'dmgdate' , 'province' , 'district' , 'gramasewa' , 'address' , 'estdmgarea' , 'waydmg' , 'details') VALUES ( :username , :dmgdate , :province , :district , :gramasewa , :address , :estdmgarea , :waydmg , :details)");
        $st-> execute(array(
            ':username' => $_POST['username'],
            ':dmgdate' => $_POST['dmgdate'],
            ':provice' => $_POST['provice'],
            ':dmgdate' => $_POST['province'],
            ':district' => $_POST['district'],
            ':gramasewa' => $_POST['gramasewa'],
            ':address' => $_POST['address'],
            ':estdmgarea' => $_POST['estdmgarea'],
            ':waydmg' => $_POST['waydmg'],
            ':details' => $_POST['details'],


        ));
    }


    public function sellcrops($data)
    {
        $st=$this->db->prepare("INSERT INTO farmers('username' , 'provice' , 'district' , 'selectcrop' , 'state' ,  'cropVariety' , 'exprice' , 'weight' , 'display') VALUES ( :username , :province , :district , :selectcrop ,:state , :cropVariety , :exprice , :weight , :display)");
        $st->execute(array(
            ':username' => $_POST['username'],
            ':province' => $_POST['province'],
            ':district' => $_POST['district'],
            ':selectCrop' => $_POST['selectCrop'],
            ':state' => $_POST['state'],
            ':cropVariety' => $_POST['cropVariety'],
            ':exprice' => $_POST['exprice'],
            ':weight' => $_POST['weight'],
            ':display'=> $_POST['display'],
            

        ));
    }

    public function cropRequest($data)
    {
        $st=$this->db->prepare("INSERT INTO farmers('username' , 'province' , 'district' , 'gramasewa' , 'address' , 'areasize' , 'Expdate' , 'croptype' , 'selectCrop' , 'cropVariety' , 'otherdetails' , 'conditions') VALUES ( :username , :province , :district , :gramasewa , :address , :areasize , :Expdate , :croptype , :selectCrop , :cropVariety , :otherdetails , :conditions)");
        $st->execute(array(           
            ':username' => $_POST['username'],
            ':province' => $_POST['province'],
            ':district' => $_POST['district'],
            ':gramasewa' => $_POST['gramasewa'],
            ':address' => $_POST['address'],
            ':areasize' => $_POST['areasize'],
            ':Expdate' => $_POST['Expdate'],
            ':croptype' => $_POST['croptype'],
            ':selectCrop' => $_POST['selectCrop'],
            ':cropVariety' => $_POST['cropVariety'],
            ':otherdetails' => $_POST['otherdetails'],
            ':conditions' => $_POST['conditions'],

        ));
    }

   



        
    
    
}