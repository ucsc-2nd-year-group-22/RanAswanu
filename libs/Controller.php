<?php

class Controller {

    function __construct() {
        // echo 'Msain Controller } ';
        $this->view = new View();        
    }

    public function loadModel($name) {

        $path = 'models/'.$name.'_model.php';

        if(file_exists($path)) {
            require 'models/'.$name.'_model.php';

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }

    public function setActivePage($view) {
        Session::set('activePage', $view);
    }

    public function destroyActivePage() {
        Session::unset('activePage');
    }

} 