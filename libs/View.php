<?php

class View {
    function __construct() {
        // echo 'This is the view<br>';
    }

    public function rendor($name, $data =[], $noInclude = false) {
        if(isset($data))
            extract($data);        
        
        if($noInclude == true) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
    }

    public function getActivePage($view) {
        if(Session::get('activePage') == $view) echo 'active';
    }
}