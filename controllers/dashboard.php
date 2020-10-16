<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        
        // if($logged == false) {
        //     Session::destroy();
        //     header('location: '. URL .'login');
        //     exit;
        // }

        $this->view->js ='dashboard/js/default.js';
    }

    function index() {
        // $logged = Session::get('loggedIn');
        // $role = Session::get('role');
        $dataPoints = array();
        //Best practice is to create a separate file for handling connection to database
        try{
            // Creating a new connection.
            // Replace your-hostname, your-db, your-username, your-password according to your database
            $link = new \PDO(   'mysql:host=localhost;dbname=mvc;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                                'root', //'root',
                                '', //'',
                                array(
                                    \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                    \PDO::ATTR_PERSISTENT => false
                                )
                            );
            
            $handle = $link->prepare('select text as label, id as y from data'); 
            $handle->execute(); 
            $result = $handle->fetchAll(\PDO::FETCH_OBJ);
                
            foreach($result as $row){
                array_push($dataPoints, array("label"=> $row->label, "y"=> $row->y));
            }
            $link = null;
        }
        catch(\PDOException $ex){
            print($ex->getMessage());
        }


        // $dataPoints = array( 
        //     array("y" => 3373.64, "label" => "Germany" ),
        //     array("y" => 2435.94, "label" => "France" ),
        //     array("y" => 1842.55, "label" => "China" ),
        //     array("y" => 1828.55, "label" => "Russia" ),
        //     array("y" => 1039.99, "label" => "Switzerland" ),
        //     array("y" => 765.215, "label" => "Japan" ),
        //     array("y" => 612.453, "label" => "Netherlands" )
        // );
        $this->setActivePage('dashboard');
        $this->view->rendor('dashboard/index', $dataPoints);
    }
    
    // xhr => xml http request
    function xhrInsert () {
        $this->model->xhrInsert();
    }

    function xhrGetListings() {
        $this->model->xhrGetListings();
    }

    function xhrDeleteListing() {
        $this->model->xhrDeleteListing();
    }
    
    
}  