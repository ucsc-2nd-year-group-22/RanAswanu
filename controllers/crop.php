<?php

class Crop extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::init();
    }

    function index()
    {
        $this->view->rendor('crop/crops');
    }

    //route to the crop register form
    public function register($arg = false)
    {

        $districts = $this->model->getAllDistricts();
        $pageData = [
            'districts' => $districts
        ];

        $this->view->rendor('crop/register', $pageData);
    }

    //get the post data and create the crop in the database
    public function create()
    {
        $data = array();

        $data['crop_type'] = $_POST['crop_type'];
        $data['crop_varient'] = $_POST['crop_varient'];
        $data['best_area'] = $_POST['best_area'];
        $data['harvest_per_land'] = $_POST['harvest_per_land'];
        $data['harvest_period'] = $_POST['harvest_period'];
        $data['description'] = $_POST['description'];
        $data['admin_user_id'] = Session::get('user_id');

        // TODO: Do error checking

        $this->model->create($data);

        //send notifications
        $notiData = array();
        $notiData['target_role'] = "admin";
        $notiData['target_user'] = 0;
        $notiData['title'] = "New Crops";
        $notiData['description'] = "A new crop is added to the list. Please check it out!";
        Notification::send($notiData);

        header('location: ' . URL . 'crop/crops');
    }

    //route to view all crops registered in the system
    public function crops()
    {

        $cropData = $this->model->crops();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [
                [
                    'label' => '+ Register New Crop',
                    'path' => 'crop/register'
                ]
            ],
            'cropData' => $cropData
        ];
        $this->setActivePage('crops');
        $this->view->rendor('crop/crops', $pageData);
    }

    // route to the edit form with retrieved data
    public function edit($id)
    {
        $this->view->crop = $this->model->singleCropList($id);
        $districts = $this->model->getAllDistricts();

        //send notifications
        $notiData = array();
        $notiData['target_role'] = "admin";
        $notiData['target_user'] = 0;
        $notiData['title'] = "Crop Edited";
        $notiData['description'] = "A new crop has been edited. Please check it out!";
        Notification::send($notiData);

        $pageData = [
            'id' => $id,
            'districts' => $districts,
        ];
        $this->view->rendor('crop/edit', $pageData);
    }

    //routing to crop varients configuration
    public function varients($id)
    {

        $varientData = $this->model->cropVarients($id);

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [],
            'varientData' => $varientData,
            'cropId' => $id,
        ];
        // $this->setActivePage('crops');
        $this->view->rendor('crop/varients', $pageData);
    }

    //update the database
    public function update($id)
    {

        $data = array();

        $data['id'] = $id;
        $data['crop_type'] = $_POST['crop_type'];
        $data['crop_varient'] = $_POST['crop_varient'];
        $data['best_area'] = $_POST['best_area'];
        $data['harvest_per_land'] = $_POST['harvest_per_land'];
        $data['harvest_period'] = $_POST['harvest_period'];
        $data['description'] = $_POST['description'];
        $data['admin_user_id'] = Session::get('user_id');

        $this->model->update($data);
        header('location: ' . URL . 'crop/crops');
    }

    //remove a crop
    public function delete($id)
    {
        $this->model->delete($id);

        //send notifications
        $notiData = array();
        $notiData['target_role'] = "admin";
        $notiData['target_user'] = 0;
        $notiData['title'] = "Crop Removed";
        $notiData['description'] = "A crop is removed from the list. Please check it out!";
        Notification::send($notiData);

        header('location: ' . URL . 'crop/crops');
    }

    //remove crop varient
    public function deleteVarient($id)
    {
        $this->model->deleteVarient($id);
        header('location: ' . URL . 'crop/crops');
    }

    //add crop varient
    public function addVarient($id)
    {

        $data = array();

        $data['id'] = $id;
        $data['crop_name'] = $_POST['crop_name'];
        $this->model->addVarient($data);

        $this->varients($id);
    }
}
