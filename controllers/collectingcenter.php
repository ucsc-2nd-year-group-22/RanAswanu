<?php

class CollectingCenter extends Controller{

    function __construct() {
        parent::__construct(); 
        Session::init();
    }

    function index() {
        $this->view->rendor('collectingcenter/collectingcenters');
    }

    //rote to the register col. center
    public function register($arg = false) {
        $this->view->rendor('collectingcenter/register');
    }
    
    //insert into the database 
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

    // route to the edit form with retrieved data
    public function edit($id){
        $this->view->center = $this->model->singleCenterList($id);
        $this->view->rendor('collectingcenter/edit');
    }
    //update the database
    public function update($id){

        $data = array();

        $data['id'] = $id;
        $data['center_name'] = $_POST['center_name'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['grama'] = $_POST['grama'];

        $this->model->update($data);
        header('location: ' . URL . 'collectingcenter/collectingcenters');
    }

    //list of collecting centers to view
    public function collectingcenters(){

        $centerData = $this->model->centers();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [['label' =>'+ Register New Col. Center',
                        'path' => 'collectingcenter/register'
                        ] 
                    ],
            'centerData' => $centerData,
        ];
        $this->setActivePage('collectingcenters');
        $this->view->rendor('collectingcenter/collectingcenters', $pageData);
    }
}