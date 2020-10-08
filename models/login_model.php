<?php 

class Login_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function run() {
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