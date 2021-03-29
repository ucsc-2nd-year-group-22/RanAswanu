<?php

class Vendor_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //retrieve all vendors
    public function vendorList()
    {
        $st = $this->db->prepare("SELECT user.*, group_concat(user_tel.tel_no) AS telNos FROM user JOIN user_tel on user.user_id =user_tel.user_id WHERE user.role = 'vendor' GROUP BY user.user_id");

        // SELECT user.user_name, user.first_name, group_concat(user_tel.tel_no) FROM user JOIN user_tel on user.user_id =user_tel.user_id GROUP BY user.user_id
        $st->execute(array(
            ':role' => 'vendor'
        ));
        // print_r($st->fetchAll());

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxListCrop($vendor_id)
    {


        // $st=$this->db->prepare("SELECT selling_request.* , user.user_id, crop.crop_type ,divisional_secratariast.ds_name FROM harvest 
        // JOIN crop ON crop.crop_id=harvest.harvest_id 
        // JOIN divisional_secratariast ON divisional_secratariast.ds_id=harvest.gs_id 
        // JOIN selling_request ON selling_request.harvest_id=harvest.harvest_id JOIN user ON user.user_id=harvest.farmer_user_id
        // ");

        $st = $this->db->prepare("SELECT selling_request.*,crop.*,user.user_id,user.first_name,user.last_name, district.ds_name 
        FROM `selling_request` 
        JOIN harvest ON harvest.harvest_id = selling_request.harvest_id 
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
        JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id 
        JOIN district ON district.district_id = divisional_secratariast.district_id
        JOIN user ON user.user_id=:user_id 
        JOIN crop ON crop.crop_id=harvest.crop_id");
        // JOIN user_tel ON user_tel.user_id=user.user_id


        $st->execute(array(
            ':user_id' => $vendor_id

        ));
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }



    public function giveOffer($selling_req_id)
    {
        $st = $this->db->prepare("SELECT selling_request.* FROM selling_request 
    WHERE  selling_request.selling_req_id=:selling_req_id");

        $st->execute(array(
            ':selling_req_id' => $selling_req_id,
        ));
        return $st->fetch();
    }



    public function viewprofile($user_id)
    {

        // $st=$this->db->prepare("SELECT user.*,selling_request.* From user JOIN selling_request on selling_request.farmer_user_id=user.user_id WHERE user_id=$user_id");  

        $st = $this->db->prepare("SELECT user.user_id ,user.first_name,user.last_name,user.email,Group_concat(user_tel.tel_no) AS phone_no,gramasewa_division.gs_name,divisional_secratariast.ds_name FROM user 
        JOIN user_tel ON user_tel.user_id=user.user_id
        JOIN gramasewa_division ON gramasewa_division.gs_id=user.gs_id
        JOIN divisional_secratariast ON divisional_secratariast.ds_id=gramasewa_division.ds_id
        where user.user_id=:user_id");


        $st->execute(array(
            ':user_id' => $user_id
        ));
        return $st->fetch();
        //  print_r($st->fetch);
        //return $st->fetchAll(PDO::FETCH_ASSOC);
    }


    public function acceptedOffersList()
    {
        //$st = $this->db->prepare('UPDATE offer SET `offer_amount` = :amount WHERE offer_id = :reqid');
        $user_id = Session::get('user_id');
        // $st=$this->db->prepare("SELECT offer.*,selling_request.*,user.user_id,user.first_name,user.last_name,collecting_center.center_name,district.ds_name,crop.crop_type,group_concat(user_tel.tel_no) AS phone_no FROM offer
        $st = $this->db->prepare("SELECT offer.*,selling_request.*,user.user_id,user.first_name,user.last_name,collecting_center.center_name,district.ds_name,crop.crop_type FROM offer
        JOIN selling_request ON selling_request.selling_req_id=offer.selling_req_id
        JOIN user ON user.user_id=selling_request.farmer_user_id
        JOIN harvest ON harvest.harvest_id=selling_request.harvest_id
        JOIN collecting_center ON collecting_center.center_id=harvest.center_id
        JOIN district ON district.district_id=collecting_center.district_id
        JOIN crop ON crop.crop_id=harvest.crop_id
        -- JOIN user_tel ON user_tel.user_id=user.user_id
        where offer.vendor_user_id=:user_id AND offer.transaction_flag=1 ORDER BY offer.offer_id DESC");
        $st->execute(array(
            'user_id' => $user_id,
        ));
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }





    public function ajxSortCrops($filter, $ascOrDsc)
    {
        // $st = $this->db->prepare('DELETE FROM offer WHERE offer_id = :id');
        // $st->execute(array(
        //     ':id' => $data['offer_id']
        // ));

        if ($ascOrDsc == 'ASC') {
            $det = "SELECT selling_request.*,crop.*,user.user_id,user.first_name,user.last_name, district.ds_name 
            FROM `selling_request` 
            JOIN harvest ON harvest.harvest_id = selling_request.harvest_id 
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
            JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id 
            JOIN district ON district.district_id = divisional_secratariast.district_id
            JOIN user ON user.user_id=harvest.farmer_user_id 
            JOIN crop ON crop.crop_id=harvest.crop_id ORDER BY selling_request.$filter ASC";
        }

        if ($ascOrDsc == 'DESC') {
            $det = "SELECT selling_request.*,crop.*,user.user_id,user.first_name,user.last_name, district.ds_name 
            FROM `selling_request` 
            JOIN harvest ON harvest.harvest_id = selling_request.harvest_id 
            JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
            JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id 
            JOIN district ON district.district_id = divisional_secratariast.district_id
            JOIN user ON user.user_id=harvest.farmer_user_id 
            JOIN crop ON crop.crop_id=harvest.crop_id ORDER BY selling_request.$filter DESC";
        }

        $st = $this->db->prepare($det);
        $st->execute();
        // print_r($st->fetchAll);
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxSearchCrops($crop_name)
    {
        // $st = $this->db->prepare("SELECT offer.*, selling_request.*,collecting_center.center_name, crop.crop_type FROM selling_request
        // JOIN offer ON selling_request.selling_req_id=offer.selling_req_id
        // JOIN user ON selling_request.farmer_user_id = user.user_id
        // JOIN harvest ON user.user_id = harvest.farmer_user_id
        // JOIN crop ON harvest.crop_id = crop.crop_id
        // JOIN collecting_center ON harvest.center_id = collecting_center.center_id where offer.vendor_user_id = :id group by offer.offer_id" );
        
        $st = "SELECT selling_request.*,crop.*,user.user_id,user.first_name,user.last_name, district.ds_name 
        FROM `selling_request` 
        JOIN harvest ON harvest.harvest_id = selling_request.harvest_id 
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
        JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id 
        JOIN district ON district.district_id = divisional_secratariast.district_id
        JOIN user ON user.user_id=harvest.farmer_user_id 
        JOIN crop ON crop.crop_id=harvest.crop_id
        WHERE crop.crop_type LIKE :crops";

        $st = $this->db->prepare($st);
        $st->execute(array(
            'crops' => "$crop_name%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxSearchCropsdistrict($crop_dis)
    {
        $st = "SELECT selling_request.*,crop.*,user.user_id,user.first_name,user.last_name, district.ds_name 
        FROM `selling_request` 
        JOIN harvest ON harvest.harvest_id = selling_request.harvest_id 
        JOIN gramasewa_division ON gramasewa_division.gs_id = harvest.gs_id 
        JOIN divisional_secratariast ON divisional_secratariast.ds_id = gramasewa_division.ds_id 
        JOIN district ON district.district_id = divisional_secratariast.district_id
        JOIN user ON user.user_id=harvest.farmer_user_id 
        JOIN crop ON crop.crop_id=harvest.crop_id
        WHERE district.ds_name LIKE :district";

        $st = $this->db->prepare($st);
        $st->execute(array(
            'district' => "$crop_dis%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxSearchAcceptedCrops($crop_name)
    {
        $user_id = Session::get('user_id');
        $st = "SELECT offer.*,selling_request.*,user.user_id,user.first_name,user.last_name,collecting_center.center_name,district.ds_name,crop.crop_type FROM offer
        JOIN selling_request ON selling_request.selling_req_id=offer.selling_req_id
        JOIN user ON user.user_id=selling_request.farmer_user_id
        JOIN harvest ON harvest.harvest_id=selling_request.harvest_id
        JOIN collecting_center ON collecting_center.center_id=harvest.center_id
        JOIN district ON district.district_id=collecting_center.district_id
        JOIN crop ON crop.crop_id=harvest.crop_id
        --  JOIN user_tel ON user_tel.user_id=user.user_id
        where offer.vendor_user_id=$user_id AND offer.transaction_flag=1 AND crop.crop_type LIKE :crops";

        $st = $this->db->prepare($st);
        $st->execute(array(
            'crops' => "$crop_name%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxSearchAcceptedCropsid($farmer_user_id)
    {
        $user_id = Session::get('user_id');
        $st = "SELECT offer.*,selling_request.*,user.user_id,user.first_name,user.last_name,collecting_center.center_name,district.ds_name,crop.crop_type FROM offer
        JOIN selling_request ON selling_request.selling_req_id=offer.selling_req_id
        JOIN user ON user.user_id=selling_request.farmer_user_id
        JOIN harvest ON harvest.harvest_id=selling_request.harvest_id
        JOIN collecting_center ON collecting_center.center_id=harvest.center_id
        JOIN district ON district.district_id=collecting_center.district_id
        JOIN crop ON crop.crop_id=harvest.crop_id
        -- JOIN user_tel ON user_tel.user_id=user.user_id
        where offer.vendor_user_id=$user_id AND offer.transaction_flag=1 AND selling_request.farmer_user_id LIKE :farmer_user_id";

        $st = $this->db->prepare($st);
        $st->execute(array(
            'farmer_user_id' => "$farmer_user_id%"
        ));

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function ajxListCropReq($farmer_id) {
    //     $st = $this->db->prepare("
    //     SELECT harvest.*, crop.crop_type, crop.crop_varient, collecting_center.center_name, gramasewa_division.gs_name, harvest_month.month_name AS harvest_month, start_month.month_name AS start_month FROM `harvest` 
    //     JOIN crop On harvest.crop_id = crop.crop_id 
    //     JOIN collecting_center ON harvest.center_id = collecting_center.center_id
    //     JOIN gramasewa_division ON harvest.gs_id = gramasewa_division.gs_id
    //     JOIN month as start_month ON start_month.month_id = harvest.starting_month_id
    //     JOIN month as harvest_month ON harvest_month.month_id = harvest.harvesting_month_id
    //     WHERE harvest.farmer_user_id = :farmer
    //     ");
    //     $st->execute(array(
    //         ':farmer' => $farmer_id
    //     ));
    //     return $st->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function AllCrops() {
        $st = $this->db->prepare("
        SELECT crop.crop_type, selling_request.*, divisional_secratariast.ds_name FROM selling_request 
JOIN harvest ON selling_request.harvest_id=harvest.harvest_id
JOIN crop ON harvest.crop_id=crop.crop_id
JOIN gramasewa_division ON harvest.gs_id=gramasewa_division.gs_id
JOIN divisional_secratariast ON gramasewa_division.ds_id = divisional_secratariast.ds_id
        ");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    ////////////////////////////////functions of sent offers//////////////////////////////////////////////////////
    public function SearchCrops($crop_name)
    {
        $st = $this->db->prepare("SELECT offer.*, selling_request.*,collecting_center.center_name, crop.crop_type FROM selling_request
        JOIN offer ON selling_request.selling_req_id=offer.selling_req_id
        JOIN user ON selling_request.farmer_user_id = user.user_id
        JOIN harvest ON user.user_id = harvest.farmer_user_id
        JOIN crop ON harvest.crop_id = crop.crop_id
        JOIN collecting_center ON harvest.center_id = collecting_center.center_id where offer.vendor_user_id = :id AND crop.crop_type LIKE :crops group by offer.offer_id" );
        
        $st->execute(array(
            ':id' => Session::get('user_id'),
            ':crops' => $crop_name
        ));
        return $st->fetchAll();
    }

    public function SearchCollectingCenter($center_name)
    {
        $st = $this->db->prepare("SELECT offer.*, selling_request.*,collecting_center.center_name, crop.crop_type FROM selling_request
        JOIN offer ON selling_request.selling_req_id=offer.selling_req_id
        JOIN user ON selling_request.farmer_user_id = user.user_id
        JOIN harvest ON user.user_id = harvest.farmer_user_id
        JOIN crop ON harvest.crop_id = crop.crop_id
        JOIN collecting_center ON harvest.center_id = collecting_center.center_id where offer.vendor_user_id = :id AND collecting_center.center_name LIKE :center group by offer.offer_id" );
        
        $st->execute(array(
            ':id' => Session::get('user_id'),
            ':center' => $center_name
        ));
        return $st->fetchAll();
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Add after slove conflicts
    public function myOffers($id)
    {
        $st = $this->db->prepare("SELECT offer.*, crop.*, selling_request.*, collecting_center.* FROM offer
        JOin selling_request ON selling_request.selling_req_id = offer.selling_req_id
        JOIN harvest ON harvest.harvest_id = selling_request.harvest_id
        JOIN crop ON crop.crop_id = harvest.crop_id
        JOIN collecting_center ON collecting_center.center_id = harvest.center_id" );
        
        $st->execute(array(
            ':id' => $id
        ));
        return $st->fetchAll();
    }

    public function updateOffer($data)
    {
        $st = $this->db->prepare('UPDATE offer SET `offer_amount` = :amount WHERE offer_id = :reqid');
        $st->execute(array(
            ':reqid' => $data['reqid'],
            ':amount' => $data['amount'],
        ));
        return $st->fetchAll();
    }

    public function undoOffer($data)
    {
        $st = $this->db->prepare('DELETE FROM offer WHERE offer_id = :id');
        $st->execute(array(
            ':id' => $data['offer_id']
        ));
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //weight offer sorting
    // public function SortWeightOffer($WO)
    // {
    //     $st = $this->db->prepare("SELECT offer.*, selling_request.*,collecting_center.center_name, crop.crop_type FROM selling_request
    //     JOIN offer ON selling_request.selling_req_id=offer.selling_req_id
    //     JOIN user ON selling_request.farmer_user_id = user.user_id
    //     JOIN harvest ON user.user_id = harvest.farmer_user_id
    //     JOIN crop ON harvest.crop_id = crop.crop_id
    //     JOIN collecting_center ON harvest.center_id = collecting_center.center_id where offer.vendor_user_id = :id order by selling_request.harvest_amount ASC" );
        
    //     $st->execute(array(
    //         ':id' => Session::get('user_id'),
    //         ':center' => $center_name
    //     ));
    //     return $st->fetchAll();
    // public function ajxSortAcceptedCrops($filter, $ascOrDsc)
    // {
    //     $user_id = Session::get('user_id');

    //     if ($ascOrDsc == 'ASC') {
    //         $det = "SELECT offer.*,selling_request.*,user.user_id,user.first_name,user.last_name,collecting_center.center_name,district.ds_name,crop.crop_type FROM offer
    //         JOIN selling_request ON selling_request.selling_req_id=offer.selling_req_id
    //         JOIN user ON user.user_id=selling_request.farmer_user_id
    //         JOIN harvest ON harvest.harvest_id=selling_request.harvest_id
    //         JOIN collecting_center ON collecting_center.center_id=harvest.center_id
    //         JOIN district ON district.district_id=collecting_center.district_id
    //         JOIN crop ON crop.crop_id=harvest.crop_id
    //         -- JOIN user_tel ON user_tel.user_id=user.user_id
    //         where offer.vendor_user_id=$user_id AND offer.transaction_flag=1  ORDER BY offer.$filter ASC";
    //         //  JOIN crop ON crop.crop_id=harvest.crop_id ORDER BY selling_request.$filter ASC";
    //     }

    //     if ($ascOrDsc == 'DESC') {
    //         $det = "SELECT offer.*,selling_request.*,user.user_id,user.first_name,user.last_name,collecting_center.center_name,district.ds_name,crop.crop_type FROM offer
    //         JOIN selling_request ON selling_request.selling_req_id=offer.selling_req_id
    //         JOIN user ON user.user_id=selling_request.farmer_user_id
    //         JOIN harvest ON harvest.harvest_id=selling_request.harvest_id
    //         JOIN collecting_center ON collecting_center.center_id=harvest.center_id
    //         JOIN district ON district.district_id=collecting_center.district_id
    //         JOIN crop ON crop.crop_id=harvest.crop_id
    //         -- JOIN user_tel ON user_tel.user_id=user.user_id
    //         where offer.vendor_user_id=$user_id AND offer.transaction_flag=1  ORDER BY offer.$filter ASC";
    //     }

    //     $st = $this->db->prepare($det);
    //     $st->execute();
    //     // print_r($st->fetchAll);
    //     return $st->fetchAll(PDO::FETCH_ASSOC);
    // }
}
