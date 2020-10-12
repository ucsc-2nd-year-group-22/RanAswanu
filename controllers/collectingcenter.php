<?php

class CollectingCenter extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();
    }

    function index() {
        $this->view->rendor('collectingcenter/collectingcenters');
    }

    public function register($arg = false) {
        $this->view->rendor('collectingcenter/register');
    }

    public function create(){
        $data = array();

        $data['center_name'] = $_POST['center_name'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['grama'] = $_POST['grama'];

        // TODO: Do error checking

        $this->model->create($data);
        header('location: ' . URL . 'admin/collectingcenters');
    }
}