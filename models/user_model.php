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

    public function userSingleList($id){
        
        $st = $this->db->prepare("SELECT id, login, role FROM users WHERE id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }

    public function create($data){
        $st = $this->db->prepare('INSERT INTO users (`login`, `password`, `role`) VALUES (:login, :password, :role)');
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

    public function login() {
        $st = $this->db->prepare("SELECT id, role FROM users WHERE login= :login AND password = MD5(:password) ");
        $st->execute(array(
            ':login' => $_POST['login'],
            ':password' => $_POST['password']
        ));

        $data = $st->fetch();

        $count = $st->rowCount();
        if($count > 0) {
            // login
            Session::init();
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        } else {
            // show error
            header('location: ../login');
        }
        
    }
} 