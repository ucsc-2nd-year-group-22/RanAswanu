<?php 

class CollectingCenter_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    //register new collecting center into the  database col. center table
    public function create($data){  
        $st = $this->db->prepare("INSERT INTO colcenter (`center_name`, `province`, `district`, `grama`) VALUES (:center_name, :province, :district, :grama)");
        $st->execute(array(
            ':center_name' => $data['center_name'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':grama' => $data['grama']
        ));
    }

    //getting single col. center
    public function singleCenterList($id){
        $st = $this->db->prepare("SELECT id, center_name, province, district, grama FROM colcenter WHERE id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }
    //update col. center
    public function update($data){
        $st = $this->db->prepare('UPDATE colcenter SET `center_name` = :center_name, `province` = :province, `district` = :district, `grama` = :grama WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':center_name' => $data['center_name'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':grama' => $data['grama']
        ));
    }
} 