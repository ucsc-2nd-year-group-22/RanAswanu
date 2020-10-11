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

        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];

        // TODO: Do error checking

        $this->model->create($data);
        header('location: ' . URL . 'vendor');
    }
}