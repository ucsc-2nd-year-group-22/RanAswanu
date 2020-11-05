<h2> Reset Password </h2>

<div class="main-form">
    <form action="<?=URL;?>user/checkemail" method="post">
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
    <?php 
        if(isset($_GET['reset'])) {
            if($_GET['reset'] == "success") {
                echo '<p> check your eamil</p>';
            }
        }
    ?>
</div>