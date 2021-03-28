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
        $st = $this->db->prepare('UPDATE offer SET `offer_amount` = :amount WHERE offer_id = :reqid');
        $st->execute(array(
            ':reqid' => $data['reqid'],
            ':amount' => $data['amount'],
        ));
    }

    //delete sent offers
    public function undoOffer($data)
    {
        $st = $this->db->prepare('DELETE FROM offer WHERE offer_id = :id');
        $st->execute(array(
            ':id' => $data['offer_id']
        ));
    }

    //getting offers sent by vendor (logged in)
    public function myOffers($id)
    {
        $st = $this->db->prepare("SELECT offer.*, selling_request.*,collecting_center.center_name, crop.crop_type FROM selling_request
        JOIN offer ON selling_request.selling_req_id=offer.selling_req_id
        JOIN user ON selling_request.farmer_user_id = user.user_id
        JOIN harvest ON user.user_id = harvest.farmer_user_id
        JOIN crop ON harvest.crop_id = crop.crop_id
        JOIN collecting_center ON harvest.center_id = collecting_center.center_id where offer.vendor_user_id = :id");
        
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

    // public function ajxListCropReq($farmer_id) {
    //     $st = $this->db->prepare("
    //     SELECT harvest.*, crop.crop_type, crop.crop_varient, collecting_center.center_name, gramasewa_division.gs_name, harvest_month.month_name AS harvest_month, start_month.month_name AS start_month FROM `harvest` 
    //     JOIN crop On harvest.crop_id = crop.crop_id 
    //     JOIN collecting_center ON harvest.center_id = collecting_center.center_id
    //     JOIN gramasewa_division ON harvest.gs_id = gramasewa_division.gs_id
    //     JOIN month as start_month ON start_month.month_id = harvest.starting_month_id
    //     JOIN month as harvest_month ON harvest_month.month_id = harvest.harvesting_month_id
    //     WHERE harvest.farmer_user_id = :farmer
    //     ");
    //     $st->execute(array(
    //         ':farmer' => $farmer_id
    //     ));
    //     return $st->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function AllCrops() {
        $st = $this->db->prepare("
        SELECT crop.crop_type, selling_request.*, divisional_secratariast.ds_name FROM selling_request 
JOIN harvest ON selling_request.harvest_id=harvest.harvest_id
JOIN crop ON harvest.crop_id=crop.crop_id
JOIN gramasewa_division ON harvest.gs_id=gramasewa_division.gs_id
JOIN divisional_secratariast ON gramasewa_division.ds_id = divisional_secratariast.ds_id
        ");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}
