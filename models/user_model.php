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

    //register new user into the  database user table
    public function create($data){  
        $st = $this->db->prepare("INSERT INTO users (`firstname`, `lastname`, `login`, `password`, `role`, `isadmin`, `nic`, `tel`, `email`, `dob`, `sex`, `province`, `district`, `grama`, `address`) VALUES (:firstname, :lastname, :login, :password, :role, :isadmin, :nic, :tel, :email, :dob, :sex, :province, :district, :grama, :address)");
        $st->execute(array(
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':login' => $data['login'],
            ':password' => MD5($data['password']),
            ':role' => $data['role'],
            ':isadmin' => $data['isadmin'],
            ':nic' => $data['nic'],
            ':tel' => $data['tel'],
            ':email' => $data['email'],
            ':dob' => $data['dob'],
            ':sex' => $data['sex'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':grama' => $data['grama'],
            ':address' => $data['address'],
        ));
    }

    //update the user data in the database 
    public function editSave($data){
        // print_r($data);
        $stmt = $this->db->prepare("UPDATE users SET 
            `firstname` = :firstname, 
            `lastname` = :lastname,
            `login` = :login,
            `nic` = :nic,
            `tel` = :tel,
            `email` = :email,
            `dob` = :dob,
            `sex` = :sex,
            `province` = :province,
            `district` = :district,
            `grama` = :grama,
            `address` = :address,
            `role` = :role
        WHERE `id` = :id");

        $stmt->execute(array(
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':login' => $data['login'],
            ':nic' => $data['nic'],
            ':tel' => $data['tel'],
            ':email' => $data['email'],
            ':dob' => $data['dob'],
            ':sex' => $data['sex'],
            ':province' => $data['province'],
            ':district' => $data['district'],
            ':grama' => $data['grama'],
            ':address' => $data['address'],
            ':role' => $data['role'],
            ':id' => $data['id']
        ));

    }

    public function delete($id){
        $st = $this->db->prepare('DELETE FROM users WHERE id = :id');
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
        $data['user'] = $getUserSql->fetch();
        $data['userTel'] = $getTel->fetchAll(PDO::FETCH_COLUMN);        // FETCH_CULUMN : To return an array that contains a single column from all of the remaining rows in the result set
        // https://www.ibm.com/support/knowledgecenter/SSEPGG_11.5.0/com.ibm.swg.im.dbclient.php.doc/doc/t0023505.html

        // print_r($data['locationData']);
        // echo "<hr> " .  $data['locationData']['province_name'];
        return $data;
    }

} 