<div class="subHeader">
    <h1>Edit Sell Crops</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/farmer/updatesellyourcrops/<?php echo $this->farmer['aId'] ?>" method="post">
       
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
            <label for="state">Select State</label>
            </div>
            <div class="col-75">
            <select id="state" name="state">
                <option value="after hvst" <?php if($this->farmer['state'] == 'after hvst') echo 'selected'; ?>>After Harvest</option>
                <option value="before hvst" <?php if($this->farmer['state'] == 'before hvst') echo 'selected'; ?>>Before Harvest</option>
                
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="selectCrop">Select Crop</label>
            </div>
            <div class="col-75">
            <select id="selectCrop" name="selectCrop">
                <option value="carret" <?php if($this->farmer['selectCrop'] == 'carret') echo 'selected'; ?>>carret</option>
                <option value="cucumber" <?php if($this->farmer['selectCrop'] == 'cucumber') echo 'selected'; ?>>cucumber</option>
                <option value="tomatoes" <?php if($this->farmer['selectCrop'] == 'tomatoes') echo 'selected'; ?>>tomatoes</option>
                <option value="Onion" <?php if($this->farmer['selectCrop'] == 'Onion') echo 'selected'; ?>>Onion</option>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
           
            </div>
            <div class="col-75">
            <select id="cropVariety" name="cropVariety">
                <option value="Variety1" <?php if($this->farmer['cropVariety'] == 'Variety1') echo 'selected'; ?>>Variety1</option>
                <option value="Variety2" <?php if($this->farmer['cropVariety'] == 'Variety2') echo 'selected'; ?>>Variety2</option>
                <option value="Variety3" <?php if($this->farmer['cropVariety'] == 'Variety3') echo 'selected'; ?>>Variety3</option>
            </select>
            </div>
        </div>


        <div class="row">
            <div class="col-25">
            <label for="weight">Expecting minimum price (Per kg) -Rs</label>
            </div>
            <div class="col-75">
            <input type="number" value="<?php echo $this->farmer['weight']; ?>" id="weight" name="weight" placeholder="ex: 40" min="10" max="1000">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="exprice">Total Weight (Or Expect) -Kg</label>
            </div>
            <div class="col-75">
            <input type="number" value="<?php echo $this->farmer['exprice']; ?>" id="exprice" name="exprice" placeholder="ex: 500" min="50" max="10000">
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