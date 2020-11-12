<script src="<?php echo URL;?>views/auth/js/default.js"></script>

<!-- Show error if set -->
<?php if(Session::get('alert')): ?>
  <div class="alert-box">
    <p class="danger-alert"><?php echo Session::get('alert'); ?> </p>
  </div>
<?php Session::unset('alert'); ?>
<?php endif; ?>

<div class="main-form">
    <div id="errors" class="error"></div>

    <form action="<?=URL;?>auth/updatePwlogged" onsubmit="return CheckPassword()" method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">Your old password</label>
            </div>
            <div class="col-75">
                <input type="password" name="oldPw" placeholder="Type your old password here">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">New password</label>
            </div>
            <div class="col-75">
                <input type="password" id="newPw" name="newPw" placeholder="Type your new password here">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Repeat new password</label>
            </div>
            <div class="col-75">
                <input type="password" id="confPw" name="newPwRepeat" placeholder="Type your new password again here">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
               <button type="submit" name="updatePw"> Update Password </button>
            </div>
        </div>
    </form>
</div>