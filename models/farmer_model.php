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

    public function ajxGetCultivatedCropTypes() {
        $gs_id = Session::get('gs_id');
        // Get officer id
        $sql = "SELECT user_id from user WHERE gs_id = $gs_id AND role = 'officer'";
        $st1 = $this->db->prepare($sql);
        $st1->execute();
        $officer_user_id = $st1->fetchColumn();
        $farmer_id = Session::get('user_id');
        $st = $this->db->prepare("SELECT harvest.*, crop.* FROM harvest 
        JOIN crop ON crop.crop_id = harvest.crop_id
        WHERE harvest.farmer_user_id = $farmer_id AND harvest.officer_user_id = $officer_user_id GROUP BY crop.crop_type");
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxGetCropVart($vart) {
        $st = $this->db->prepare("SELECT * FROM crop WHERE crop_id = :vart");
        $st->execute(['vart' => $vart]);
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxGetHarvPerLand($vart) {
        $st = $this->db->prepare("SELECT * FROM crop WHERE crop_id = :vart");
        $st->execute(['vart' => $vart]);
        return $st->fetchAll(PDO::FETCH_ASSOC);
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

    public function ajxGetCenters() {
        $sql = "SELECT * FROM `collecting_center`";
        $st = $this->db->prepare($sql);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insertCropReq($data) {
        $gs_id = Session::get('gs_id');
        // Get officer id
        $sql = "SELECT user_id from user WHERE gs_id = $gs_id AND role = 'officer'";
        $st = $this->db->prepare($sql);
        $st->execute();
        $data['officer_user_id'] = $st->fetchColumn();

        $sql2 = "INSERT INTO `harvest`(`starting_month_id`, `harvesting_month_id`, `expected_harvest`, `is_accept`, `gs_id`, `crop_id`, `center_id`, `farmer_user_id`, `officer_user_id`) 
        VALUES (:starting_month, :harvesting_month, :expected_harvest, :is_accept, :gs_id, :crop_id, :center_id, :farmer_user_id, :officer_user_id)";

        // print_r($data);
        $st2 = $this->db->prepare($sql2);
        $st2->execute(array(
            ':starting_month' => $data['starting_month'],
            ':harvesting_month' => $data['harvesting_month'],
            ':expected_harvest' => $data['expected_harvest'],
            ':is_accept' => $data['is_accept'],
            ':gs_id' => $data['gs_id'],
            ':crop_id' => $data['crop_id'],
            ':center_id' => $data['center_id'],
            ':farmer_user_id' => $data['farmer_user_id'],
            ':officer_user_id' => $data['officer_user_id']
        ));
        // echo '<hr>';
        // print_r($st2);
    }

    public function ajxSortCropReqs($filter, $ascOrDsc) {
        $farmer_id = Session::get('user_id');
        if ($ascOrDsc == 'ASC') {
            $sql = "        SELECT harvest.*, crop.crop_type, crop.crop_varient, collecting_center.center_name, gramasewa_division.gs_name, harvest_month.month_name AS harvest_month, start_month.month_name AS start_month FROM `harvest` 
            JOIN crop On harvest.crop_id = crop.crop_id 
            JOIN collecting_center ON harvest.center_id = collecting_center.center_id
            JOIN gramasewa_division ON harvest.gs_id = gramasewa_division.gs_id
            JOIN month as start_month ON start_month.month_id = harvest.starting_month_id
            JOIN month as harvest_month ON harvest_month.month_id = harvest.harvesting_month_id
            WHERE harvest.farmer_user_id = $farmer_id ORDER BY harvest.$filter  ASC";
        } else if ($ascOrDsc == 'DESC') {
            $sql = "        SELECT harvest.*, crop.crop_type, crop.crop_varient, collecting_center.center_name, gramasewa_division.gs_name, harvest_month.month_name AS harvest_month, start_month.month_name AS start_month FROM `harvest` 
            JOIN crop On harvest.crop_id = crop.crop_id 
            JOIN collecting_center ON harvest.center_id = collecting_center.center_id
            JOIN gramasewa_division ON harvest.gs_id = gramasewa_division.gs_id
            JOIN month as start_month ON start_month.month_id = harvest.starting_month_id
            JOIN month as harvest_month ON harvest_month.month_id = harvest.harvesting_month_id
            WHERE harvest.farmer_user_id = $farmer_id ORDER BY harvest.$filter  DESC";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxFilterCropReq($filter) {
        $farmer_id = Session::get('user_id');
        if ($filter == 'accepted') {
            $sql = "SELECT harvest.*, crop.crop_type, crop.crop_varient, collecting_center.center_name, gramasewa_division.gs_name, harvest_month.month_name AS harvest_month, start_month.month_name AS start_month FROM `harvest` 
            JOIN crop On harvest.crop_id = crop.crop_id 
            JOIN collecting_center ON harvest.center_id = collecting_center.center_id
            JOIN gramasewa_division ON harvest.gs_id = gramasewa_division.gs_id
            JOIN month as start_month ON start_month.month_id = harvest.starting_month_id
            JOIN month as harvest_month ON harvest_month.month_id = harvest.harvesting_month_id WHERE is_accept = 1 AND farmer_user_id = $farmer_id";
        } else if ($filter == 'rejected') {
            $sql = "SELECT harvest.*, crop.crop_type, crop.crop_varient, collecting_center.center_name, gramasewa_division.gs_name, harvest_month.month_name AS harvest_month, start_month.month_name AS start_month FROM `harvest` 
            JOIN crop On harvest.crop_id = crop.crop_id 
            JOIN collecting_center ON harvest.center_id = collecting_center.center_id
            JOIN gramasewa_division ON harvest.gs_id = gramasewa_division.gs_id
            JOIN month as start_month ON start_month.month_id = harvest.starting_month_id
            JOIN month as harvest_month ON harvest_month.month_id = harvest.harvesting_month_id WHERE is_accept = 0 AND farmer_user_id = $farmer_id";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }


    public function deleteCropReq($harvest_id) {
        $st = $this->db->prepare("DELETE FROM `harvest` WHERE harvest_id = $harvest_id ");
        $st->execute();

        if ($st) {
            header('location: ' . URL . 'farmer/cropReqMng');
        }
    }

    public function getCropReq($harvest_id) {
        $st = $this->db->prepare("SELECT harvest.*, crop.*, collecting_center.* FROM harvest
            JOIN crop ON crop.crop_id = harvest.crop_id
            JOIN collecting_center ON collecting_center.center_id = harvest.center_id
            WHERE harvest.harvest_id = $harvest_id");
        $st->execute();
        return $st->fetch(PDO::FETCH_ASSOC);
    }

    public function damageClaimList($farmer_id) {
        $gs_id = Session::get('gs_id');
        // Get officer id
        $sql = "SELECT user_id from user WHERE gs_id = $gs_id AND role = 'officer'";
        $st = $this->db->prepare($sql);
        $st->execute();
        $officer_user_id = $st->fetchColumn();

        $st2 = $this->db->prepare("SELECT crop_damage.*, crop.crop_type, gramasewa_division.gs_name FROM `crop_damage`
        JOIN harvest ON harvest.harvest_id = crop_damage.harvest_id
        JOIN crop ON crop.crop_id = harvest.crop_id
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
        WHERE crop_damage.farmer_user_id = $farmer_id AND crop_damage.officer_user_id = $officer_user_id");
        $st2->execute();
        return $st2->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLocDataByGs($harvest_id) {
        $sql = "SELECT 
            harvest.harvest_id, 
            gramasewa_division.*,
            divisional_secratariast.ds_id,
            divisional_secratariast.ds_name AS div_sec_name,
            district.district_id,
            district.ds_name AS district_name,
            province.*
            FROM harvest 
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
            JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id
            JOIN district ON district.district_id = divisional_secratariast.district_id
            JOIN province ON province.province_id = district.province_id
            WHERE harvest.harvest_id = $harvest_id";
        $st = $this->db->prepare($sql);
        $st->execute();
        return $st->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCropReq($data) {
        // $gs_id = Session::get('gs_id');
        // Get officer id
        // $st1 = $this->db->prepare("SELECT user_id from user WHERE gs_id = $gs_id AND role = 'officer'");
        // $st1->execute();
        // $data['officer_user_id'] = $st1->fetchColumn();

        $sql = "UPDATE `harvest` SET `starting_month_id`=:starting_month_id,`harvesting_month_id`=:harvesting_month_id,`expected_harvest`=:expected_harvest,`gs_id`=:gs_id,`crop_id`=:crop_id,`center_id`=:center_id
        WHERE harvest_id = :harvest_id";

        $st2 = $this->db->prepare($sql);
        $res = $st2->execute(array(
            ':harvest_id' => $data['harvest_id'],
            ':starting_month_id' => $data['starting_month'],
            ':harvesting_month_id' => $data['harvesting_month'],
            ':expected_harvest' => $data['expected_harvest'],
            // ':is_accept' => $data['harvest_id'],
            ':gs_id' => $data['gs_id'],
            ':crop_id' => $data['crop_id'],
            ':center_id' => $data['center_id'],
            // ':farmer_user_id' => $data['farmer_user_id'],
            // ':officer_user_id' => $data['officer_user_id'],
        ));
        print_r($data);

        if ($res) {
            echo 'good';
        } else {
            echo 'bad';
        }
    }

    public function getAllLocations() {
        $data['allProvinces'] = $this->getProvinces();
        $data['allDistricts'] = $this->getAllDistricts();
        $data['allDivSecs'] = $this->getAllDivSecs();
        $data['allGramaSewas'] = $this->getAllGramaSewas();

        return $data;
    }

    public function getAllGramaSewas() {
        $st = $this->db->prepare("SELECT gs_id, gs_name FROM gramasewa_division");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllDivSecs() {
        $st = $this->db->prepare("SELECT ds_id, ds_name FROM divisional_secratariast");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllDistricts() {
        $st = $this->db->prepare("SELECT district_id, ds_name FROM district");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProvinces() {
        $st = $this->db->prepare("SELECT province_id, province_name FROM province");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function locDataForDmg($harvest_id) {
        $st = $this->db->prepare("SELECT 
        harvest.*, 
        gramasewa_division.*,
        divisional_secratariast.ds_id AS div_sec_id, divisional_secratariast.ds_name AS div_sec_name,
        district.district_id, district.ds_name AS district_name,
        province.*,
        crop.*
        FROM `harvest`
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
            JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id
            JOIN district ON district.district_id = divisional_secratariast.district_id
            JOIN province ON province.province_id = district.province_id
           	JOIN crop ON crop.crop_id = harvest.crop_id
           
           WHERE harvest.harvest_id = $harvest_id");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertDmg($data) {
        $gs_id = Session::get('gs_id');
        // Get officer id
        $sql1 = "SELECT user_id from user WHERE gs_id = $gs_id AND role = 'officer'";
        $st = $this->db->prepare($sql1);
        $st->execute();
        $data['officer_user_id'] = $st->fetchColumn();
        $data['farmer_user_id'] = Session::get('user_id');

        echo '<hr>';
        print_r($data);

        $sql = "INSERT INTO `crop_damage`( `damage_reason`, `is_accepted`, `damage_area`, `damage_date`, `farmer_user_id`, `officer_user_id`, `harvest_id`) VALUES (:reason, :is_accepted, :damage_area, :damage_date, :farmer_user_id, :officer_user_id, :harvest_id)";
        $st2 = $this->db->prepare($sql);
        $res = $st2->execute(array(
            ':reason' => $data['reason'],
            ':is_accepted' => $data['is_accepted'],
            ':damage_area' => $data['damage_area'],
            ':damage_date' => $data['damage_date'],
            ':farmer_user_id' => $data['farmer_user_id'],
            ':officer_user_id' => $data['officer_user_id'],
            ':harvest_id' => $data['harvest_id'],
        ));

        if ($res) {
            header('location: ' . URL . 'farmer/damageMng');
        }
    }

    public function deleteDmgClaim($dmg_id) {
        $st = $this->db->prepare("DELETE FROM `crop_damage` WHERE damage_id = $dmg_id");
        $res = $st->execute();
        if ($res) {
            header('location: ' . URL . 'farmer/damageMng');
        }
    }

    public function editDmgData($dmg_id) {
        $sql = "SELECT 
        crop_damage.*,
        harvest.*, 
        gramasewa_division.*,
        divisional_secratariast.ds_id AS div_sec_id, divisional_secratariast.ds_name AS div_sec_name,
        district.district_id, district.ds_name AS district_name,
        province.*,
        crop.*
        FROM crop_damage 
        	JOIN harvest ON harvest.harvest_id = crop_damage.harvest_id
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
            JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id
            JOIN district ON district.district_id = divisional_secratariast.district_id
            JOIN province ON province.province_id = district.province_id
           	JOIN crop ON crop.crop_id = harvest.crop_id
            WHERE crop_damage.damage_id = $dmg_id";
        $st = $this->db->prepare($sql);
        $res = $st->execute();
        if ($res) {
            // echo 'good';
        }
        return $st->fetch(PDO::FETCH_ASSOC);
    }

    public function updateDmg($data) {
        echo '<hr>';

        $gs_id = Session::get('gs_id');
        // Get officer id
        $sql1 = "SELECT user_id from user WHERE gs_id = $gs_id AND role = 'officer'";
        $st = $this->db->prepare($sql1);
        $st->execute();
        $data['officer_user_id'] = $st->fetchColumn();
        $data['farmer_user_id'] = Session::get('user_id');


        $sql = "UPDATE `crop_damage` SET `damage_reason`=:damage_reason, `damage_area`=:damage_area,`damage_date`=:damage_date WHERE `damage_id` = :damage_id ";
        $st2 = $this->db->prepare($sql);
        $res = $st2->execute(array(
            ':damage_reason' => $data['reason'],
            ':damage_area' => $data['damage_area'],
            ':damage_date' => $data['damage_date'],
            ':damage_id' => $data['damage_id'],
        ));

        if ($res) {
            header('location: ' . URL . 'farmer/damageMng');
        }

        // print_r($data);
    }

    public function ajxFilterDmg($filter) {
        $gs_id = Session::get('gs_id');
        // Get officer id
        $sql = "SELECT user_id from user WHERE gs_id = $gs_id AND role = 'officer'";
        $st = $this->db->prepare($sql);
        $st->execute();
        $officer_user_id = $st->fetchColumn();

        $farmer_id = Session::get('user_id');
        if ($filter == 'accepted') {
            $sql = "SELECT crop_damage.*, crop.crop_type, gramasewa_division.gs_name FROM `crop_damage`
            JOIN harvest ON harvest.harvest_id = crop_damage.harvest_id
            JOIN crop ON crop.crop_id = harvest.crop_id
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
            WHERE crop_damage.farmer_user_id = $farmer_id AND crop_damage.officer_user_id = $officer_user_id AND crop_damage.is_accepted = 1 ";
        } else if ($filter == 'rejected') {
            $sql = "SELECT crop_damage.*, crop.crop_type, gramasewa_division.gs_name FROM `crop_damage`
            JOIN harvest ON harvest.harvest_id = crop_damage.harvest_id
            JOIN crop ON crop.crop_id = harvest.crop_id
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
            WHERE crop_damage.farmer_user_id = $farmer_id AND crop_damage.officer_user_id = $officer_user_id  AND crop_damage.is_accepted = 0 ";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxSortDmg($filter, $ascOrDsc) {
        $gs_id = Session::get('gs_id');
        // Get officer id
        $sql = "SELECT user_id from user WHERE gs_id = $gs_id AND role = 'officer'";
        $st = $this->db->prepare($sql);
        $st->execute();
        $officer_user_id = $st->fetchColumn();

        $farmer_id = Session::get('user_id');
        if ($ascOrDsc == 'ASC') {
            $sql = "SELECT crop_damage.*, crop.crop_type, gramasewa_division.gs_name FROM `crop_damage`
            JOIN harvest ON harvest.harvest_id = crop_damage.harvest_id
            JOIN crop ON crop.crop_id = harvest.crop_id
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
            WHERE crop_damage.farmer_user_id = $farmer_id AND crop_damage.officer_user_id = $officer_user_id ORDER BY crop_damage.$filter  ASC";
        } else if ($ascOrDsc == 'DESC') {
            $sql = "SELECT crop_damage.*, crop.crop_type, gramasewa_division.gs_name FROM `crop_damage`
            JOIN harvest ON harvest.harvest_id = crop_damage.harvest_id
            JOIN crop ON crop.crop_id = harvest.crop_id
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
            WHERE crop_damage.farmer_user_id = $farmer_id AND crop_damage.officer_user_id = $officer_user_id ORDER BY crop_damage.$filter  DESC";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listSellCrops($farmer_id) {

        $sql = "SELECT 
        selling_request.*,
        harvest.*,
        crop.crop_type, crop.crop_varient,
        gramasewa_division.gs_name,
        district.ds_name AS district_name 
        FROM selling_request
        JOIN harvest ON harvest.harvest_id = selling_request.harvest_id
        JOIN crop ON crop.crop_id = harvest.crop_id
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
        JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id
        JOIN district ON district.district_id = divisional_secratariast.district_id
        WHERE selling_request.farmer_user_id = $farmer_id AND harvest.is_accept = 1";
        $st = $this->db->prepare($sql);
        $res = $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function dataForSellCrop($harvest_id) {
        $sql = "SELECT
        harvest.*,
        crop.crop_type, crop.crop_varient,
        gramasewa_division.gs_name, 
        district.ds_name AS district_name
        FROM harvest 
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
        JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id
        JOIN district ON district.district_id = divisional_secratariast.ds_id
        JOIN crop ON crop.crop_id = harvest.crop_id
        WHERE harvest_id = $harvest_id AND harvest.is_accept = 1";
        $st = $this->db->prepare($sql);
        $res = $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertSellCrop($data) {
        $sql = "INSERT INTO `selling_request`(`date`, `valid_time_period`, `harvest_amount`, `max_offer`, `min_offer`, `farmer_user_id`, `harvest_id`) VALUES (:date, :valid_time_period, :harvest_amount, :max_offer, :min_offer, :farmer_user_id, :harvest_id)";
        $st = $this->db->prepare($sql);
        $res = $st->execute(array(
            ':date' => $data['date'],
            ':valid_time_period' => $data['valid_time_period'],
            ':harvest_amount' => $data['harvest_amount'],
            ':max_offer' => $data['max_offer'],
            ':min_offer' => $data['min_offer'],
            ':farmer_user_id' => Session::get('user_id'),
            ':harvest_id' => $data['harvest_id'],
        ));
        if ($res) {
            header('location: ' . URL . 'farmer/sellCropMng');
        }
    }

    public function deleteSellCrop($selling_req_id) {
        $sql = "DELETE FROM `selling_request` WHERE selling_req_id = $selling_req_id";
        $st = $this->db->prepare($sql);
        $res = $st->execute();
        if ($res) {
            header('location: ' . URL . 'farmer/sellCropMng');
        }
    }

    ##################################### END OF FARMER MODEL ##############################################################################
}
