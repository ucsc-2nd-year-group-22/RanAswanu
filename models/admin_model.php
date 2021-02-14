<?php

class Admin_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //retrieve all admins
    public function adminList()
    {
        $st = $this->db->prepare("SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'admin' GROUP BY user.user_id");

        // SELECT user.user_name, user.first_name, group_concat(user_tel.tel_no) FROM user JOIN user_tel on user.user_id =user_tel.user_id GROUP BY user.user_id
        $st->execute(array(
            ':role' => 'admin'
        ));
        // print_r($st->fetchAll());

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //update role to officer
    public function toofficer($data)
    {

        $st = $this->db->prepare('UPDATE user SET `role` = :role WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':role' => $data['role']
        ));
        return;
    }
    //update role to admin
    public function toadmin($data)
    {

        $st = $this->db->prepare('UPDATE user SET `role` = :role WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':role' => $data['role']
        ));
        return;
    }

    //delete an admin
    public function delete($id)
    {
        $st = $this->db->prepare('DELETE FROM user WHERE user_id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }
}
