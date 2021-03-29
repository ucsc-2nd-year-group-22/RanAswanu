<?php

class Officer_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //retrieve all officers
    public function officerList() {
        $st = $this->db->prepare("SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' GROUP BY user.user_id");

        // SELECT user.user_name, user.first_name, group_concat(user_tel.tel_no) FROM user JOIN user_tel on user.user_id =user_tel.user_id GROUP BY user.user_id
        $st->execute(array(
            ':role' => 'officer'
        ));
        // print_r($st->fetchAll());

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //delete an officer
    public function delete($id) {
        $st = $this->db->prepare('DELETE FROM user WHERE user_id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //Search officer by name
    public function ajxSearchOfficerName($officerName) {
        $escaped_name = addcslashes($officerName, '%');
        $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' AND user.first_name LIKE :first_name OR user.last_name LIKE :first_name GROUP BY user.user_id";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':first_name' => "$officerName%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //Search officer by NIC
    public function ajxSearchOfficerNic($nic) {
        $escaped_name = addcslashes($nic, '%');
        $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' AND user.nic LIKE :nic  GROUP BY user.user_id";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':nic' => "$nic%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //Sort officers
    public function ajxFilterOfficer($filter, $ascOrDsc) {
        //    echo $ascOrDsc;

        if ($ascOrDsc == 'ASC') {
            $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' GROUP BY user.user_id ORDER BY $filter ASC";
        } else if ($ascOrDsc == 'DESC') {
            $sql = "SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'officer' GROUP BY user.user_id ORDER BY $filter DESC";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cropReqList() {
        $officer_id = Session::get('user_id');
        $sql = "SELECT 
        harvest.*, crop.crop_type, crop.crop_varient,
        user.user_id, user.first_name, user.last_name,
        gramasewa_division.gs_name,
        collecting_center.center_name,
        (SELECT gathered_harvest.harvest_amount FROM gathered_harvest WHERE gathered_harvest.crop_id = crop.crop_id AND gathered_harvest.month_id = harvest.harvesting_month_id AND gathered_harvest.center_id = harvest.center_id) AS gath_harvest,
        (SELECT demand_for_crop_center.demant_amount FROM demand_for_crop_center WHERE demand_for_crop_center.crop_id = harvest.crop_id AND demand_for_crop_center.month_id = harvest.harvesting_month_id AND demand_for_crop_center.center_id = harvest.center_id) AS demand
        FROM harvest 
        JOIN user ON user.user_id = harvest.farmer_user_id
        JOIN crop ON crop.crop_id = harvest.crop_id
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
        JOIN collecting_center ON collecting_center.center_id = harvest.center_id
        WHERE harvest.officer_user_id = $officer_id";
        $st2 = $this->db->prepare($sql);
        $st2->execute();
        return $st2->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxFilterCropReq($filter) {
        $officer_id = Session::get('user_id');
        if ($filter == 'accepted') {
            $sql = "SELECT 
            harvest.*, crop.crop_type, crop.crop_varient,
            user.user_id, user.first_name, user.last_name,
            gramasewa_division.gs_name,
            collecting_center.center_name
            FROM harvest 
            JOIN user ON user.user_id = harvest.farmer_user_id
            JOIN crop ON crop.crop_id = harvest.crop_id
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
            JOIN collecting_center ON collecting_center.center_id = harvest.center_id
            WHERE harvest.officer_user_id = $officer_id AND harvest.is_accept = 1";
        } else if ($filter == 'pending') {
            $sql = "SELECT 
            harvest.*, crop.crop_type, crop.crop_varient,
            user.user_id, user.first_name, user.last_name,
            gramasewa_division.gs_name,
            collecting_center.center_name
            FROM harvest 
            JOIN user ON user.user_id = harvest.farmer_user_id
            JOIN crop ON crop.crop_id = harvest.crop_id
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
            JOIN collecting_center ON collecting_center.center_id = harvest.center_id
            WHERE harvest.officer_user_id = $officer_id AND harvest.is_accept = 0";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxSortCropReqs($filter, $ascOrDsc) {
        $officer_id = Session::get('user_id');

        if ($ascOrDsc == 'ASC') {
            if ($filter == "first_name" || $filter == "last_name") {
                $sql = "SELECT 
                harvest.*, crop.crop_type, crop.crop_varient,
                user.user_id, user.first_name, user.last_name,
                gramasewa_division.gs_name,
                collecting_center.center_name
                FROM harvest 
                JOIN user ON user.user_id = harvest.farmer_user_id
                JOIN crop ON crop.crop_id = harvest.crop_id
                JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
                JOIN collecting_center ON collecting_center.center_id = harvest.center_id
                WHERE harvest.officer_user_id = $officer_id ORDER BY user.$filter ASC";
            } else {
                $sql = "SELECT 
                harvest.*, crop.crop_type, crop.crop_varient,
                user.user_id, user.first_name, user.last_name,
                gramasewa_division.gs_name,
                collecting_center.center_name
                FROM harvest 
                JOIN user ON user.user_id = harvest.farmer_user_id
                JOIN crop ON crop.crop_id = harvest.crop_id
                JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
                JOIN collecting_center ON collecting_center.center_id = harvest.center_id
                WHERE harvest.officer_user_id = $officer_id ORDER BY $filter ASC";
            }
        } else if ($ascOrDsc == 'DESC') {
            if ($filter == "first_name" || $filter == "last_name") {
                $sql = "SELECT 
                harvest.*, crop.crop_type, crop.crop_varient,
                user.user_id, user.first_name, user.last_name,
                gramasewa_division.gs_name,
                collecting_center.center_name
                FROM harvest 
                JOIN user ON user.user_id = harvest.farmer_user_id
                JOIN crop ON crop.crop_id = harvest.crop_id
                JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
                JOIN collecting_center ON collecting_center.center_id = harvest.center_id
                WHERE harvest.officer_user_id = $officer_id ORDER BY user.$filter  DESC";
            } else {
                $sql = "SELECT 
                harvest.*, crop.crop_type, crop.crop_varient,
                user.user_id, user.first_name, user.last_name,
                gramasewa_division.gs_name,
                collecting_center.center_name
                FROM harvest 
                JOIN user ON user.user_id = harvest.farmer_user_id
                JOIN crop ON crop.crop_id = harvest.crop_id
                JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
                JOIN collecting_center ON collecting_center.center_id = harvest.center_id
                WHERE harvest.officer_user_id = $officer_id ORDER BY $filter  DESC";
            }
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxSearchCropReq($farmerName) {
        $officer_id = Session::get('user_id');
        $escaped_name = addcslashes($farmerName, '%');
        $sql = "SELECT 
        harvest.*, crop.crop_type, crop.crop_varient,
        user.user_id, user.first_name, user.last_name,
        gramasewa_division.gs_name,
        collecting_center.center_name
        FROM harvest 
        JOIN user ON user.user_id = harvest.farmer_user_id
        JOIN crop ON crop.crop_id = harvest.crop_id
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id
        JOIN collecting_center ON collecting_center.center_id = harvest.center_id WHERE harvest.officer_user_id = $officer_id AND user.first_name LIKE :first_name OR user.last_name LIKE :first_name ";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':first_name' => "$farmerName%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function acceptCropReq($harvest_id) {
        $sql = "UPDATE `harvest` SET is_accept = 1 WHERE harvest_id = $harvest_id";
        $st = $this->db->prepare($sql);
        $res = $st->execute();
        if ($res) {
            header('location: ' . URL . 'officer/cropReq');
        }
    }

    public function deleteCropReq($harvest_id) {
        $sql = "DELETE FROM `harvest` WHERE harvest_id = $harvest_id";
        $st = $this->db->prepare($sql);
        $res = $st->execute();
        if ($res) {
            header('location: ' . URL . 'officer/cropReq');
        }
    }
}
