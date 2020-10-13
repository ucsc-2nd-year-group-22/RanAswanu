<?php

class Officer extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();


    }

    public function index() {
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        $data = array(
            'role' => $role
        );
        if(($role=='officer'|| 'admin') && $logged==true)
            $this->view->rendor('officer/index', $data);
        else {
            $data['errMsg'] = "Unuthorized Acces ! Only Officers & Admins can visit the requested page";
            $this->view->rendor('error/index', $data);
        }
            
    }

    public function cropReq() {
        $cropReqData = [
            [
                'farmerId' => 443,
                'farmerName' => "Nimal",
                'cropType' => "Carrot"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Madupala",
                'cropType' => "Beans"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Nimal",
                'cropType' => "Carrot"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Madupala",
                'cropType' => "Beans"
            ],
            [
                'farmerId' => 443,
                'farmerName' => "Nimal",
                'cropType' => "Carrot"
            ],
            [
                'farmerId' => 412,
                'farmerName' => "Madupala",
                'cropType' => "Beans"
            ],
        ];

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => ['Crop Requests', 'other-tab'],
            'cropReqData' => $cropReqData,
        ];
        // Session::set('activePage', 'cropReq');
        $this->view->js = 'officer/js/default';
        $this->setActivePage('cropReq');
        $this->view->rendor('officer/cropReq', $pageData);
    }

    public function damageClaims() {
        $data = [];
        $this->setActivePage('damageClaims');
        $this->view->rendor('officer/damageClaims', $data);
    }

    public function farmerMng() {
        // print_r($this->model->officerList());
        
        $officerData = $this->model->officerList();
        $data['officerData'] = $officerData;
        $this->setActivePage('farmerMng');
        $this->view->rendor('officer/farmerMng', $data);
    }

    // public function officerList() {
    //     $centerData = $this->model->centerList();

    // }


    public function reports() {
        $data = [];
        $this->setActivePage('reports');
        $this->view->rendor('officer/reports', $data);
    }

    public function notifications() {
        $data = [];
        $this->setActivePage('notifications');
        $this->view->rendor('officer/notifications', $data);
    }

    public function register(){
        $this->view->rendor('officer/register');
    }

}