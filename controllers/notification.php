<?php

class Notification extends Controller
{

    public function __construct()
    {
        parent::__construct();
        // Session::init();
    }

    //send notification for role
    public function sendNotiRole($data)
    {
        // $data = array();

        // $data['role'] = $role;
        // $data['title'] = $title;
        // $data['description'] = $description;

        // TODO: Do error checking
        $this->model->sendNotiRole($data);
    }

    // //send notification for single user
    // public static function sendNotiUser($userId, $title, $description)
    // {
    //     //pass
    // }
}
