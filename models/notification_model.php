<?php

class Notification_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //send notification for role
    public function sendNotiRole($data)
    {
        $st = $this->db->prepare("INSERT INTO notification (`title`,`description`,`target_role`) VALUES (:title, :description, :target_role)");
        $st->execute(array(
            ':target_role' => $data['target_role'],
            ':description' => $data['description'],
            ':title' => $data['title']
        ));
    }
}
