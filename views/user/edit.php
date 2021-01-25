
<script src="<?php echo URL;?>views/user/js/default.js"></script>

<div class="subHeader">
<?php if(Session::get('role')== 'admin'):?>
    <?php if($userData['role'] == 'vendor'){  ?>
        <h1><i class="fas fa-user-edit"></i> View vendor</h1>
    <?php }else{ ?>
        <h1><i class="fas fa-user-edit"></i> Admin & Officer Edit</h1>
    <?php } ?>
<?php elseif(Session::get('role') == 'officer'): ?>
    <?php if(Session::get('user_id') == $id): ?>
        <h1><i class="fas fa-user-edit"></i> Edit My Profile</h1>
    <?php else:?>
        <h1><i class="fas fa-user-edit"></i> Edit Farmer</h1>
    <?php endif;?>
<?php else: ?>
    <h1><i class="fas fa-user-edit"></i> Edit vendor</h1>
<?php endif ?>
</div>

<div class="main-form">
    <div id="errors" class="error"></div>

    <form action="<?=URL;?>user/editSave/<?php echo $userData['user_id']; ?>" onsubmit="return CheckPassword()" method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">First Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="firstname" value="<?=$userData['first_name']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
            <input type="text" id="lname" name="lastname"  value="<?=$userData['last_name']; ?>" ">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="login">Username</label>
            </div>
            <div class="col-75">
            <input type="text" id="login" name="login" value="<?php echo $userData['user_name']; ?>">
            </div>
        </div>
        <?php if(Session::get('id') == $id): ?>
        <div class="row">
            <div class="col-25">
            <label for="login">Passowrd</label>
            </div>
            <div class="col-75">
            <a class="mini-button" href="<?php echo URL . 'auth/getNewPwLogged/' . $id ;?>">Update password</a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-25">
            <label for="nic">NIC Number</label>
            </div>
            <div class="col-75">
            <input type="text" id="nic" name="nic" value="<?=$userData['nic']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="tel">Telephone Number</label>
            </div>
            <div class="col-75">
            <input type="text" id="tel" name="tel" value="<?=$userTel[0]; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="email">Email Address</label>
            </div>
            <div class="col-75">
            <input type="email" id="email" name="email" value="<?=$userData['email']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="dob">Birthday</label>
            </div>
            <div class="col-75">
            <input type="date" id="dob" name="dob" value="<?=$userData['dob']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="sex">Gender</label>
            </div>
            <div class="col-75">
                <select id="sex" name="sex">
                    <option value="none" <?php if($userData['sex'] == 'none') echo 'selected'; ?>>None</option>
                    <option value="male" <?php if($userData['sex'] == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if($userData['sex'] == 'female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="province">Province</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">

                <?php foreach ($allProvinces as $provinceItem): ?>
                    <option value="<?= $provinceItem['province_id']?>"      <?php if($userLocationData['province_name'] == $provinceItem['province_name']) echo 'selected'; ?> > <?php echo $provinceItem['province_name']; ?></option>
                <?php endforeach; ?>

            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="district">District</label>
            </div>
            <div class="col-75">
            <select id="district" name="district">

                <?php foreach ($allDistricts as $districtItem): ?>
                    <option value="<?= $districtItem['district_id']?>"      <?php if($userLocationData['ds_name'] == $districtItem['ds_name']) echo 'selected'; ?> > <?= $districtItem['ds_name']?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="grama">Gramasewa Division</label>
            </div>
            <div class="col-75">
            <select id="grama" name="grama">

                <?php foreach ($allGrama as $gramaItem): ?>
                    <option value="<?= $gramaItem['gs_id']?>"      <?php if($userLocationData['gs_name']== $gramaItem['gs_name']) echo 'selected'; ?> > <?= $gramaItem['gs_name']?></option>
                <?php endforeach; ?>

            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="address">Address</label>
            </div>
            <div class="col-75">
                <input type="text" id="address" name="address" value="<?=$userData['address']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="role">Role</label>
            </div>
            <div class="col-75">
            <select id="role" name="role" >
            <?php if(Session::get('user_id') == $id): ?>
                <option value="<?php echo Session::get('role');?>"><?php echo Session::get('role');?></option>
            <?php else:?>
                <?php if(Session::get('role') == 'admin'):?>
                    <option value="admin" <?php if($userData['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="officer" <?php if($userData['role'] == 'officer') echo 'selected'; ?>>Officer</option>
                    <option value="vendor" <?php if($userData['role'] == 'vendor') echo 'selected'; ?>>Vendor</option>
                <?php elseif(Session::get('role') == 'officer'): ?>
                    <option value="farmer" <?php if($userData['role'] == 'farmer') echo 'selected'; ?>>Farmer</option>
                <?php else: ?>
                    <option value="vendor" <?php if($userData['role'] == 'vendor') echo 'selected'; ?>>Vendor</option>
                <?php endif; ?>
            <?php endif; ?>
            </select>
            </div>
        </div>
        
        <!-- <div class="row">
            <div class="col-25">
            <label for="password">Password</label>
            </div>
            <div class="col-75">
            <input type="password" id="password" name="password" placeholder="new password">
            </div>
        </div> -->
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
                <?php if($userData['role'] == 'vendor' && Session::get('role') == 'vendor'):?>
                    <input type="submit" value="Update">
                <?php elseif($userData['role'] != 'vendor'): ?>
                    <input type="submit" value="Update">
                <?php endif ?>
            </div>
        </div>
    </form>
</div>