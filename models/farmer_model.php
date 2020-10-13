<?php 

class Farmer_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

 public function farmerList() {
        $st = $this->db->prepare("SELECT * FROM users WHERE role = :role");
        $st->execute(array(
            ':role' => 'farmer'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();
    }

    
}