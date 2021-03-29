<div class="subHeader">
    <h1>Update Crops</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <div id="errors" class="error"></div>

    <form action="<?= URL; ?>/crop/update/<?php echo $this->crop['crop_id'] ?>" onsubmit="return CheckValidate()" method="post">
        <div class="row">
            <div class="col-25">
                <label for="crop_name">Crop Name</label>
            </div>
            <div class="col-75">
                <input value="<?php echo $this->crop['crop_type']; ?>" type="text" id="crop_type" name="crop_type" placeholder="Crop name..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="crop_varient">Crop Varients</label>
            </div>
            <div class="col-75">
                <input value="<?php echo $this->crop['crop_varient']; ?>" type="text" id="crop_varient" name="crop_varient" placeholder="Crop name..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="best_area">Best Area</label>
            </div>
            <div class="col-75">
                <select id="best_area" name="best_area">
                    <?php foreach ($districts as $districtItem) : ?>
                        <option value="<?= $districtItem['district_id'] ?>" <?php if ($this->crop['ds_name'] == $districtItem['ds_name']) echo 'selected'; ?>> <?= $districtItem['ds_name'] ?></option>
                    <?php endforeach; ?>
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
                <label for="discription">Description</label>
            </div>
            <div class="col-75">
                <textarea id="discription" name="description" placeholder="Enter if any..." style="height:200px"><?php if (isset($this->crop['description'])) echo $this->crop['description']; ?></textarea>
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


<script>
    function CheckValidate() {
        let validateErrors = [];

        var element = document.getElementById("errors"); //select error section

        while (element.firstChild) {
            //remove if any previous errors
            element.removeChild(element.firstChild);
        }

        //crop type validate
        let cropType = document.getElementById("crop_type");
        let name = cropType.value;
       
        let str = name.split(' ');
        for (var i = 0; i < str.length; i++) {
            if(str[i].charAt(0) !== str[i].charAt(0).toUpperCase()){
                validateErrors.push("First letter of each word must be in uppercase");
                break;
            }
        }

        validateErrors.forEach((error) => {
            //view errors
            var tag = document.createElement("p");
            var text = document.createTextNode(error);
            tag.appendChild(text);
            element.appendChild(tag);
        });

        if (validateErrors.length > 0) {
            window.scrollTo(500, 0);
            return false;
        } else {
            return true;
        }
    }
</script>