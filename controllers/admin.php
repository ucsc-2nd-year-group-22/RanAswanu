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
        $this->setActivePage('userMgt');
        // var_dump($adminData);
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
        
        $this->setActivePage('notifications');
        $user_id = Session::get('role');
        $data = ['notifications' => $this->model->getNotifications($user_id)];

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

    //Search admins by name
    public function ajxSearchAdminName() {
        
        $d = $this->model->ajxSearchAdminName($_POST['search']);
        $data['farmerData'] = $d;
        // print_r($data['farmerData']);
        if(!empty($d)) {
            $this->view->rendor('admin/ajxAdminList', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }

    //Search admin by NIC 
    public function ajxSearchAdminNic() {
        $d = $this->model->ajxSearchAdminNic($_POST['search']);
        $data['farmerData'] = $d;
        // print_r($data['farmerData']);
        if(!empty($d)) {
            $this->view->rendor('admin/ajxAdminList', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }

    //Sort admins
    public function ajxFilterAdmin() {

        $d = $this->model->ajxFilterAdmin($_POST['filter'], $_POST['ascOrDsc']);
        $data['farmerData'] = $d;

        // print_r($data['farmerData']);
        if(!empty($d)) {
            $this->view->rendor('admin/ajxAdminList', $data, $withoutHeaderFooter=true);
        } else {
            $data['errMsg'] = "No Result Found !";
            $this->view->rendor('error/index', $data, $withoutHeaderFooter=true);
        }
    }
}