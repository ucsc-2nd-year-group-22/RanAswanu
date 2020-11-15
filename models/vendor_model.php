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
        $st = $this->db->prepare("SELECT  aId, cropsid, selectCrop, weight, exprice, district FROM sellcrops ");
        $st->execute();
        return $st->fetchAll();
    }

    public function setOffer($data)
    {
        $st = $this->db->prepare("INSERT INTO request (`adid`, `vid`, `amount`) VALUES (:adid, :vid, :amount)");
        $st->execute(array(
            ':adid' => $data['aId'],
            ':vid' => $data['Vid'],
            ':amount' => $data['Ammount']
        ));
    }

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

} 