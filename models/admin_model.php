<?php 

class Admin_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    //retrieve all admins
    public function adminList() {
        $st = $this->db->prepare("SELECT user.user_id, user.first_name, user.address, user_tel.tel_no FROM user INNER JOIN user_tel ON user.user_id = user_tel.user_id AND user.role = :role");
        $st->execute(array(
            ':role' => 'admin'
        ));
        return $st->fetchAll();
    }

    //update role to officer
    public function toofficer($data){
        
        $st = $this->db->prepare('UPDATE user SET `role` = :role WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':role' => $data['role']
        ));
        return;
    }
    //update role to admin
    public function toadmin($data){
        
        $st = $this->db->prepare('UPDATE user SET `role` = :role WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':role' => $data['role']
        ));
        return;
    }

    //delete a adminx
    public function delete($id){
        $st = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

} 