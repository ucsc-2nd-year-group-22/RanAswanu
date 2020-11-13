<div class="subHeader">
    <h1>Update Crops</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/crop/update/<?php echo $this->crop['id'] ?>" method="post">
        <div class="row">
            <div class="col-25">
                <label for="crop_name">Crop Name</label>
            </div>
            <div class="col-75">
                <input value="<?php echo $this->crop['crop_name']; ?>" type="text" id="crop_name" name="crop_name" placeholder="Crop name..">
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-25">
                <label for="crop_varient">Crop Varients</label>
            </div>
            <div class="col-75">
                <select id="crop_varient" name="crop_varient">
                    <option value="varient1" <?php if($this->crop['crop_varient'] == 'varient1') echo 'selected'; ?>>Varient 1</option>
                    <option value="varient2" <?php if($this->crop['crop_varient'] == 'varient2') echo 'selected'; ?>>Varient 2</option>
                    <option value="varient3" <?php if($this->crop['crop_varient'] == 'varient3') echo 'selected'; ?>>Varient 3</option>
                </select>
            </div>
        </div> -->
        <div class="row">
            <div class="col-25">
                <label for="best_area">Best Area</label>
            </div>
            <div class="col-75">
                <select id="best_area" name="best_area">
                    <option value="area1" <?php if($this->crop['best_area'] == 'area1') echo 'selected'; ?>>Area 1</option>
                    <option value="area2" <?php if($this->crop['best_area'] == 'area2') echo 'selected'; ?>>Area 2</option>
                    <option value="area3" <?php if($this->crop['best_area'] == 'area3') echo 'selected'; ?>>Area 3</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="harvest_per_land">Harvest Per Land (Kg)</label>
            </div>
            <div class="col-75">
                <input type="number" value="<?php echo $this->crop['harvest_per_land']; ?>" id="harvest_per_land" name="harvest_per_land" placeholder="Harvest per land(Kg)..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="harvest_period">Harvest Period (Days)</label>
            </div>
            <div class="col-75">
                <input value="<?php echo $this->crop['harvest_period']; ?>" type="number" id="harvest_period" name="harvest_period" placeholder="Harvest period in days">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="discription">Discription</label>
            </div>
            <div class="col-75">
                <textarea id="discription" name="discription" placeholder="Enter if any..." style="height:200px"><?php if(isset($this->crop['discription'])) echo $this->crop['discription']; ?></textarea>
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