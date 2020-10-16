<?php 

class Crop_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    //register new collecting center into the  database col. center table
    public function create($data){  
        $st = $this->db->prepare("INSERT INTO crops (`crop_varient`, `crop_type`, `best_area`, `harvest_per_land`, `harvest_period`, `discription`) VALUES (:crop_varient, :crop_type, :best_area, :harvest_per_land, :harvest_period, :discription)");
        $st->execute(array(
            ':crop_varient' => $data['crop_varient'],
            ':crop_type' => $data['crop_type'],
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
        $st = $this->db->prepare('UPDATE crops SET `crop_varient` = :crop_varient, `crop_type` = :crop_type, `best_area` = :best_area, `harvest_per_land` = :harvest_per_land, `harvest_period` = :harvest_period, `discription` = :discription WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':crop_varient' => $data['crop_varient'],
            ':crop_type' => $data['crop_type'],
            ':best_area' => $data['best_area'],
            ':harvest_per_land' => $data['harvest_per_land'],
            ':harvest_period' => $data['harvest_period'],
            ':discription' => $data['discription'],
        ));
    }

    //delete a col. center
    public function delete($id){
        $st = $this->db->prepare('DELETE FROM colcenter WHERE id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }
} 