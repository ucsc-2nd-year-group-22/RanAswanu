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
        print_r($st);
    }
} 