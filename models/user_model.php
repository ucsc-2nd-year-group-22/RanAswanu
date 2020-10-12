<?php 

class User_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function userList() {
        $st = $this->db->prepare("SELECT id, login, role FROM users");
        $st->execute();
        return $st->fetchAll();
    }

    public function create($data){
        $st = $this->db->prepare('INSERT INTO users (`login`, `password`, `role`) VALUES (:login, MD5(:password), :role)');
        $st->execute(array(
            ':login' => $data['login'],
            ':password' => $data['password'],
            ':role' => $data['role']
        ));
    }

    public function editSave($data){
        $st = $this->db->prepare('UPDATE users SET `login` = :login, `password` = :password, `role` = :role WHERE id = :id');
        $st->execute(array(
            ':id' => $data['id'],
            ':login' => $data['login'],
            ':password' => MD5($data['password']),
            ':role' => $data['role']
        ));
    }

    public function delete($id){
        $st = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    public function loginto() {
        $st = $this->db->prepare("SELECT id, role, isadmin FROM users WHERE login= :login AND password = MD5(:password) ");
        $st->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));

        $data = $st->fetch();

        $count = $st->rowCount();
        if($count > 0) {
            // login
            Session::init();
            Session::set('id', $data['id']);
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            Session::set('isadmin', $data['isadmin']);
            header('location: ../user');
        } else {
            // show error
            header('location: ../login');
        }
        
    }

    public function userSingleList($id){
        
        $st = $this->db->prepare("SELECT id, login, role, isadmin FROM users WHERE id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }
} 