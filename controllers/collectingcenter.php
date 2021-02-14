<?php

class CollectingCenter extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::init();
    }

    function index()
    {
        $this->view->rendor('collectingcenter/collectingcenters');
    }

    //rote to the register col. center
    public function register($arg = false)
    {
        $provinces = $this->model->getProvinces();

        $pageData = [
            'provinces' => $provinces
        ];

        $this->view->rendor('collectingcenter/register', $pageData);
    }

    //insert into the database 
    public function create()
    {
        $data = array();

        $data['center_name'] = $_POST['center_name'];
        $data['district_id'] = $_POST['district'];

        // TODO: Do error checking

        $this->model->create($data);
        header('location: ' . URL . 'collectingcenter/collectingcenters');
    }

    // route to the edit form with retrieved data
    public function edit($id)
    {
        $districts = $this->model->getAllDistricts();

        $pageData = [
            'id' => $id,
            'districts' => $districts,
        ];
        $this->view->center = $this->model->singleCenterList($id);

        $this->view->rendor('collectingcenter/edit', $pageData);
    }

    //update the database
    public function update($id)
    {

        $data = array();

        $data['id'] = $id;
        $data['center_name'] = $_POST['center_name'];
        $data['district'] = $_POST['district'];

        $this->model->update($data);
        header('location: ' . URL . 'collectingcenter/collectingcenters');
    }

    //list of collecting centers to view
    public function collectingcenters()
    {

        $centerData = $this->model->centers();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [
                [
                    'label' => '+ Register New Col. Center',
                    'path' => 'collectingcenter/register'
                ]
            ],
            'centerData' => $centerData,
        ];
        $this->setActivePage('collectingcenters');
        $this->view->rendor('collectingcenter/collectingcenters', $pageData);
    }

    //remove a col. center
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'collectingcenter/collectingcenters');
    }

    //get districts
    public function getDistricts($id)
    {
        $districts = $this->model->getDistricts($id);
        echo json_encode($districts);
    }
}
