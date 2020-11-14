<div class="subHeader">
    <h1>Edit Damage Claim</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/farmer/updatedmgclaim/<?php echo $this->farmer['dmgid'] ?>" method="post">
        

         <div class="row">
            <div class="col-25">
            <label for="dmgdate">Date That Damage Is Happend</label>
            </div>
            <div class="col-75">
            <input type="date" value="<?php echo $this->farmer['dmgdate']; ?>" id="dmgdate" name="dmgdate" placeholder="Month/Date/Year " >
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="province">Province</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">
                <option value="province1" <?php if($this->farmer['province'] == 'province1') echo 'selected'; ?>>Province 1</option>
                <option value="province2" <?php if($this->farmer['province'] == 'province2') echo 'selected'; ?>>Province 2</option>
                <option value="province3" <?php if($this->farmer['province'] == 'province3') echo 'selected'; ?>>Province 3</option>
            </select>
            </div>
        </div>    

        <div class="row">
            <div class="col-25">
            <label for="district">District</label>
            </div>
            <div class="col-75">
            <select id="district" name="district">
                <option value="district1" <?php if($this->farmer['district'] == 'district1') echo 'selected'; ?>>District 1</option>
                <option value="district2" <?php if($this->farmer['district'] == 'district2') echo 'selected'; ?>>District 2</option>
                <option value="district3" <?php if($this->farmer['district'] == 'district3') echo 'selected'; ?>>District 3</option>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="gramasewa">Gramasewa Division</label>
            </div>
            <div class="col-75">
            <select id="gramasewa" name="gramasewa">
                <option value="grama1" <?php if($this->farmer['gramasewa'] == 'grama1') echo 'selected'; ?>>Grama 1</option>
                <option value="grama2" <?php if($this->farmer['gramasewa'] == 'grama2') echo 'selected'; ?>>Grama 2</option>
                <option value="grama3" <?php if($this->farmer['gramasewa'] == 'grama3') echo 'selected'; ?>>Grama 3</option>
            </select>
            </div>
        </div>


        <div class="row">
            <div class="col-25">
            <label for="address">Address</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?php echo $this->farmer['address']; ?>" id="address" name="address" placeholder="ex: No. 32, Atha watunu wava, Horawpathana">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="estdmgarea">Estimated Damage Area -Acres</label>
            </div>
            <div class="col-75">
            <input type="number" value="<?php echo $this->farmer['estdmgarea']; ?>" id="estdmgarea" name="estdmgarea" placeholder="ex: 3 acres">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="waydmg">Way Of Damage</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?php echo $this->farmer['waydmg']; ?>" id="waydmg" name="waydmg" placeholder="Enter/Edit the way that damage is happend">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="details">Details Of Damaged Crops</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?php echo $this->farmer['details']; ?>" id="details" name="details" placeholder="crop type   -   area   -   crop amount">
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