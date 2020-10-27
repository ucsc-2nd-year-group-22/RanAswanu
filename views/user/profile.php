<h1>View Profile</h1>

<?php print_r($userData) ?>

<hr>

<?php echo $role . " - " . Session::get('role'); ?>


<div class="main-form">
    <form action="<?= URL;?>/user/edit" method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">First Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="firstname" placeholder="ex: Wasantha">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
                <button type="submit"><i class="fas fa-user-edit"></i> Update </button>
            </div>
        </div>
    </form>
</div>