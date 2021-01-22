<?php 

class Auth_Model extends Model {
    
    public function __construct() {
        parent::__construct();
        Session::init();
    }


    public function checkEmail($email) {
        $sql = "SELECT * FROM `user` WHERE `email` = :email;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            ':email' => $email,
        ));

        if($stmt->rowCount() == 0) {
            return 0;
        } else {
            return $stmt->fetch(); 
        }

    }

    public function deleteOldTokens($email) {
        
        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = :email;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            ':email' => $email
        ));
        if(!$stmt) {
            echo "errror";
        } else {
            // echo "nice";
        }

    }

    public function insertNewToken($email, $selector, $hashedToken, $expires) {

        echo "<hr>$email /$selector/ $hashedToken /$expires/ <br>";

        $sql = "INSERT INTO `pwdReset`(`pwdResetEmail`, `pwdResetSelector`, `pwdReset`, `pwdResetExpires`) VALUES (:pwdResetEmail, :pwdResetSelector, :pwdResetToken, :pwdResetExpires);";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            ':pwdResetEmail' => $email,
            ':pwdResetSelector'=> $selector,
            ':pwdResetToken' => $hashedToken,
            ':pwdResetExpires' => $expires
        ));

    }

    function getPwSelector($selector, $validator) {
        $currentDate = date("U");
        $sql = "SELECT * FROM `pwdReset` WHERE `pwdResetSelector` = :pwdResetSelector AND `pwdResetExpires` >= :currentDate ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            ':pwdResetSelector' => $selector,
            ':currentDate' => $currentDate
        ));

        $result = $stmt->fetch();
        // print_r($result);

        

        if($stmt->rowCount() == 0) {
            return 0;
        } else {
            return $result;
        }
    }

    function updatePw($userId, $password) {
        
        $sql = "UPDATE user SET `password` = :password WHERE `user_id` = :id";
        
        // $sql = "UPDATE `users` INNER JOIN `pwdReset` on `users.email` = `pwdReset.pwdResetEmail` SET `users.password` = :password WHERE `users.id` = :id AND `pwdReset.pwdResetExpires` >= :currentDate;";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(
            ':password' => MD5($password),
            ':id' => $userId
        ));

        if($stmt->rowCount() == 1) {
            echo "<br>success";

        }

    }

    function checkUserPw($pwd) {
        $userId = Session::get('id');
        $st = $this->db->prepare("SELECT user_id FROM user WHERE password = MD5(:password) AND user_id = :id ");
        $st->execute(array(
            'id' => $userId,
            ':password' => $pwd
        ));
        $data = $st->fetch();
        $count = $st->rowCount();

        return $count;

    }

    function updatePwLogged($newPw, $id) {

        $st = $this->db->prepare("UPDATE user SET password = MD5(:password) WHERE user_id = :id");
        $st->execute(array(
            ':password' => $newPw,
            ':id' => $id
        ));
        $count = $st->rowCount();

        return $count;

    }


}