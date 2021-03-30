<?php

// Authenticaitn Module

class Auth extends Controller {

    public function __construct() {
        parent::__construct();

        $this->view->js = array('auth/js/default.js');
    }

    function resetPw() {
        $data = [];
        $this->view->rendor('auth/resetPw', $data);
    }

    function resetRq() {
        if(isset($_POST['resetRqSubmit'])) {    // User should access this section only using the form, not from the url
        
            $userEmail = $_POST['email'];
            
            if(!($userEmail)) {
                header("Location:".URL."auth/resetPw?reset=empty");
                exit(0);
            }
            $mailCheck = $this->model->checkEmail($userEmail);

            if($mailCheck == 0) {
                header("Location:".URL."auth/resetPw?reset=invalid");
                exit(0);
            }
            Session::set('email', $userEmail);

            // Avoid timing attacks by not using the same token
            $selector = bin2hex(random_bytes(8));

            // use for authentication
            $token = random_bytes(32);      // Longer the safer :)

            $url = URL . "auth/createNewPw/$selector/".bin2hex($token);
            // echo "<a href='$url'>$url</a>";

            // U => Toadys date in seconds since 1970
            $expires = date("U") + 600;        // expires in 10 minutes

            $this->model->deleteOldTokens($userEmail);
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $this->model->insertNewToken($userEmail, $selector, $hashedToken, $expires);

            // Send the link to the mail
            $mailbody = "<div style='background:#eee;font-size:1.2em;padding:10px;font-family:sans-serif;'>";
            $mailbody .= '<img src="https://i.ibb.co/PxCGB1W/logo.png" alt="logo" border="0" style="width:200px;margin:auto; width:200px;">';
            $mailbody .= "<p>We recievied a password reset request. The link to reset your password is below. If you did not make this request you can ignore this email.<p>";
            $mailbody .= "<a href='$url'>$url</a>";
            $mailbody .= "</div>";
            $mailInfo = [
                'body' => $mailbody,
                'subject' => 'Reset your password for Ran Aswanu',
                'address' => $userEmail,
            ];
            $mymail = new Email();
            $mymail->sendmail($mailInfo);
    
            header("Location: ".URL."auth/resetPw?reset=success");

        } else {
            header("Location: ".URL."user/login");
        }
    }

    function createNewPw($selector, $token) {

        if(empty($selector) || empty($token)) {
            echo "Could not validate your request !";
        } else {
            // check whether selector, token are proper hexadecimal format
            if(ctype_xdigit($selector) !== false && ctype_xdigit($token) !== false) {
                $data['validator'] = $token;
                $data['selector'] = $selector;
                // echo Session::get('email');
                $this->view->rendor('auth/createNewPw', $data);
                Session::unset('email');
            }          
        }   
    }

    function submitNewPw() {
        $data = [];

        if(isset($_POST['resetPwSubmit'])) {

            $selector = $_POST['selector'];
            $validator = $_POST['token'];
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
            $pwdRepeat = $_POST['pwdRepeat'];

            

            if(empty($pwd) || empty($pwdRepeat)) {
                // handle epmty pwd
                header("Location:".URL."auth/createNewPw/$selector/$validator?newpw=empty");
                exit();

            } else if ($pwd != $pwdRepeat) {
                // handle conflicting pwds
                header("Location:".URL."auth/createNewPw/$selector/$validator?newpw=notsame");
                exit();
            }

            $resetResult = $this->model->getPwSelector($selector, $validator);
            

            if($resetResult == 0) {
                echo 'not valid';
                // header("Location :".URL."auth/resetPw?reset=timeout");
                // header("Location:".URL."auth/resetPw?reset=timeout");
                exit(0);
            } else {
                echo 'goood';
            }

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $resetResult['pwdReset'] );

            if($tokenCheck === false) { // wrong credentials
                echo "Eroooor";
                exit();
            } elseif ($tokenCheck === true) {
                echo "hoy" . $_POST['email'];
                $userData = $this->model->checkEmail($email);
                $userId = $userData['user_id'];
                // print_r($userData);
                $this->model->updatePw($userId, $pwd);
                Session::set('alert', 'Your password has been reset!');
                header("Location:".URL."user/login");
            } 

        } else {
            header("Location :".URL);
        }

        // $this->view->rendor('user/resetPw', $data);
    }

    function getNewPwLogged($userId) {

        $data['user_id'] = $userId;
        $this->view->rendor('auth/getNewPwLogged', $data);

    }

    function updatePwLogged() {
        echo "Update<hr>";
       
        if(isset($_POST['updatePw'])) {
            
            $oldPw = $_POST['oldPw'];
            $newPw = $_POST['newPw'];
            $newPwRepeat = $_POST['newPwRepeat'];
            
            // Check old password
            $res = $this->model->checkUserPw($oldPw);
            if($res != 1) {
                Session::set('alert', 'Inavlid Password, Please enter your correct old password again !');
                header("Location:".URL."auth/getNewPwLogged/".Session::get('user_id'));
                exit(0);
            }

            // check newPw == newPwRepeat
            if($newPw != $newPwRepeat) {
                Session::set('alert', 'New password not match, Try again !');
                header("Location:".URL."auth/getNewPwLogged/".Session::get('user_id'));
                exit(0);
            }

            // All good
            $updateRes = $this->model->updatePwLogged($newPw, Session::get('user_id'));
            echo $updateRes;
            if($updateRes == 1) {
                Session::set('alert', 'Your password has been successfully updated !');
                header("Location:".URL."user/viewUser/".Session::get('user_id'));
                exit(0);
            } else {
                Session::set('alert', 'Password not updated ! Unidentified error happend!');
                header("Location:".URL."auth/getNewPwLogged/".Session::get('user_id'));
                exit(0);
            }
           
        }
    }

}