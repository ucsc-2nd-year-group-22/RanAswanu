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

        //send notifications
        $notiData = array();
        $notiData['target_role'] = "all";
        $notiData['target_user'] = 0;
        $notiData['title'] = "New Col. Center";
        $notiData['description'] = "A new collecting center was added to the list!";
        Notification::send($notiData);

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

        //send notifications
        $notiData = array();
        $notiData['target_role'] = "all";
        $notiData['target_user'] = 0;
        $notiData['title'] = "Col. Center Removed";
        $notiData['description'] = "A new collecting center was removed from the list!";
        Notification::send($notiData);

        header('location: ' . URL . 'collectingcenter/collectingcenters');
    }

    //get districts
    public function getDistricts($id)
    {
        $districts = $this->model->getDistricts($id);
        echo json_encode($districts);
    }

    //Search centers by name
    public function ajxSearchCentName() {
        
        $d = $this->model->ajxSearchCentName($_POST['search']);
        $data['centerData'] = $d;
        // print_r($data['farmerData']);
        if(!empty($d)) {
            $this->view->rendor('collectingcenter/ajxCenterList', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }
    //Search centers by district name
    public function ajxSearchDisName() {
        
        $d = $this->model->ajxSearchDisName($_POST['search']);
        $data['centerData'] = $d;
        // print_r($data['farmerData']);
        if(!empty($d)) {
            $this->view->rendor('collectingcenter/ajxCenterList', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }

    //Sort centers
    public function ajxFilterCenter() {

        $d = $this->model->ajxFilterCenter($_POST['filter'], $_POST['ascOrDsc']);
        $data['centerData'] = $d;

        // print_r($data['farmerData']);
        if(!empty($d)) {
            $this->view->rendor('collectingcenter/ajxCenterList', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }
}
