<div class="subHeader">
    <h1>Crop Registration</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/crop/create" method="post">
        <div class="row">
            <div class="col-25">
            <label for="crop_varient">Crop Varient</label>
            </div>
            <div class="col-75">
            <input type="text" id="crop_varient" name="crop_varient" placeholder="Crop varient..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="crop_type">Crop Type</label>
            </div>
            <div class="col-75">
            <select id="crop_type" name="crop_type">
                <option value="type1">Type 1</option>
                <option value="type2">Type 2</option>
                <option value="type3">Type 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="best_area">Best Area</label>
            </div>
            <div class="col-75">
            <select id="best_area" name="best_area">
                <option value="area1">Area 1</option>
                <option value="area2">Area 2</option>
                <option value="area3">Area 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="harvest_per_land">Harvest Per Land (Kg)</label>
            </div>
            <div class="col-75">
            <input type="number" id="harvest_per_land" name="harvest_per_land" placeholder="Harvest per land(Kg)..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="harvest_period">Harvest Period (Days)</label>
            </div>
            <div class="col-75">
            <input type="number" id="harvest_period" name="harvest_period" placeholder="Harvest period in days">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="discription">Discription</label>
            </div>
            <div class="col-75">
            <textarea id="discription" name="discription" placeholder="Enter if any..." style="height:200px"></textarea>
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