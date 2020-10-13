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
        $st = $this->db->prepare("SELECT id, firstname, address, tel FROM users WHERE role = :role");
        $st->execute(array(
            ':role' => 'vendor'
        ));
        return $st->fetchAll();
    }
    //retrieve all col centers
    public function centerList() {
        $st = $this->db->prepare("SELECT id, center_name, province, district FROM colcenter");
        $st->execute();
        return $st->fetchAll();
    }

} 