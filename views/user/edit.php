
<script src="<?php echo URL;?>views/user/js/default.js"></script>
<?php
$userData = $this->user['user'];
$oldUserTel = $this->user['userTel'];
$locationData = $this->user['locationData'];

// print_r($oldUserTel);
// if(isset($oldUserTel[1])) echo '2 set'; 

?>
<div class="subHeader">
<?php if(Session::get('role') == 'admin'):?>
    <?php if($userData['role'] == 'vendor'): ?>
        <h1><i class="fas fa-user-edit"></i> View vendor</h1>
    <?php else: ?>
        <h1><i class="fas fa-user-edit"></i> Admin & Officer Edit</h1>
    <?php endif; ?>
<?php elseif(Session::get('role') == 'officer'): ?>
    <?php if(Session::get('user_id') == $user_id): ?>
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
            <label for="fname">First name</label>
            </div>
            <div class="col-75">
                <input type="text" id="first_name" name="first_name" required value="<?= $userData['first_name']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="lname">Last name</label>
            </div>
            <div class="col-75">
            <input type="text" id="last_name" name="last_name" required value="<?= $userData['last_name']; ?>" >
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="login">User name</label>
            </div>
            <div class="col-75">
            <input type="text" id="user_name" name="user_name" required value="<?= $userData['user_name']; ?>" >
            </div>
        </div>
        <?php if(Session::get('user_id') == $user_id): ?>
        <div class="row">
            <div class="col-25">
            <label for="login">Passowrd</label>
            </div>
            <div class="col-75">
            <a class="mini-button" href="<?php echo URL . 'auth/getNewPwLogged/' . $user_id ;?>">Update password</a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-25">
            <label for="nic">NIC number</label>
            </div>
            <div class="col-75">
            <input type="text" id="nic" name="nic" required value="<?= $userData['nic']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="tel">Telephone Number</label>
            </div>
            <div class="col-75">
            <input style="width:50%;float:left" type="text" id="tel_no_1" name="tel_no_1" required value="<?= $oldUserTel[0]; ?>">
            <input style="width:50%" type="text" id="tel_no_2" name="tel_no_2" value="<?php if(isset($oldUserTel[1])) echo $oldUserTel[1]; ?>">
            <input type="hidden" name="old-tel-1" value="<?= $oldUserTel[0]; ?>"></input>
            <input type="hidden" name="old-tel-2" value="<?= $oldUserTel[1]; ?>"></input>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="email">Email Address</label>
            </div>
            <div class="col-75">
            <input type="email" id="email" name="email" value="<?= $userData['email']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="dob">Date of birth</label>
            </div>
            <div class="col-75">
            <input type="date" id="dob" name="dob" required value="<?= $userData['dob']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="sex">Gender</label>
            </div>
            <div class="col-75">
            <select id="sex" name="sex">
                <option value="other">Other</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="address">Address</label>
            </div>
            <div class="col-75">
                <input type="text" id="address" name="address" required value="<?= $userData['address']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="province">Province</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">
                <?php $provinces = [
                    '1-western',
                    'North Western',
                    'North Central',
                    'Central',
                    'Sabaragamuwa',
                    'Eastern',
                    'Uva',
                    'Southern'
                ]; ?>
                <?php foreach ($provinces as $provinceItem): ?>
                    <option value="<?= $provinceItem?>" > <?= $provinceItem?> </option>
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
                <?php $districts = [
                    '1-Gampaha',
                    'Anuradhapura',
                    'Polonnaruwa',
                    'Gampaha',
                    'Matale',
                    'Kandy',
                    'NuwaraEliya',
                    'Kegalle',
                    'Ratnapura',
                    'Hambantota',
                    'Matara',
                    'Galle',
                    'Trincomalee',
                    'Jaffna',
                    'Kurunegala'
                ]; ?>

                <?php foreach ($districts as $districtItem): ?>
                    <option value="<?= $districtItem?>" > <?= $districtItem?> </option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="province">Divisional secratariast</label>
            </div>
            <div class="col-75">
            <select id="div_sec" name="div_sec">
                <?php $div_secs = [
                    '1-Gampaha',
                    'Dompe',
                    'ds-3',
                    'ds-4',
                    'ds-5'
                ]; ?>
                <?php foreach ($div_secs as $div_secItem): ?>
                    <option value="<?= $div_secItem?>" > <?= $div_secItem?> </option>
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
                <?php $gramas = [
                   '5- Parakandeniya',
                   'Parakandeniya',
                   'Mahiyanganaya',
                   'Udawela',
                   'Kahatagasdeigiliya',
                   'Horowpathana',
                   'Ambewela',
                   'Haten',
                   'Kalmune'
                ]; ?>

                <?php foreach ($gramas as $gramaItem): ?>
                    <option value="<?= $gramaItem?>" > <?= $gramaItem?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>

        
        <div class="row">
            <div class="col-25">
            <label for="role">Role</label>
            </div>
            <div class="col-75">
            <select id="role" name="role">
            <?php if(Session::get('user_id') == $user_id): ?>
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

        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
            <button type="submit"><i class="fas fa-handshake"></i> Register </button>
            </div>
        </div>
    </form>
    


</div>

