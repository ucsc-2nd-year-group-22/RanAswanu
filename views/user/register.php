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
    <form action="<?= URL;?>/user/create" method="post">
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
            <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
            <input type="text" id="lname" name="lastname" placeholder="ex: Jayawardana">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="nic">NIC Number</label>
            </div>
            <div class="col-75">
            <input type="text" id="nic" name="nic" placeholder="ex: 123456789V">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="tel">Telephone Number</label>
            </div>
            <div class="col-75">
            <input type="text" id="tel" name="tel" placeholder="ex: 0123456789">
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
            <label for="dob">Birthday</label>
            </div>
            <div class="col-75">
            <input type="date" id="dob" name="dob" placeholder="Month/Date/Year ">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="sex">Gender</label>
            </div>
            <div class="col-75">
            <select id="sex" name="sex">
                <option value="none">None</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="province">Province</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">
                <option value="Nothern">Nothern</option>
                <option value="North Western">North Western</option>
                <option value="Western">Western</option>
                <option value="North Central">North Central	</option>
                <option value="Central">Central</option>
                <option value="Sabaragamuwa">Sabaragamuwa</option>
                <option value="Eastern">Eastern</option>
                <option value="Uva">Uva</option>
                <option value="Southern">Southern</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="district">District</label>
            </div>
            <div class="col-75">
            <select id="district" name="district">
                <option value="Kalutara">Kalutara</option>
                <option value="Anuradhapura">Anuradhapura</option>
                <option value="Polonnaruwa">Polonnaruwa</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Matale">Matale</option>
                <option value="Kandy">Kandy</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Kegalle">Kegalle</option>
                <option value="Ratnapura">Ratnapura</option>
                <option value="Hambantota">Hambantota</option>
                <option value="Matara">Matara</option>
                <option value="Galle">Galle</option>
                <option value="Trincomalee">Trincomalee</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Kurunegala">Kurunegala</option>
                
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="grama">Gramasewa Division</label>
            </div>
            <div class="col-75">
            <select id="grama" name="grama">
                <option value="Kurudupoththa">Kurudupoththa</option>
                <option value="Parakandeniya">Parakandeniya</option>
                <option value="Mahiyanganaya">Mahiyanganaya</option>
                <option value="Udawela">Udawela</option>
                <option value="Kahatagasdeigiliya">Kahatagasdeigiliya</option>
                <option value="Horowpathana">Horowpathana</option>
                <option value="Ambewela">Ambewela</option>
                <option value="Haten">Haten</option>
                <option value="Kalmune">Kalmune</option>

            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="address">Address</label>
            </div>
            <div class="col-75">
                <input type="text" id="address" name="address" placeholder="ex: No. 32, Atha watunu wava, Horawpathana">
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
            <label for="login">User Name</label>
            </div>
            <div class="col-75">
            <input type="text" id="login" name="login" placeholder="ex: wasantha123">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="password">Password</label>
            </div>
            <div class="col-75">
            <input type="password" id="password" name="password" placeholder="ex: w@$@nth!">
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