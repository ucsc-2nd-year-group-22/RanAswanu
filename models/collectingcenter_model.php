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
        $st = $this->db->prepare("SELECT center_id, center_name, district_id FROM colcenter WHERE center_id = :id");
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
        $st = $this->db->prepare('UPDATE colcenter SET `center_name` = :center_name, `province` = :province, `district` = :district, `grama` = :grama WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':center_name' => $data['center_name'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':grama' => $data['grama']
        ));
    }

    //delete a col. center
    public function delete($id)
    {
        $st = $this->db->prepare('DELETE FROM colcenter WHERE id = :id');
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
}
