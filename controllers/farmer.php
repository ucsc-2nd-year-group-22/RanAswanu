<?php

class Farmer extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
    }

    public function farmerMng() {
       
        $farmerData = $this->model->farmerList();
        $data['officerData'] = $farmerData;
        $this->setActivePage('farmerMng');
        $this->view->rendor('farmer/farmerMng', $data);
    }

   
    public function damageclaim($arg = false) {
        $this->view->rendor('farmer/damageclaim');
    }

    public function cropReq($arg = false) {
        $this->view->rendor('farmer/cropReq');
    }    

}