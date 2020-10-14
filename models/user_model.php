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

    //register new user into the  database user table
    public function create($data){  
        $st = $this->db->prepare("INSERT INTO users (`firstname`, `lastname`, `login`, `password`, `role`, `isadmin`, `nic`, `tel`, `email`, `dob`, `sex`, `province`, `district`, `grama`, `address`) VALUES (:firstname, :lastname, :login, :password, :role, :isadmin, :nic, :tel, :email, :dob, :sex, :province, :district, :grama, :address)");
        $st->execute(array(
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':login' => $data['login'],
            ':password' => MD5($data['password']),
            ':role' => $data['role'],
            ':isadmin' => $data['isadmin'],
            ':nic' => $data['nic'],
            ':tel' => $data['tel'],
            ':email' => $data['email'],
            ':dob' => $data['dob'],
            ':sex' => $data['sex'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':grama' => $data['grama'],
            ':address' => $data['address'],
        ));
    }

    //update the user data in the database 
    public function editSave($data){
        $st = $this->db->prepare('UPDATE users SET `login` = :login, `firstname` = :firstname, `lastname` = :lastname, `role` = :role, `nic` = :nic, `tel` = :tel, `email` = :email, `dob` = :dob, `sex` = :sex, `province` = :province, `district` = :district, `grama` = :grama, `address` = :address WHERE `id` = :id');
        $st->execute(array(
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':login' => $data['login'],
            // ':password' => MD5($data['password']),
            ':role' => $data['role'],
            ':nic' => $data['nic'],
            ':tel' => $data['tel'],
            ':email' => $data['email'],
            ':dob' => $data['dob'],
            ':sex' => $data['sex'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':grama' => $data['grama'],
            ':address' => $data['address'],
            ':id' => $data['id']
        ));
        // print_r($st);
    }

    public function delete($id){
        $st = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //make user logged into the system
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
            header('location: login');
        }
        
    }

    //fetching a single user
    public function userSingleList($id){
        
        $st = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $st->execute(array(
            ':id' => $id,
        ));
        return $st->fetch();
    }
} 