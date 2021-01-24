<div class="subHeader">
    <h1>Update Collecting Center</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>collectingcenter/update/<?php echo $this->center['center_id'] ?>" method="post">
        <div class="row">
            <div class="col-25">
            <label for="center_name">Collecting Center Name</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?php echo $this->center['center_name']; ?>" id="center_name" name="center_name" placeholder="Collecting center name..">
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-25">
            <label for="province">Province</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">
                <?php foreach ($provinces as $provinceItem): ?>
                    <option value="<?= $provinceItem?>"      <?php if($this->center['province'] == $provinceItem) echo 'selected'; ?> > <?= $provinceItem?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div> -->
        <div class="row">
            <div class="col-25">
            <label for="district">District</label>
            </div>
            <div class="col-75">
            <select id="district" name="district">

                <?php foreach ($districts as $districtItem): ?>
                    <option value="<?= $districtItem['district_id']?>"      <?php if($this->center['district_id'] == $districtItem['district_id']) echo 'selected'; ?> > <?= $districtItem['ds_name']?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="row">
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
            <input type="submit" value="Update">
            </div>
        </div>
    </form>
</div>