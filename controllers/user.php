<?php

class User extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        // if($logged == false) {
        //     Session::destroy();
        //     header('location: '. URL);
        //     exit;
        // }
    }

    public function index() {
        $this->view->userList = $this->model->userList();
        $this->view->rendor('user/index');
    }

    public function create(){

        $data = array();

        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        // TODO: Do error checking

        $this->model->create($data);
        header('location: ' . URL . 'user');
    }
    public function edit($id){
        //fetch individual user
        $this->view->user = $this->model->userSingleList($id);
        $this->view->rendor('user/edit');
    }

    public function editSave($id){

        $data = array();
        $data['id'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];

        // TODO: Do error checking

        $this->model->editSave($data);
        header('location: ' . URL . 'user');
    }
    public function delete($id){
        $this->model->delete($id);
        header('location: ' . URL . 'user');
    }

    //route to the user/login
    public function login(){
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