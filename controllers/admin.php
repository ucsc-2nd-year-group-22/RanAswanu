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
        
        $this->view->rendor('dashboard/index', $data);
    }

    //retrieve all registered admins ( + routing )
    public function admins(){

        $adminData = $this->model->adminList();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [ ['label' =>'<i class="fas fa-user-plus"></i> Register New admin',
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

    //route to notifications
    public function notifications() {
        $data = [];
        $this->setActivePage('notifications');
        $this->view->rendor('admin/notifications', $data);
    }

    //route to reports
    public function reports() {
        $data = [];
        $this->setActivePage('reports');
        $this->view->rendor('admin/reports', $data);
    }

    //remove a admin
    public function delete($id){
        $this->model->delete($id);
        header('location: ' . URL . 'admin/admins');
    }
}