<div class="subHeader">
    <h1>Collecting Center Registration</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>collectingcenter/update/<?php echo $this->center['id'] ?>" method="post">
        <div class="row">
            <div class="col-25">
            <label for="center_name">Collecting Center Name</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?php echo $this->center['center_name']; ?>" id="center_name" name="center_name" placeholder="Collecting center name..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="province">Province</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">
                <option value="province1" <?php if($this->center['province'] == 'province1') echo 'selected'; ?>>Province 1</option>
                <option value="province2" <?php if($this->center['province'] == 'province2') echo 'selected'; ?>>Province 2</option>
                <option value="province3" <?php if($this->center['province'] == 'province3') echo 'selected'; ?>>Province 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="district">District</label>
            </div>
            <div class="col-75">
            <select id="district" name="district">
                <option value="district1" <?php if($this->center['district'] == 'district1') echo 'selected'; ?>>District 1</option>
                <option value="district2" <?php if($this->center['district'] == 'district2') echo 'selected'; ?>>District 2</option>
                <option value="district3" <?php if($this->center['district'] == 'district3') echo 'selected'; ?>>District 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="grama">Gramasewa Division</label>
            </div>
            <div class="col-75">
            <select id="grama" name="grama">
                <option value="grama1" <?php if($this->center['grama'] == 'grama1') echo 'selected'; ?>>Grama 1</option>
                <option value="grama2" <?php if($this->center['grama'] == 'grama2') echo 'selected'; ?>>Grama 2</option>
                <option value="grama1" <?php if($this->center['grama'] == 'grama3') echo 'selected'; ?>>Grama 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
            <input type="submit" value="Update">
            </div>
        </div>
    </form>
</div>