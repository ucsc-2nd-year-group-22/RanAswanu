<?php

class CollectingCenter_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //register new collecting center into the  database col. center table
    public function create($data)
    {
        // print_r($data);
        $st = $this->db->prepare("INSERT INTO `collecting_center` (`center_name`, `district_id`) VALUES (:center_name, :district_id)");
        $st->execute(array(
            ':center_name' => $data['center_name'],
            ':district_id' => $data['district_id']
        ));
    }

    //getting single col. center
    public function singleCenterList($id)
    {
        $st = $this->db->prepare("SELECT center_id, center_name, district_id FROM collecting_center WHERE center_id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }

    //retrieve all col centers
    public function centers()
    {
        $st = $this->db->prepare("SELECT collecting_center.center_id, collecting_center.center_name, district.ds_name FROM collecting_center INNER JOIN district ON collecting_center.district_id = district.district_id");
        $st->execute();
        return $st->fetchAll();
    }

    //update col. center
    public function update($data)
    {
        $st = $this->db->prepare('UPDATE collecting_center SET `center_name` = :center_name, `district_id` = :district WHERE center_id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':center_name' => $data['center_name'],
            ':district' => $data['district']
        ));
    }

    //delete a col. center
    public function delete($id)
    {
        $st = $this->db->prepare('DELETE FROM collecting_center WHERE center_id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //retrieve province list
    public function getProvinces()
    {
        $st = $this->db->prepare("SELECT province_id, province_name FROM province");
        $st->execute();
        return $st->fetchAll();
    }

    //retrieve district list
    public function getDistricts($id)
    {
        $st = $this->db->prepare("SELECT district_id, ds_name FROM district WHERE province_id = :id");
        $st->execute(array(
            ':id' => $id
        ));
        return $st->fetchAll();
    }

    //retrieve all districts
    public function getAllDistricts() {
        $st = $this->db->prepare("SELECT district_id, ds_name FROM district");
        $st->execute();
        return $st->fetchAll();
    }

    //Search centers by center name
    public function ajxSearchCentName($centName)
    {
        $escaped_name = addcslashes($centName, '%');
        $sql = "SELECT collecting_center.center_id, collecting_center.center_name, district.ds_name FROM collecting_center INNER JOIN district ON collecting_center.district_id = district.district_id WHERE collecting_center.center_name LIKE :centName";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':centName' => "$centName%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
    //Search centers by district name
    public function ajxSearchDisName($disName)
    {
        $escaped_name = addcslashes($disName, '%');
        $sql = "SELECT collecting_center.center_id, collecting_center.center_name, district.ds_name FROM collecting_center INNER JOIN district ON collecting_center.district_id = district.district_id WHERE district.ds_name LIKE :disName";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':disName' => "$disName%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //Sort centers
    public function ajxFilterCenter($filter, $ascOrDsc)
    {
        //    echo $ascOrDsc;

        if ($ascOrDsc == 'ASC') {
            $sql = "SELECT collecting_center.center_id, collecting_center.center_name, district.ds_name FROM collecting_center INNER JOIN district ON collecting_center.district_id = district.district_id ORDER BY $filter ASC";
        } else if ($ascOrDsc == 'DESC') {
            $sql = "SELECT collecting_center.center_id, collecting_center.center_name, district.ds_name FROM collecting_center INNER JOIN district ON collecting_center.district_id = district.district_id ORDER BY $filter DESC";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}
