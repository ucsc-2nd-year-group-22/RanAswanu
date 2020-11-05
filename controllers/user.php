<?php

class User extends Controller {

    public function __construct() {
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
    }

    public function index() {
        $this->view->userList = $this->model->userList();
        $role = Session::get('role');
        if($role == 'admin') {
            header('Location: admin');
        }else if($role == 'officer'){
            header('Location: officer/cropReq');
        }else if($role == 'farmer'){
            header('Location: farmer');
        }

        $this->view->rendor('user/index');
    }

    //route to the register user
    public function register(){
        $this->destroyActivePage();
        $this->view->rendor('user/register');
    }

    //instert new user in to the database
    public function create(){
        $data = array();

        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['nic'] = $_POST['nic'];
        $data['tel'] = $_POST['tel'];
        $data['email'] = $_POST['email'];
        $data['dob'] = $_POST['dob'];
        $data['sex'] = $_POST['sex'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['grama'] = $_POST['grama'];
        $data['address'] = $_POST['address'];
        $data['role'] = $_POST['role'];
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];

        if($data['role'] == 'admin'){
            $data['isadmin'] = 1;
        }else{
            $data['isadmin'] = 0;
        }

        // TODO: Do error checking
        $this->model->create($data);

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
    public function edit($id){

        $data['id'] = $id;
        if(Session::get('id') != $id){
            $this->view->user = $this->model->userSingleList($id);
            if(Session::get('isadmin') == 1 || ($this->view->user['role'] == 'farmer' && Session::get('role') == 'officer')){
                $this->view->rendor('user/edit', $data);
            }else{
                $this->logout();
            }
        }else{
            $this->view->user = $this->model->userSingleList($id);
            $this->view->rendor('user/edit', $data);
        }
        
    }

    public function delete($id) {
        $this->model->delete($id);
        switch (Session::get('role')) {
            case 'officer':
                header('location: ' . URL . 'farmer/farmerMng');
                break;

            case 'admin':
                header('location: ' . URL . 'admin');
                break;
        }
    }

    public function editSave($id){

        $data = array();
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['login'] = $_POST['login'];
        $data['nic'] = $_POST['nic'];
        $data['tel'] = $_POST['tel'];
        $data['email'] = $_POST['email'];
        $data['dob'] = $_POST['dob'];
        $data['sex'] = $_POST['sex'];
        $data['province'] = $_POST['province'];
        $data['district'] = $_POST['district'];
        $data['grama'] = $_POST['grama'];
        $data['address'] = $_POST['address'];
        $data['role'] = $_POST['role'];
        $data['id'] = $id;
        // $data['password'] = MD5($_POST['password']);

        

        // TODO: Do error checking

        $this->model->editSave($data);
        // print_r($data);
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

    //route to the user/login
    public function login(){
        $this->destroyActivePage();
        $this->view->rendor('user/login');
    }
    //login to the syetem
    public function loginusr(){
        $this->model->loginto();
    }

    //logout user from the system
    function logout() {
        Session::destroy();
        // Session::unset('loggedIn');
        header('location: '. URL .'user/login');
    }

    function viewUser($id) {

        $userData = $this->model->userSingleList($id);
        $data['userData'] = $userData;
        $data['role'] = $userData['role'];
        $data['id'] = $userData['id'];
        $data['loggedIn'] = Session::get('loggedIn');

        $this->view->rendor('user/profile', $data);
    }

    function resetPw() {
        $data = [];
        $this->view->rendor('user/resetPw', $data);
    }

    function resetRq() {
        if(isset($_POST['resetRqSubmit'])) {    // User should access this section only using the form, not from the url
            
            // Avoid timing attacks by not using the same token
            $selector = bin2hex(random_bytes(8));

            // use for authentication
            $token = random_bytes(32);      // Longer the safer :)

            $url = URL . "user/createNewPw/$selector/".bin2hex($token);
            echo $url;
            // U => Toadys date in seconds since 1970
            $expires = date("U") + 1800;        // 1 hour

            $userEmail = $_POST['email'];

            $this->model->deleteOldTokens($userEmail);
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $this->model->insertNewToken($userEmail, $selector, $hashedToken, $expires);

            // send mail with url

            // header("Location: ".URL."user/resetPw?reset=success");

        } else {
            header("Location: ".URL."user/login");
        }
    }

    function createNewPw($selector, $token) {

        if(empty($selector) || empty($token)) {
            echo "Could not validate your request !";
        } else {
            // check whether selector, token are proper hexadecimal format
            if(ctype_xdigit($selector) !== false && ctype_xdigit($token) !== false) {
                $data['validator'] = $token;
                $data['selector'] = $selector;
                $this->view->rendor('user/createNewPw', $data);
            }          
        }   
    }

    function submitNewPw() {
        $data = [];

        if(isset($_POST['resetPwSubmit'])) {

            $selector = $_POST['selector'];
            $validator = $_POST['token'];
            $pwd = $_POST['pwd'];
            $pwdRepeat = $_POST['pwdRepeat'];

            if(empty($pwd) || empty($pwdRepeat)) {
                // handle epmty pwd
                header("Location:".URL."user/createNewPw/$selector/$validator?newpw=empty");
                exit();
                echo 'empty';
            } else if ($pwd != $pwdRepeat) {
                // handle conflicting pwds
                header("Location:".URL."user/createNewPw/$selector/$validator?newpw=notsame");
                exit();
                echo 'pwd not same';
            } else {
                echo "hey";
            }

        } else {
            header("Location :".URL);
        }

        // $this->view->rendor('user/resetPw', $data);
    }

    // End of user class controller
}  