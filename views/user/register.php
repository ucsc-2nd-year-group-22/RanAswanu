<script src="<?php echo URL;?>views/user/js/default.js"></script>

<div class="subHeader">
<?php if(Session::get('role')== 'admin'):?>
    <h1>Admin & Officer Registration</h1>
<?php elseif(Session::get('role') == 'officer'): ?>
    <h1>Farmer Registration</h1>
<?php else: ?>
    <h1>Vendor Registration</h1>
<?php endif ?>
</div>

<!-- FORM -->
<div class="main-form">
    <div id="errors" class="error"></div>
    
    <form action="<?= URL;?>/user/create" onsubmit="return CheckPassword()" method="post">
        <div class="row">
            <div class="col-25">
            <label for="fname">First name</label>
            </div>
            <div class="col-75">
            <input type="text" id="first_name" name="first_name" required placeholder="ex: Wasantha">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="lname">Last name</label>
            </div>
            <div class="col-75">
            <input type="text" id="last_name" name="last_name" required placeholder="ex: Jayawardana">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="login">User name</label>
            </div>
            <div class="col-75">
            <input type="text" id="user_name" name="user_name" required placeholder="ex: wasantha123">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="password">Password</label>
            </div>
            <div class="col-75">
            <input type="password" id="password" name="password" required placeholder="ex: w@$@nth!">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="nic">NIC number</label>
            </div>
            <div class="col-75">
            <input type="text" id="nic" name="nic" required placeholder="ex: 123456789V">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="tel">Telephone Number</label>
            </div>
            <div class="col-75">
            <input style="width:50%;float:left" type="text" id="tel_no_1" name="tel_no_1" required placeholder="* Required">
            <input style="width:50%" type="text" id="tel_no_2" name="tel_no_2" placeholder="Optional">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="email">Email Address</label>
            </div>
            <div class="col-75">
            <input type="email" id="email" name="email" placeholder="ex: wasantha@gmail.com (if available)..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="dob">Date of birth</label>
            </div>
            <div class="col-75">
            <input type="date" id="dob" name="dob" required placeholder="Month/Date/Year ">
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
                <input type="text" id="address" name="address" required placeholder="ex: No. 32, Atha watunu wava, Horawpathana">
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
            <?php if(Session::get('role') == 'admin'):?>
                <option value="admin">Admin</option>
                <option value="officer">Officer</option>
            <?php elseif(Session::get('role') == 'officer'): ?>
                <option value="farmer">Farmer</option>
            <?php else: ?>
                <option value="vendor" >Vendor</option>
            <?php endif ?>
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