<?php 

class Officer_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    //retrieve all officers
    public function officerList() {
        $st = $this->db->prepare("SELECT id, firstname, address, tel FROM users WHERE role = :role");
        $st->execute(array(
            ':role' => 'officer'
        ));
        return $st->fetchAll();
    }
   

}