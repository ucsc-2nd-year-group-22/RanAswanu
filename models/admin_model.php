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
} 