<!-- 
<h1>User Edit </h1>
<form action="<?php echo URL; ?>user/editSave/<?php echo $this->user['id']; ?>" method="post">
    <label for="login">Login</label><input type="text" name="login" value="<?php echo $this->user['login']; ?>"><br>
    <label for="password">Password</label><input type="text" name="password"><br>
    <label for="login">Role</label>
        <select name="role" id="role">
            <option value="admin" <?php if($this->user['role'] == 'admin') echo 'selected'; ?>>admin</option>
            <option value="farmer" <?php if($this->user['role'] == 'farmer') echo 'selected'; ?>>Farmer</option>
            <option value="officer" <?php if($this->user['role'] == 'officer') echo 'selected'; ?>>Officer</option>
        </select><br>
    <label for="submit">&nbsp</label>
    <input type="submit" name="submit" id="submitBtn">
</form> -->


<div class="subHeader">
<? if(Session::get('role')== 'admin'):?>
    <h1>Admin & Officer Edit</h1>
<? elseif(Session::get('role') == 'officer'): ?>
    <h1>Edit Farmer</h1>
<? else: ?>
    <h1>Edit vendor</h1>
<? endif ?>
</div>

<div class="main-form">
    <form action="<?= URL;?>user/editSave/<?php echo $this->user['id']; ?>" method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">First Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="firstname" value="<?= $this->user['firstname']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
            <input type="text" id="lname" name="lastname"  value="<?= $this->user['lastname']; ?>" ">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="nic">NIC Number</label>
            </div>
            <div class="col-75">
            <input type="text" id="nic" name="nic" value="<?= $this->user['nic']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="tel">Telephone Number</label>
            </div>
            <div class="col-75">
            <input type="text" id="tel" name="tel" value="<?= $this->user['tel']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="email">Email Address</label>
            </div>
            <div class="col-75">
            <input type="email" id="email" name="email" value="<?= $this->user['email']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="dob">Birthday</label>
            </div>
            <div class="col-75">
            <input type="date" id="dob" name="dob" value="<?= $this->user['dob']; ?>">
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
                <option value="province1">Province 1</option>
                <option value="province2">Province 2</option>
                <option value="province3">Province 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="district">District</label>
            </div>
            <div class="col-75">
            <select id="district" name="district">
                <option value="district1">District 1</option>
                <option value="district2">District 2</option>
                <option value="district3">District 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="grama">Gramasewa Division</label>
            </div>
            <div class="col-75">
            <select id="grama" name="grama">
                <option value="grama1">Grama 1</option>
                <option value="grama2">Grama 2</option>
                <option value="grama1">Grama 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="address">Address</label>
            </div>
            <div class="col-75">
                <input type="text" id="address" name="address" value="<?= $this->user['address']; ?>">
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
                <option value="vendor">Vendor</option>
            <? endif ?>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="login">User Name</label>
            </div>
            <div class="col-75">
            <input type="text" id="login" name="login" value="<?= $this->user['login']; ?>">
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
            <input type="submit" value="Update">
            </div>
        </div>
    </form>
</div>