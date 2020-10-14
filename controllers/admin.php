<?php

class Admin extends Controller {

    public function __construct() {
        
        parent::__construct();
        Session::init();
        
        
    }

    public function index() {
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        $isAdmin = Session::get('isadmin');
        $data = array(
            'role' => $role
        );
        
        $this->view->rendor('admin/index', $data);
    }

    //retrieve all registered admins ( + routing )
    public function admins(){

        $adminData = $this->model->adminList();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [ ['label' =>'+ Register New admin',
                          'path' => 'user/register'
                        ]           
                      ],
            'adminData' => $adminData,
        ];
        
        $this->view->rendor('admin/admins', $pageData);
    }

    //change role to officer
    public function toofficer($id){

        $data = array();
        $data['id'] = $id;
        $data['role'] = 'officer';

        $this->model->toofficer($data);
        Session::set('role', 'officer');
        header('location: ' . URL . 'user');
    }
    //change role to admin
    public function toadmin($id){

        $data = array();
        $data['id'] = $id;
        $data['role'] = 'admin';

        $this->model->toofficer($data);
        Session::set('role', 'admin');
        header('location: ' . URL . 'user');
    }
}