<?php 

class Vendor_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function create($data){
        $st = $this->db->prepare('INSERT INTO vendor (`fname`, `lname`) VALUES (:fname, :lname)');
        $st->execute(array(
            ':fname' => $data['firstname'],
            ':lname' => $data['lastname']
        ));
    }

} 