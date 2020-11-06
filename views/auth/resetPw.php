<h2 style="text-align:center;"> Reset your password </h2>
<p style="text-align:center;padding-bottom:20px;"> An e-mail will be send to you with instructions on how to reset your password. </p>
<!-- This is not good. Better to use sessions or jquery for the validation -->
<!-- alert box -->
<?php if(isset($_GET['reset'])): ?>
<div class="alert-box">

    <?php if($_GET['reset'] == "success"): ?>
        <?php echo '<p class="danger-alert"> Check your inbox. A verification link has been sent to your e-mail.</p>'; ?>
    <?php endif; ?>
    <?php if($_GET['reset'] == "empty"): ?>
        <?php echo '<p class="danger-alert"> Empty email !</p>'; ?>
    <?php endif; ?>
    <?php if($_GET['reset'] == "invalid"): ?>
        <?php echo '<p class="danger-alert">Sorry ! The e-mail address you entered is not in our system. Please check your e-mail address. </p>'; ?>
    <?php endif; ?>

</div>
<?php endif; ?>
<!-- end of alert -->


<div class="main-form">
    <form action="<?=URL;?>auth/resetRq" method="post">
        <div class="row">
            
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Email address</label>
            </div>
            <div class="col-75">
                <input type="email" id="email" name="email" placeholder="Enter your e-mail address  ">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
               <button type="submit" name="resetRqSubmit"> Recieve New Password By Mail </button>
            </div>
        </div>
    </form>
</div>