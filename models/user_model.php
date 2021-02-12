<?php 

class User_Model extends Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function userList() {
        $st = $this->db->prepare("SELECT id, login, role FROM users");
        $st->execute();
        return $st->fetchAll();
    }

    public function checkUserName($user_name) {
        
        $getUserId = $this->db->prepare("SELECT user_id FROM user WHERE user_name = '$user_name'");
        $getUserId->execute();
        $userID = $getUserId->fetch(PDO::FETCH_COLUMN);
        // echo $user_name . '/'. $userID;
        // print_r($getUserId);
        if($userID != 0) {
            return $userID;
        } else {
            return 0;
        }

    }

    //register new user into the  database user table
    public function create($data){  

        $createUser = $this->db->prepare("INSERT INTO `user`(`user_name`, `nic`, `first_name`, `last_name`, `gs_id`, `sex`, `is_blocked`, `address`, `role`, `dob`, `email`, `user_registered_time`, `password`, `isadmin`)
        VALUES (:user_name, :nic, :first_name, :last_name, :gs_id, :sex, :is_blocked, :address, :role, :dob, :email, current_timestamp(), :password, :isadmin)");

        // Need to sanitize
        $createUser->execute(array(
            ':user_name' => $data['user_name'],
            ':nic' => $data['nic'], 
            ':first_name' => $data['first_name'], 
            ':last_name' => $data['last_name'], 
            ':gs_id' => $data['grama'],
            ':sex' => $data['sex'], 
            ':is_blocked' => $data['is_blocked'], 
            ':address' => $data['address'], 
            ':role' => $data['role'], 
            ':dob' => $data['dob'], 
            ':email' => $data['email'],
            ':password' => MD5($data['password']),
            ':isadmin' => $data['isadmin']
        ));


        $userID = $this->checkUserName($data['user_name']);
        // echo '<b>' . $userID. '</b>';
    
        $telNos = array($data['tel_no_1'], $data['tel_no_2']);
        foreach ($telNos as $tel) {
            if(!empty($tel)) {
                echo $tel . ',';
                $insertTelNos = $this->db->prepare("INSERT INTO `user_tel`(`user_id`, `tel_no`) VALUES (:user_id, :tel)");
                $insertTelNos->execute(array(
                    ':user_id' => $userID,
                    ':tel' => $tel
                ));
            }
        }
        

    }


   

    //update the user data in the database 
    public function editSave($data){
        print_r($data);
        $stmt = $this->db->prepare("UPDATE user SET first_name = :first_name, last_name = :last_name, user_name = :user_name, nic = :nic, email = :email, dob = :dob, sex = :sex, gs_id = :gs_id, address = :address, role = :role WHERE user_id = :user_id");
       
        $stmt->execute(array(
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':user_name' => $data['user_name'],
            ':nic' => $data['nic'],
            ':email' => $data['email'],
            ':dob' => $data['dob'],
            ':sex' => $data['sex'],
            ':gs_id' => $data['grama'],
            ':address' => $data['address'],
            ':role' => $data['role'],
            ':user_id' => $data['user_id']
        ));

        echo '<hr>';
        $userID = $data['user_id'];
        $telNos = array($data['tel_no_1'], $data['tel_no_2']);
        $oldTels = array($data['old-tel-1'], $data['old-tel-2']);
        foreach (array_combine($telNos, $oldTels) as $tel => $oldTel) {
            if(!empty($tel)) {
                // echo $tel . ', ' .  $oldTel . ', ' . '<br>';

                $insertTelNos = $this->db->prepare("UPDATE `user_tel` SET `tel_no` = :tel WHERE `user_tel`.`user_id` = :user_id AND `user_tel`.`tel_no` =  :oldTel");
                $insertTelNos->execute(array(
                    ':user_id' => $userID,
                    ':tel' => $tel,
                    ':oldTel' => $oldTel
                ));
            }
        }
       

        echo '<hr>' . $stmt->rowCount() . '<hr>';
        print_r($stmt);

    }

    public function delete($id){
        
        $st = $this->db->prepare('DELETE FROM user WHERE user_id = :id');
        $st->execute(array(
            ':id' => $id
        ));
    }

    //make user logged into the system
    public function loginto() {
        $st = $this->db->prepare("SELECT user_id, role, isadmin, first_name FROM user WHERE user_name = :user_name AND password = MD5(:password) ");
        $st->execute(array(
            ':user_name' => $_POST['user_name'],
            ':password' => $_POST['password']
        ));
        $data = $st->fetch();
        // echo 'hello';
        // print_r($data);

        $count = $st->rowCount();
        if($count > 0) {
            // login
            Session::init();
            Session::set('user_id', $data['user_id']);
            Session::set('first_name', $data['first_name']);
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            Session::set('isadmin', $data['isadmin']);

            // echo Session::get('role');

            if(!empty($_POST['remember'])) {
                setcookie("member_login", $_POST['user_name'], time() + (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE['member_login'])) {
                    setcookie("member_login", "");
                }
            }

            switch (Session::get('role')) {
                case 'officer':
                    header('location: ' . URL . 'officer/cropReq');
                    break;
    
                case 'admin':
                    header('location: ' . URL . 'admin/');
                    break;
                
                case 'farmer':
                    header('location: ' . URL . 'farmer/sellyourcropsif');
                    break;

                case 'vendor':
                    header('location: ' . URL . 'vendor');
                    break;
            }

        } else {
            // show error
            Session::set('alert', 'Username or password is incorrect !');
            header('location: login');
        }
        
    }

    //fetching a single user
    public function userSingleList($user_id){
        
        $getUserSql = $this->db->prepare("SELECT * FROM user WHERE user_id = :user_id");
        $getUserSql->execute(array(
            ':user_id' => $user_id,
        ));

        $getTel = $this->db->prepare("SELECT `user_tel`.`tel_no` FROM `user_tel` JOIN `user` ON `user_tel`.`user_id` = `user`.`user_id` WHERE `user`.`user_id` = :user_id");
        $getTel->execute(array(
            ':user_id' => $user_id,
        ));

        $getLocationData = $this->db->prepare(
            "SELECT gramasewa_division.gs_name, divisional_secratariast.ds_name AS div_name, district.ds_name, province.province_name FROM gramasewa_division 
            JOIN user on user.gs_id = gramasewa_division.gs_id 
            JOIN divisional_secratariast on gramasewa_division.ds_id = divisional_secratariast.ds_id
            JOIN district on divisional_secratariast.district_id = district.district_id
            JOIN province on province.province_id = district.province_id
            WHERE user.user_id = :user_id;");
        $getLocationData->execute(array(
            ':user_id' => $user_id,
        ));
       
        $data['locationData'] = $getLocationData->fetch();
        $data['user'] = $getUserSql->fetch(PDO::FETCH_ASSOC);
        $data['userTel'] = $getTel->fetchAll(PDO::FETCH_COLUMN);        // FETCH_CULUMN : To return an array that contains a single column from all of the remaining rows in the result set
        // https://www.ibm.com/support/knowledgecenter/SSEPGG_11.5.0/com.ibm.swg.im.dbclient.php.doc/doc/t0023505.html

        // print_r($data['locationData']);
        // echo "<hr> " .  $data['locationData']['province_name'];
        return $data;
    }

    public function ajxGetProvinces() {
        $st = $this->db->prepare("SELECT province_name FROM province");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxGetDistricts($province) {
        $st = $this->db->prepare("SELECT district.ds_name FROM district JOIN province ON province.province_id = district.province_id WHERE province.province_name = '$province'");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajxGetDivSec($province) {
        $st = $this->db->prepare("SELECT district.ds_name FROM district JOIN province ON province.province_id = district.province_id WHERE province.province_name = '$province'");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

} 
