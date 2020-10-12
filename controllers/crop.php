<?php

class Crop extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();
    }

    function index() {
        $this->view->rendor('crop/crops');
    }

    public function register($arg = false) {
        $this->view->rendor('crop/register');
    }

    public function create(){
        $data = array();

        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];

        // TODO: Do error checking

        $this->model->create($data);
        header('location: ' . URL . 'vendor');
    }
}