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

    //Search vendor by name
    public function ajxSearchVendorName($vendorName)
    {
        $escaped_name = addcslashes($vendorName, '%');
        $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'vendor' AND (user.first_name LIKE :first_name OR user.last_name LIKE :first_name) GROUP BY user.user_id";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':first_name' => "$vendorName%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //Search vendor by NIC
    public function ajxSearchVendorNic($nic)
    {
        $escaped_name = addcslashes($nic, '%');
        $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'vendor' AND user.nic LIKE :nic  GROUP BY user.user_id";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':nic' => "$nic%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //Sort vendors
    public function ajxFilterVendor($filter, $ascOrDsc)
    {
        //    echo $ascOrDsc;

        if ($ascOrDsc == 'ASC') {
            $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'vendor' GROUP BY user.user_id ORDER BY $filter ASC";
        } else if ($ascOrDsc == 'DESC') {
            $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'vendor' GROUP BY user.user_id ORDER BY $filter DESC";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}
