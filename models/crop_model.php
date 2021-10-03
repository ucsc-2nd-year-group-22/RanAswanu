<?php

class Crop_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //register new collecting center into the  database col. center table
    public function create($data)
    {
        $st = $this->db->prepare("INSERT INTO crop (`harvest_per_land`, `harvest_period`, `crop_type`, `crop_varient`, `admin_user_id`, `description`) VALUES (:harvest_per_land, :harvest_period, :crop_type, :crop_varient, :admin_user_id, :description)");
        $st->execute(array(
            ':crop_type' => $data['crop_type'],
            ':crop_varient' => $data['crop_varient'],
            ':harvest_per_land' => $data['harvest_per_land'],
            ':harvest_period' => $data['harvest_period'],
            ':admin_user_id' => $data['admin_user_id'],
            ':description' => $data['description']
        ));

        $this->getLastCropId($data['best_area']);
    }
    //adding district as best area
    public function getLastCropId($district_id)
    {
        $st = $this->db->prepare("SELECT crop_id FROM crop ORDER BY crop_id DESC LIMIT 1");
        $st->execute();
        $result = $st->fetch();
        $this->updateBestCropArea($result['crop_id'], $district_id);
    }
    //update best area
    public function updateBestCropArea($crop_id, $district_id)
    {
        $st = $this->db->prepare("INSERT INTO best_area (`crop_id`, `district_id`) VALUES (:crop_id, :district_id)");
        $st->execute(array(
            ':crop_id' => $crop_id,
            ':district_id' => $district_id
        ));
    }

    //getting single col. center
    public function singleCropList($crop_id)
    {
        $st = $this->db->prepare("SELECT crop.crop_id, crop.crop_type, crop.crop_varient, crop.harvest_per_land, crop.harvest_period, crop.description, district.ds_name, district.district_id FROM
        ((crop INNER JOIN best_area ON crop.crop_id = best_area.crop_id) INNER JOIN district ON district.district_id = best_area.district_id) WHERE crop.crop_id = :crop_id");
        $st->execute(array(
            ':crop_id' => $crop_id,
        ));
        return $st->fetch();
    }

    //retrieve all crops
    public function crops()
    {
        $crops = $this->db->prepare("SELECT crop.crop_id, crop.crop_type, crop.crop_varient, crop.harvest_per_land, crop.harvest_period, district.ds_name FROM
        ((crop INNER JOIN best_area ON crop.crop_id = best_area.crop_id) INNER JOIN district ON district.district_id = best_area.district_id) WHERE crop.isActive = 1");
        $crops->execute();

        return $crops->fetchAll();
    }


    //update crop
    public function update($data)
    {
        $st = $this->db->prepare('UPDATE crop SET `crop_type` = :crop_type, `crop_varient` = :crop_varient, `harvest_per_land` = :harvest_per_land, `harvest_period` = :harvest_period, `description` = :description, admin_user_id = :admin_user_id WHERE crop_id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':crop_type' => $data['crop_type'],
            ':crop_varient' => $data['crop_varient'],
            ':harvest_per_land' => $data['harvest_per_land'],
            ':harvest_period' => $data['harvest_period'],
            ':admin_user_id' => $data['admin_user_id'],
            ':description' => $data['description']
        ));

        $bestArea = $this->db->prepare('UPDATE best_area SET `district_id` = :district_id WHERE crop_id = :id');
        $bestArea->execute(array(
            ':id' => $data['id'],
            ':district_id' => $data['best_area']
        ));
    }


    //get crop varients
    public function cropVarients($id)
    {
        $st = $this->db->prepare("SELECT * FROM crop_varient WHERE crop_id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetchAll();
    }

    //delete a crop
    // public function delete($id)
    // {
    //     $st = $this->db->prepare('DELETE FROM crop WHERE crop_id = :id');
    //     $st->execute(array(
    //         ':id' => $id
    //     ));
    // }
    //delete a crop
    public function delete($id)
    {
        $st = $this->db->prepare('UPDATE crop SET isActive = 0 WHERE crop_id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //delete crop varient
    public function deleteVarient($id)
    {
        $st = $this->db->prepare('DELETE FROM crop_varient WHERE id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //create varients
    public function addVarient($data)
    {
        $st = $this->db->prepare("INSERT INTO crop_varient (`varient_name`, `crop_id`) VALUES (:crop_name, :id)");
        $st->execute(array(
            ':id' => $data['id'],
            ':crop_name' => $data['crop_name'],
        ));
    }

    //retrieve all districts
    public function getAllDistricts()
    {
        $st = $this->db->prepare("SELECT district_id, ds_name FROM district");
        $st->execute();
        return $st->fetchAll();
    }

    //Search crops by crop type
    public function ajxSearchCropType($cropType)
    {
        $escaped_name = addcslashes($cropType, '%');
        $sql = "SELECT crop.crop_id, crop.crop_type, crop.crop_varient, crop.harvest_per_land, crop.harvest_period, district.ds_name FROM
        ((crop INNER JOIN best_area ON crop.crop_id = best_area.crop_id) INNER JOIN district ON district.district_id = best_area.district_id) WHERE crop.crop_type LIKE :cropType AND crop.isActive = 1";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':cropType' => "$cropType%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //Search crops by crop varient
    public function ajxSearchCropVar($cropVar)
    {
        $escaped_name = addcslashes($cropVar, '%');
        $sql = "SELECT crop.crop_id, crop.crop_type, crop.crop_varient, crop.harvest_per_land, crop.harvest_period, district.ds_name FROM
        ((crop INNER JOIN best_area ON crop.crop_id = best_area.crop_id) INNER JOIN district ON district.district_id = best_area.district_id) WHERE crop.crop_varient LIKE :cropVar AND crop.isActive = 1";
        $st = $this->db->prepare($sql);
        // print_r($sql);
        $st->execute(array(
            ':cropVar' => "$cropVar%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //Sort crops
    public function ajxFilterCrop($filter, $ascOrDsc)
    {
        //    echo $ascOrDsc;

        if ($ascOrDsc == 'ASC') {
            $sql = "SELECT crop.crop_id, crop.crop_type, crop.crop_varient, crop.harvest_per_land, crop.harvest_period, district.ds_name FROM
            ((crop INNER JOIN best_area ON crop.crop_id = best_area.crop_id) INNER JOIN district ON district.district_id = best_area.district_id) WHERE crop.isActive = 1 ORDER BY $filter ASC";
        } else if ($ascOrDsc == 'DESC') {
            $sql = "SELECT crop.crop_id, crop.crop_type, crop.crop_varient, crop.harvest_per_land, crop.harvest_period, district.ds_name FROM
            ((crop INNER JOIN best_area ON crop.crop_id = best_area.crop_id) INNER JOIN district ON district.district_id = best_area.district_id) WHERE crop.isActive = 1 ORDER BY $filter DESC";
        }


        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}
