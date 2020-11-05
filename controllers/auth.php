<?php

// Authenticaitn Module

class Auth extends Controller {

    public function __construct() {
        parent::__construct();
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
            $expires = date("U") + 1800;        // 1 hour


            $this->model->deleteOldTokens($userEmail);
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $this->model->insertNewToken($userEmail, $selector, $hashedToken, $expires);

            // Send the link to the mail
            $mailbody = "<div style='background:#eee;font-size:1.2em;padding:10px;font-family:sans-serif;'>";
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
                echo Session::get('email');
                $this->view->rendor('auth/createNewPw', $data);
                Session::destroy();
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
                exit(0);
            }

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $resetResult['pwdReset'] );

            if($tokenCheck === false) { // wrong credentials
                echo "Eroooor";
                exit();
            } elseif ($tokenCheck === true) {
                echo "hoy $email";
                $userData = $this->model->checkEmail($email);
                $userId = $userData['id'];
                // print_r($userData);
                $this->model->updatePw($userId, $pwd);
            } 


        } else {
            header("Location :".URL);
        }

        // $this->view->rendor('user/resetPw', $data);
    }
}