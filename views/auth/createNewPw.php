<script src="<?php echo URL;?>views/auth/js/default.js"></script>

<h2> Create New Password </h2>
<!-- <?php echo $selector . '<br>' . $validator . '<br>'; ?> -->
<!-- This is not good. Better to use sessions or jquery for the validation -->
<!-- alert box -->
<?php if(isset($_GET['newpw'])) {
    if($_GET['newpw']=='empty') {
        echo "empty pw";
    }
    if($_GET['newpw']=='notsame') {
        echo "not match";
    }
}
?>
<!-- end of alert box -->
<div class="main-form">
    <div id="errors" class="error"></div>

    <form action="<?=URL;?>auth/submitNewPw" onsubmit="return resetPwdValidate()" method="post">
    <!-- Hidden fields  -->
        <input type="hidden" name="selector" value="<?php echo $selector ?>">
        <input type="hidden" name="token" value="<?php echo $validator ?>">
        <input type="hidden" name="email" value="<?php echo Session::get('email') ?>">

    <!-- ------- -->

        <div class="row">
            <div class="col-25">
                <label for="fname">New password</label>
            </div>
            <div class="col-75">
                <input type="password" name="pwd" placeholder="Type your new password here">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Repeat password</label>
            </div>
            <div class="col-75">
                <input type="password" name="pwdRepeat" placeholder="Type your new password again here">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
               <button type="submit" name="resetPwSubmit"> Reset Password </button>
            </div>
        </div>
    </form>
</div>