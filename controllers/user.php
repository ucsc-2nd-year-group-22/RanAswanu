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

        $this->view->js = array('user/js/default.js');
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

    //route to the register user
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

        switch (Session::get('role')) {
            case 'admin':
                header('location: ' . URL . 'admin');
                break;

            case 'officer':
                header('location: ' . URL . 'farmer/farmerMng');
                break;
            
            default:
            header('location: ' . URL . 'user/login');
                break;
        }

    }
    
    //fetch individual user
    public function edit($id){

        $data['id'] = $id;
        if(Session::get('id') != $id){
            $this->view->user = $this->model->userSingleList($id);
            if(Session::get('isadmin') == 1 || ($this->view->user['role'] == 'farmer' && Session::get('role') == 'officer')){
                $this->view->rendor('user/edit', $data);
            }else{
                $this->logout();
            }
        }else{
            $this->view->user = $this->model->userSingleList($id);
            $this->view->rendor('user/edit', $data);
        }
        
    }

    public function delete($id) {
        $this->model->delete($id);
        switch (Session::get('role')) {
            case 'officer':
                header('location: ' . URL . 'farmer/farmerMng');
                break;

            case 'admin':
                header('location: ' . URL . 'admin');
                break;
        }
    }

    public function editSave($id){

        // Sanitize variables before db update
        $data = array();
        $data['firstname'] = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        $data['lastname'] = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        $data['login'] = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
        $data['nic'] = filter_var($_POST['nic'],  FILTER_SANITIZE_STRING);
        $data['tel'] = filter_var($_POST['tel'],  FILTER_SANITIZE_STRING);
        $data['email'] = filter_var($_POST['email'],  FILTER_SANITIZE_EMAIL);
        $data['dob'] = filter_var($_POST['dob'],  FILTER_SANITIZE_STRING);
        $data['sex'] = filter_var($_POST['sex'],  FILTER_SANITIZE_STRING);
        $data['province'] = filter_var($_POST['province'],  FILTER_SANITIZE_STRING);
        $data['district'] = filter_var($_POST['district'],  FILTER_SANITIZE_STRING);
        $data['grama'] = filter_var($_POST['grama'],  FILTER_SANITIZE_STRING);
        $data['address'] = filter_var($_POST['address'],  FILTER_SANITIZE_STRING);
        $data['role'] = filter_var($_POST['role'],  FILTER_SANITIZE_STRING);
        $data['id'] = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        //: Do error checking

        $this->model->editSave($data);
        // print_r($data);

        if($id == Session::get('id')) {
            header('location: ' . URL . 'user/viewUser/' . $id);
        } else {
            
            switch (Session::get('role')) {
                case 'officer':
                    header('location: ' . URL . 'farmer/farmerMng');
                    break;
    
                case 'admin':
                    header('location: ' . URL . 'admin/index');
                    break;
                
                case 'vendor':
                    header('location: ' . URL . 'vendor/index');
                    break;
    
                case 'farmer':
                    header('location: ' . URL . 'farmer/index');
            }

        }

    }

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
    }

    function viewUser($id) {

        $userData = $this->model->userSingleList($id);
        $data['userData'] = $userData;
        $data['role'] = $userData['role'];
        $data['id'] = $userData['id'];
        $data['loggedIn'] = Session::get('loggedIn');
        $this->destroyActivePage();
        $this->view->rendor('user/profile', $data);
    }


////////////////////////////////////////////////
// Moved authentication functions to another module


    // End of user class controller
}  