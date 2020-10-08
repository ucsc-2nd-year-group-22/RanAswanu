<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->rendor('login/index');
    }

    function run() {
        $this->model->run();
    }

}