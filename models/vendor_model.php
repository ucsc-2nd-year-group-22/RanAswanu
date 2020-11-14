<?php 

class Vendor_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    //retrieve all vendors
    public function vendorList() {
        $st = $this->db->prepare("SELECT id, firstname, address, tel FROM users WHERE role = :role");
        $st->execute(array(
            ':role' => 'vendor'
        ));
        return $st->fetchAll();
    }

    //delete a vendor
    public function delete($id){
        $st = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //Thishan's functions
    //show details of farmers
    public function farmerDetail($id){
        
        $st = $this->db->prepare("SELECT   firstname, id, sex, email, address, tel FROM users WHERE id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }

    public function cropDetails()
    {
        $st = $this->db->prepare("SELECT  adid, crop, fid, weight, price, date, district FROM crops ");
         $st->execute();
        return $st->fetchAll();
    }

    public function setOffer($data)
    {
        $st = $this->db->prepare("INSERT INTO request (`adid`, `vid`, `amount`) VALUES (:adid, :vid, :amount)");
        $st->execute(array(
            ':adid' => $data['Adid'],
            ':vid' => $data['Vid'],
            ':amount' => $data['Ammount']
        ));
    }

    public function getReqid($data)
    {
        $st = $this->db->prepare("SELECT  reqid FROM request WHERE Adid = :adid && Vid = :vid");
        $st->execute(array(
            ':adid' => $data['Adid'],
            ':vid' => $data['Vid'],
        ));
        return $st->fetchAll();
    }

    public function updateOffer($data)
    {
     $st = $this->db->prepare('UPDATE request SET `amount` = :amount WHERE Adid = :adid && Vid = :vid');
            $st->execute(array(
                ':adid' => $data['Adid'],
                ':vid' => $data['Vid'],
                ':amount' => $data['Ammount'],
            ));
    }



    /*public function update($data){
        $st = $this->db->prepare('UPDATE crops SET `crop_varient` = :crop_varient, `crop_type` = :crop_type, `best_area` = :best_area, `harvest_per_land` = :harvest_per_land, `harvest_period` = :harvest_period, `discription` = :discription WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':crop_varient' => $data['crop_varient'],
            ':crop_type' => $data['crop_type'],
            ':best_area' => $data['best_area'],
            ':harvest_per_land' => $data['harvest_per_land'],
            ':harvest_period' => $data['harvest_period'],
            ':discription' => $data['discription'],
        ));
    }*/




    public function vendorInfo($id){
        
        $st = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }
    

} 