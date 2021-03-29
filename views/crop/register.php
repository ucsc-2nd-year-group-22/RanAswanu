<div class="subHeader">
    <h1>Crop Registration</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL; ?>/crop/create" method="post">
        <div class="row">
            <div class="col-25">
                <label for="crop_type">Crop Type</label>
            </div>
            <div class="col-75">
                <input type="text" id="crop_type" name="crop_type" required placeholder="Crop type..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="crop_varient">Crop Varient</label>
            </div>
            <div class="col-75">
                <input type="text" id="crop_varient" name="crop_varient" required placeholder="Crop varient..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="best_area">Best Area</label>
            </div>
            <div class="col-75">
                <select id="best_area" name="best_area">
                    <?php foreach ($districts as $districtItem) : ?>
                        <option value="<?= $districtItem['district_id'] ?>"> <?= $districtItem['ds_name'] ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="harvest_per_land">Harvest Per Land (kg Per acres)</label>
            </div>
            <div class="col-75">
                <input type="number" id="harvest_per_land" name="harvest_per_land" required placeholder="Harvest per land (kg Per acres)..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="harvest_period">Harvest Period (Days)</label>
            </div>
            <div class="col-75">
                <input type="number" id="harvest_period" name="harvest_period" required placeholder="Harvest period in days">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="description">Description</label>
            </div>
            <div class="col-75">
                <textarea id="description" name="description" placeholder="Enter if any..." style="height:200px"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-25">

            </div>
            <div class="col-75">
                <input type="submit" value="Register">
            </div>
        </div>
    </form>
</div>