<?php 

class Officer_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }


//retrieve all vendors
    public function officerList() {
        $st = $this->db->prepare("SELECT * FROM users WHERE role = :role");
        $st->execute(array(
            ':role' => 'officer'
        ));
        // print_r($st->fetchAll());
        return $st->fetchAll();
    }

}