<h2> Reset Password </h2>

<!-- This is not good. Better to use sessions or jquery for the validation -->
<!-- alert box -->
<?php if(isset($_GET['reset'])): ?>
<div class="alert-box">

    <?php if($_GET['reset'] == "success"): ?>
        <?php echo '<p class="danger-alert"> check your eamil</p>'; ?>
    <?php endif; ?>
    <?php if($_GET['reset'] == "empty"): ?>
        <?php echo '<p class="danger-alert"> Empty email !</p>'; ?>
    <?php endif; ?>
    <?php if($_GET['reset'] == "invalid"): ?>
        <?php echo '<p class="danger-alert"> Invalid Email </p>'; ?>
    <?php endif; ?>

</div>
<?endif; ?>
<!-- end of alert -->

<div class="main-form">
    <form action="<?=URL;?>auth/resetRq" method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">Email address</label>
            </div>
            <div class="col-75">
                <input type="email" id="email" name="email" placeholder="yourmail@org.com">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
               <button type="submit" name="resetRqSubmit"> Reset </button>
            </div>
        </div>
    </form>
</div>