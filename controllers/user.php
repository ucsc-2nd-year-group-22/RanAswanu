<?php

class User extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        $isAdmin = Session::get('isadmin');
        // if($logged == false) {
        //     Session::destroy();
        //     header('location: '. URL);
        //     exit;
        // }
    }

    public function index() {
        $this->view->userList = $this->model->userList();
        $role = Session::get('role');
        if($role == 'admin') {
            header('Location: admin');
        }else if($role == 'officer'){
            header('Location: officer/cropReq');
        }else if($role == 'farmer'){
            header('Location: farmer');
        }

        $this->view->rendor('user/index');
    }

    //rout to the register user
    public function register(){
        $this->destroyActivePage();
        $this->view->rendor('user/register');
    }

    //instert new user in to the database
    public function create(){
        $data = array();

        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['nic'] = $_POST['nic'];
        $data['tel'] = $_POST['tel'];
        $data['email'] = $_POST['email'];
        $data['dob'] = $_POST['dob'];
        $data['sex'] = $_POST['sex'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['grama'] = $_POST['grama'];
        $data['address'] = $_POST['address'];
        $data['role'] = $_POST['role'];
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];

        if($data['role'] == 'admin'){
            $data['isadmin'] = 1;
        }else{
            $data['isadmin'] = 0;
        }

        // TODO: Do error checking
        $this->model->create($data);
        header('location: ' . URL . 'user/login');
    }
    
    //fetch individual user
    public function edit($id){
        $this->view->user = $this->model->userSingleList($id);
        $this->view->rendor('user/edit');
    }

    // public function editSave($id){

    //     $data = array();
    //     $data['id'] = $id;
    //     $data['login'] = $_POST['login'];
    //     $data['password'] = $_POST['password'];
    //     $data['role'] = $_POST['role'];

    //     // TODO: Do error checking

    //     $this->model->editSave($data);
    //     header('location: ' . URL . 'user');
    // }
    // public function delete($id){
    //     $this->model->delete($id);
    //     header('location: ' . URL . 'user');
    // }

    //route to the user/login
    public function login(){
        $this->destroyActivePage();
        $this->view->rendor('user/login');
    }
    //login to the syetem
    public function loginusr(){
        $this->model->loginto();
    }

    //logout user from the system
    function logout() {
        Session::destroy();
        // Session::unset('loggedIn');
        header('location: '. URL .'user/login');
        exit;
    }
}  