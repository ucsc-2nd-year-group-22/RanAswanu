<?php

class Farmer_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function ajxGetCropTypes($district) {
        $st = $this->db->prepare("SELECT * FROM crop JOIN best_area ON crop.crop_id = best_area.crop_id WHERE best_area.district_id = $district");
        $st->execute();
        // $st = $this->db->prepare("SELECT * FROM crop JOIN best_area ON 
        // crop.crop_id = best_area.crop_id WHERE best_area.district_id = (SELECT district.district_id FROM district WHERE district.ds_name = $dist)");
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxGetCropVart($vart) {
        $st = $this->db->prepare("SELECT * FROM crop WHERE crop_type = :vart");
        $st->execute(['vart' => $vart]);
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxGetHarvPerLand($vart) {
        $st = $this->db->prepare("SELECT * FROM crop WHERE crop_varient = :vart");
        $st->execute(['vart' => $vart]);
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProvinces() {
        $st = $this->db->prepare("SELECT province_id, province_name FROM province");
        $st->execute();
        return $st->fetchAll();
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

        if ($ascOrDsc == 'ASC') {
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

    public function ajxListCropReq($farmer_id) {
        $st = $this->db->prepare("
        SELECT harvest.*, crop.crop_type, crop.crop_varient, collecting_center.center_name, gramasewa_division.gs_name, harvest_month.month_name AS harvest_month, start_month.month_name AS start_month FROM `harvest` 
        JOIN crop On harvest.crop_id = crop.crop_id 
        JOIN collecting_center ON harvest.center_id = collecting_center.center_id
        JOIN gramasewa_division ON harvest.gs_id = gramasewa_division.gs_id
        JOIN month as start_month ON start_month.month_id = harvest.starting_month_id
        JOIN month as harvest_month ON harvest_month.month_id = harvest.harvesting_month_id
        WHERE harvest.farmer_user_id = :farmer
        ");
        $st->execute(array(
            ':farmer' => $farmer_id
        ));
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }




    ##################################### END OF FARMER MODEL ##############################################################################
}
