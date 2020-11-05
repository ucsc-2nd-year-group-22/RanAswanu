<h2> Create New Password </h2>
<?php echo $selector . '<br>' . $validator . '<br>'; ?>

<?php if(isset($_GET['newpw'])) {
    if($_GET['newpw']=='empty') {
        echo "empty pw";
    }
    if($_GET['newpw']=='notsame') {
        echo "not match";
    }
}
?>

<div class="main-form">
    <form action="<?=URL;?>user/submitNewPw" method="post">
    <!-- Hidden fields  -->
        <input type="hidden" name="selector" value="<?php echo $selector ?>">
        <input type="hidden" name="token" value="<?php echo $validator ?>">
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
                <label for="fname">Email address</label>
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