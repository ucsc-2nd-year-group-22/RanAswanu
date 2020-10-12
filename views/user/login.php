<!-- <h1>Login</h1>
<form action="loginusr" method="POST">
    <label>Login</label>
    <input type="text" name="login">
    <br>
    <label>Password</label>
    <input type="password" name="password">
    <br>
    <input type="submit">
</form> -->

<div class="subHeader">
        <h1 class="login-header">Welcome</h1>
    </div>
    <div class="login">
      <form action="loginusr" method="POST">
        <div class="imgcontainer">
          <img src="<?= URL ?>public/img/logo.png" width="250px" >
        </div>
        <div class="col-center">
          <input type="text" placeholder="Enter Username" name="login" required>
        </div>
        <div class="col-center">
          <input type="password" placeholder="Enter Password"  name="password" >
        </div>
        <div class="col-center">
          <div class="col-half-left">
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </div>
          <div class="col-half-right">
            <a href="#">Forgot Password ?</a>
          </div>
        </div>

        <div class="col-center">
          <button type="submit">Submit</button>
        </div>

      </form>
    </div>