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
        $st= execute(array(
            ':username' => $_POST['username'],
            ':dmgdate' => $_POST['province'],
            ':district' => $_POST['district'],
            ':gramasewa' => $_POST['gramasewa'],
            ':address' => $_POST['address'],
            ':estdmgarea' => $_POST['estdmgarea'],
            ':waydmg' => $_POST['waydmg'],
            ':details' => $_POST['details'],


        ));
    }
    
}