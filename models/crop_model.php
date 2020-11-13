<?php 

class Crop_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    //register new collecting center into the  database col. center table
    public function create($data){  
        $st = $this->db->prepare("INSERT INTO crops (`crop_name`, `best_area`, `harvest_per_land`, `harvest_period`, `discription`) VALUES (:crop_name, :best_area, :harvest_per_land, :harvest_period, :discription)");
        $st->execute(array(
            ':crop_name' => $data['crop_name'],
            ':best_area' => $data['best_area'],
            ':harvest_per_land' => $data['harvest_per_land'],
            ':harvest_period' => $data['harvest_period'],
            ':discription' => $data['discription'],
        ));
    }

    //getting single col. center
    public function singleCropList($id){
        $st = $this->db->prepare("SELECT * FROM crops WHERE id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }
    
    //retrieve all col centers
    public function crops() {
        $st = $this->db->prepare("SELECT * FROM crops");
        $st->execute();
        return $st->fetchAll();
    }

    
    //update col. center
    public function update($data){
        $st = $this->db->prepare('UPDATE crops SET `crop_name` = :crop_name, `best_area` = :best_area, `harvest_per_land` = :harvest_per_land, `harvest_period` = :harvest_period, `discription` = :discription WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':crop_name' => $data['crop_name'],
            ':best_area' => $data['best_area'],
            ':harvest_per_land' => $data['harvest_per_land'],
            ':harvest_period' => $data['harvest_period'],
            ':discription' => $data['discription'],
        ));
    }

    //get crop varients
    public function cropVarients($id){
        $st = $this->db->prepare("SELECT * FROM crop_varient WHERE crop_id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetchAll();
    }

    //delete a crop
    public function delete($id){
        $st = $this->db->prepare('DELETE FROM crops WHERE id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //delete crop varient
    public function deleteVarient($id){
        $st = $this->db->prepare('DELETE FROM crop_varient WHERE id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //create varients
    public function addVarient($data){
        $st = $this->db->prepare("INSERT INTO crop_varient (`varient_name`, `crop_id`) VALUES (:crop_name, :id)");
        $st->execute(array(
            ':id' => $data['id'],
            ':crop_name' => $data['crop_name'],
        ));
    }
} 