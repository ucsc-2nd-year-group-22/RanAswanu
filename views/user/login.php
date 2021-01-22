<!-- Show error if set -->
<?php if(Session::get('alert')): ?>
  <div class="alert-box">
    <p class="danger-alert"><?php echo Session::get('alert'); ?> </p>
  </div>
<?php Session::unset('alert'); ?>
<?php endif; ?>

<div class="subHeader">
        <h1 class="login-header">Welcome</h1>
    </div>
    <div class="login">
      <form action="loginusr" method="POST">
        <div class="imgcontainer">
          <img src="<?= URL ?>public/img/logo.png" width="250px" >
        </div>
        <div class="col-center">
          <input type="text" placeholder="Enter Username" name="user_name" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required>
        </div>
        <div class="col-center">
          <input type="password" placeholder="Enter Password"  name="password" required>
        </div>
        <div class="col-center">
          <div class="col-half-left">
            <input type="checkbox" <?php if(isset($_COOKIE["member_login"])) echo "checked"; ?> name="remember" id="remember"> Remember me
          </div>
          <div class="col-half-right">
            <a href="<?= URL ?>auth/resetPw">Forgot Password ?</a>
          </div>
        </div>

        <div class="col-center">
          <button type="submit">Submit</button>
        </div>

      </form>
    </div>