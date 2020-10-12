<?php 

class Admin_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    //update role to officer
    public function toofficer($data){
        
        $st = $this->db->prepare('UPDATE users SET `role` = :role WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':role' => $data['role']
        ));
        return;
    }
    //update role to admin
    public function toadmin($data){
        
        $st = $this->db->prepare('UPDATE users SET `role` = :role WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':role' => $data['role']
        ));
        return;
    }

    //retrieve all vendors
    public function vendorList() {
        $st = $this->db->prepare("SELECT firstname, address, tel FROM users WHERE role = :role");
        $st->execute(array(
            ':role' => 'vendor'
        ));
        return $st->fetchAll();
    }
} 