<?php

class Notification extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    //test static function
    // public static function caller($data){
    //     $noti = new Notification();
    //     $noti->test($data);
    // }

    public static function send($data)
    {
        $noti = new Notification();
        $st = $noti->db->prepare("INSERT INTO notification (`title`,`description`,`target_role`, `target_user`) VALUES (:title, :description, :target_role, :target_user)");
        print_r($st->execute());
        $st->execute(array(
            ':target_role' => $data['target_role'],
            ':description' => $data['description'],
            ':title' => $data['title'],
            ':target_user' => $data['target_user']
        ));
    }
}
