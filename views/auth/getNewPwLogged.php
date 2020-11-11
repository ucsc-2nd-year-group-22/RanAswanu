<div class="main-form">
    <form action="<?=URL;?>auth/updatePwlogged" method="post">
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
                <input type="password" name="newPw" placeholder="Type your new password here">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Repeat new password</label>
            </div>
            <div class="col-75">
                <input type="password" name="newPwRepeat" placeholder="Type your new password again here">
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