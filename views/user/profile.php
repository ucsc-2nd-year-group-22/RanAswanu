<h1><i class="fas fa-address-card"></i> <?php if ($role == Session::get('role'))
     echo "My Profile";
     else echo "View Profile";?></h1>

<!-- <?php print_r($userData) ?> -->
<!-- <?php echo $role . " - " . Session::get('role'); ?> -->


<div class="main-form">
    <form action="<?php if ($role == Session::get('role')) echo URL . "user/edit/" . Session::get('id')?>" method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">First name</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['firstname'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Last name</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['lastname'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Login (Username)</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['login'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">User role</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['role'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Contact number</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['tel'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Address</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['address'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">e-mail</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['email'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">dob</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['dob'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Gender</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['sex'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Province</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['province'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Disttict</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['district'] ?></b></label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Gramasewa division</label>
            </div>
            <div class="col-75">
                <label><b> <?= $userData['grama'] ?></b></label>
            </div>
        </div>

        <?php if($role == Session::get('role')): ?>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
                <button type="submit"><i class="fas fa-user-edit"></i> Edit My Profile </button>
            </div>
        </div>
        
        <?php endif;?>

        <?php if(Session::get('role') == 'officer' && $role == 'farmer'): ?>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
                <a class="mini-button" href="<?php echo URL . 'user/edit/' . $id ;?>">Update farmer</a>
            </div>
        </div>
        <?php endif;?>
    </form>
</div>



