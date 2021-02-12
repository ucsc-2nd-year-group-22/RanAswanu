<?php

class User extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        $isAdmin = Session::get('isadmin');
        // if($logged == false) {
        //     Session::destroy();
        //     header('location: '. URL);
        //     exit;
        // }

        $this->view->js = array('user/js/default.js');
    }

    public function index()
    {
        $this->view->userList = $this->model->userList();
        $role = Session::get('role');
        $loggedIn = Session::get('loggedIn');

        if ($role == 'admin') {
            header('Location: admin');
        } else if ($role == 'officer') {
            header('Location: officer/cropReq');
        } else if ($role == 'farmer') {
            header('Location: farmer');
        }
        if ($loggedIn == false) {

            $this->view->rendor('user/index');
        }
    }

    //route to the register user
    public function register()
    {
        $provinces = $this->model->getProvinces();

        $pageData = [
            'provinces' => $provinces
        ];

        $this->destroyActivePage();
        $this->view->rendor('user/register', $pageData);
    }

    //instert new user in to the database
    public function create()
    {
        $data = array();
        // Sanitize
        $data['first_name'] = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $data['last_name'] = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $data['user_name'] = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
        $data['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $data['nic'] = filter_var($_POST['nic'], FILTER_SANITIZE_STRING);
        $data['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $data['dob'] = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);
        $data['sex'] = filter_var($_POST['sex'], FILTER_SANITIZE_STRING);
        $data['address'] = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
        $data['grama'] = filter_var($_POST['grama'], FILTER_SANITIZE_STRING);
        $data['role'] = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

        $data['tel_no_1'] = filter_var($_POST['tel_no_1'], FILTER_SANITIZE_STRING);
        $data['tel_no_2'] = filter_var($_POST['tel_no_2'], FILTER_SANITIZE_STRING);

        $data['grama'] = filter_var($_POST['grama'], FILTER_SANITIZE_STRING);
        $data['is_blocked'] = 0;


        if ($data['role'] == 'admin') {
            $data['isadmin'] = 1;
        } else {
            $data['isadmin'] = 0;
        }

        /////// FOR TESTING INSERTION ONLY
        /////// HAVE TO USE AJAX TO GET ID'S OF Districts, Provinces, ....
        $data['grama'] = 5;

        // TODO: Do error checking
        $this->model->create($data);

        //print_r($data);

        switch (Session::get('role')) {
            case 'admin':
                header('location: ' . URL . 'admin');
                break;

            case 'officer':
                header('location: ' . URL . 'farmer/farmerMng');
                break;

            default:
                header('location: ' . URL . 'user/login');
                break;
        }
    }

    //fetch individual user
    public function edit($user_id)
    {

        $data['user_id'] = $user_id;
        // echo $user_id . '=> ' . Session::get('user_id');

        if (Session::get('user_id') != $user_id) {
            $this->view->user = $this->model->userSingleList($user_id);
            // print_r($this->view->user['user']);
            // echo $this->view->user['user']['role'];
            if (Session::get('isadmin') == 1 || ($this->view->user['user']['role'] == 'farmer' && Session::get('role') == 'officer')) {
                $this->view->rendor('user/edit', $data);
            } else {
                echo '<hr>logout';
                //$this->logout();
            }
        } else {
            $this->view->user = $this->model->userSingleList($user_id);
            $this->view->rendor('user/edit', $data);
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        echo $id;

        switch (Session::get('role')) {

            case 'officer':
                header('location: ' . URL . 'farmer/farmerMng');
                break;

            case 'admin':
                header('location: ' . URL . 'admin');
                break;
        }
    }

    public function editSave($user_id)
    {

        // Sanitize variables before db update
        $data['first_name'] = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $data['last_name'] = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $data['user_name'] = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
        $data['nic'] = filter_var($_POST['nic'], FILTER_SANITIZE_STRING);
        $data['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $data['dob'] = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);
        $data['sex'] = filter_var($_POST['sex'], FILTER_SANITIZE_STRING);
        $data['address'] = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
        $data['grama'] = filter_var($_POST['grama'], FILTER_SANITIZE_STRING);
        $data['role'] = filter_var($_POST['role'], FILTER_SANITIZE_STRING);

        // Updated
        $data['tel_no_1'] = filter_var($_POST['tel_no_1'], FILTER_SANITIZE_STRING);
        $data['tel_no_2'] = filter_var($_POST['tel_no_2'], FILTER_SANITIZE_STRING);
        // Values before update
        $data['old-tel-1'] = filter_var($_POST['old-tel-1'], FILTER_SANITIZE_STRING);
        $data['old-tel-2'] = filter_var($_POST['old-tel-2'], FILTER_SANITIZE_STRING);

        /////// FOR TESTING INSERTION ONLY
        /////// HAVE TO USE AJAX TO GET ID'S OF Districts, Provinces, ....
        $data['grama'] = 5;

        $data['user_id'] = $user_id;

        //: Do error checking

        $this->model->editSave($data);
        // print_r($data);

        // print_r($data);

        if ($user_id == Session::get('user_id')) {
            header('location: ' . URL . 'user/viewUser/' . $user_id);
        } else {

            switch (Session::get('role')) {
                case 'officer':
                    header('location: ' . URL . 'farmer/farmerMng');
                    break;

                case 'admin':
                    header('location: ' . URL . 'admin/index');
                    break;

                case 'vendor':
                    header('location: ' . URL . 'vendor/index');
                    break;

                case 'farmer':
                    header('location: ' . URL . 'farmer/index');
            }
        }
    }

    //route to the user/login
    public function login()
    {

        $this->destroyActivePage();
        if (Session::get('loggedIn') == false) {
            $this->view->rendor('user/login');
        } else {
            $this->view->rendor('error/403');
        }
    }
    //login to the syetem
    public function loginusr()
    {
        $this->model->loginto();
    }

    //logout user from the system
    function logout()
    {
        Session::destroy();
        // Session::unset('loggedIn');
        header('location: ' . URL . 'user/login');
    }

    function viewUser($user_id)
    {

        $userAllData = $this->model->userSingleList($user_id);          //$userAllData contains all the data about user, (user + userTel + ...), used joins in sql

        $userData = $userAllData['user'];
        $userTel = $userAllData['userTel'];
        $userLocationData = $userAllData['locationData'];
        // $data is passed to the view
        $data['userTel'] = $userTel;
        $data['userData'] = $userData;
        $data['userLocationData'] = $userLocationData;
        $data['role'] = $userData['role'];
        $data['user_id'] = $userData['user_id'];
        $data['loggedIn'] = Session::get('loggedIn');
        $this->destroyActivePage();

        $this->view->rendor('user/profile', $data);
    }

    //get districts
    public function getDistricts($id)
    {
        $districts = $this->model->getDistricts($id);
        echo json_encode($districts);
    }

    //get divisional secratariast
    public function getDivSec($id)
    {
        $divSecs = $this->model->getDivSec($id);
        echo json_encode($divSecs);
    }
    
    //get gramasewa division
    public function getGramaSewa($id)
    {
        $gramaSewas = $this->model->getGramaSewa($id);
        echo json_encode($gramaSewas);
    }
    ////////////////////////////////////////////////
    // Moved authentication functions to another module


    // End of user class controller
}
