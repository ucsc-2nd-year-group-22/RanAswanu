<script>
    $(function() {
        $("#district").change(function() {
            var district = $(this).val();
            $("#cropType").empty();
            // Load crop types
            $.ajax({
                type: "GET",
                url: "ajxGetCultivatedCropTypes",
                data: {
                    district: district
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $(json).each(function(i, val) {
                        // console.log(val.crop_id);
                        var newOp = new Option(val.crop_type, val.crop_id);
                        $(newOp).html(val.crop_type);
                        $("#cropType").append(newOp);
                    });
                },
            });
        });

        $("#cropType").change(function() {
            getCropTypes($(this));
        });

        function getCropTypes(e) {
            type = e.val();
            // alert(type);
            $("#cropVart").empty();
            $("#harvestMonth").empty();
            $("#harvestMonth").hide();
            $.ajax({
                type: "GET",
                url: "ajxGetCropVart",
                data: {
                    type: type
                },
                success: function(data) {

                    var json = $.parseJSON(data);
                    $(json).each(function(i, val) {
                        var newOp = new Option(val.crop_varient, val.crop_id);
                        // console.log(val.crop_id);
                        $(newOp).html(val.crop_varient);
                        $("#cropVart").append(newOp);
                    });
                },
            });
        }
    });
</script>

<h1>Damage claim form</h1>
<?php $locDataForDmg = $locDataForDmg[0];
print_r($locDataForDmg);
echo $locDataForDmg['province_name']; ?>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL; ?>/farmer/insertDmg" method="post">
        <div class="row">
            <div class="col-25">
                <label for="dmgdate">Date That Damage Is Happend</label>
            </div>
            <div class="col-75">
                <input type="date" id="dmgdate" name="dmgdate" placeholder="Month/Date/Year " required />
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="province">Province</label>
            </div>
            <div class="col-75">
                <!-- <select id="province" name="province">
          <option value="null">-- SELECT PROVINCE --</option>
          <?php foreach ($provinces as $provinceItem) : ?>
            <option value="<?= $provinceItem['province_id'] ?>">
              <?= $provinceItem['province_name'] ?>
            </option>
          <?php endforeach; ?>
        </select> -->
                <label>
                    <b><?php echo $locDataForDmg['province_name']; ?></b>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="district">District</label>
            </div>
            <div class="col-75">
                <select id="district" name="district">
                    <option value="null">-- SELECT DISTRICT --</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="province">Divisional secratariast</label>
            </div>
            <div class="col-75">
                <select id="divisional_secratariast" name="divisional_secratariast">
                    <option value="null">-- SELECT DIVISIONAL SECT. --</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="grama">Gramasewa Division</label>
            </div>
            <div class="col-75">
                <select id="gramaSewa" name="gramaSewa">
                    <option value="null">-- SELECT GRAMASEWA DIV. --</option>
                </select>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-25">
                <label for="address">Address</label>
            </div>
            <div class="col-75">
                <input type="text" id="address" name="address" placeholder="ex: No. 32, Atha watunu wava, Horawpathana" required>
            </div>
        </div> -->

        <div class="row">
            <div class="col-25">
                <label for="croptype">Crop type:</label>
            </div>
            <div class="col-75">
                <select id="cropType" name="croptype" required>
                    <option selected disabled>-- Select Crops --</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="selectCrop">Crop Varient:</label>
            </div>
            <div class="col-75">
                <select id="cropVart" name="selectCrop" required>
                    <option value="" disabled selected>-- Select crop varient --</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="dmgArea">Estimated Damage Area -Acres</label>
            </div>
            <div class="col-75">
                <input type="number" id="estdmgarea" name="estdmgarea" placeholder="ex: 3 acres" max="100" required />
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="waydmg">Way Of Damage</label>
            </div>
            <div class="col-75">
                <textarea id="reason" name="reason" placeholder="How the damage is happend" style="height: 200px" required></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-25"></div>
            <div class="col-75">
                <input type="submit" value="Submit" />
            </div>
        </div>
    </form>
</div>
<script src="<?php echo URL; ?>/views/user/js/locations.js"></script>