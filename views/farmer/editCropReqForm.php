<Script>
    $(function() {
        $('#expectedHarv').hide();
        $('#harvestMonth').hide();
        var vart;
        var type;

        // $('#province').change(function() {
        //     $('#cropType').html('ssss');
        // });

        $('#district').change(function() {
            var district = ($(this).val());
            $('#cropType').empty();
            $('#cropType').append('-- Select district first --');
            // Load crop types
            $.ajax({
                type: 'GET',
                url: '<?php echo URL; ?>farmer/ajxGetCropTypes',
                data: {
                    district: district
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $(json).each(function(i, val) {
                        // console.log(val.crop_id);
                        var newOp = new Option(val.crop_type, val.crop_id);
                        $(newOp).html(val.crop_type);
                        $('#cropType').append(newOp);
                    });
                }
            });
        });

        $('#cropType').change(function() {
            getCropTypes($(this));
            $('#harvestMonth').empty();
            $('#harvestMonth').hide();
        });

        $('#cropVart').change(function() {
            $('#harvestMonth').empty();
            $('#startMonth').empty();
            $('#harvestMonth').hide();
            $('#expectedHarv').empty();
            $('#expectedHarv').hide();
        });


        $('#startMonth').change(function() {
            getHarvestData($(this));
        });

        $('#areaSize').keyup(function() {
            getHarvestPerLand($(this));
        });

        function getHarvestPerLand(e) {
            var area = e.val()/2.471;
            $('#harvestMonth').empty();
            vart = $('#cropVart').val();
            if (vart != null) {
                if (area != 0) {
                    $('#expectedHarv').show();
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo URL; ?>farmer/ajxGetHarvPerLand',
                        data: {
                            vart: vart
                        },
                        success: function(data) {
                            var json = $.parseJSON(data);
                            $(json).each(function(i, val) {
                                $('#expectedHarv').html((val.harvest_per_land * area).toFixed(2) + " kg");
                                $('#expected_harvest').val((val.harvest_per_land * area).toFixed(2));
                            });
                        }
                    });
                } else {
                    $('#expectedHarv').hide();
                }
            } else {
                alert('Please select crop type and varient !');
            }
        }

        function getHarvestData(e) {

            $('#harvestMonth').show();
            var startMonth = e.val();
            vart = $('#cropVart').val();
            $('#harvestMonth').html(startMonth);
            var formattedDate;
            $.ajax({
                type: 'GET',
                url: '<?php echo URL; ?>farmer/ajxGetHarvPerLand',
                data: {
                    vart: vart
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $(json).each(function(i, val) {
                        var date1 = new Date(startMonth);
                        var weeks = val.harvest_period;
                        date1.setDate(date1.getDate() + weeks * 7);
                        formattedDate = date1.getFullYear() + '-' + (date1.getMonth() + 1) + '-' + date1.getDate();
                        $('#harvestMonth').html("Harvesting Period :" + val.harvest_period + ' weeks<br> Harvesting month =>' + formattedDate);
                        $('#harvesting_month').val(formattedDate);
                    });
                }
            })

        }

        function getCropTypes(e) {

            type = e.val();
            // alert(type);
            $('#cropVart').empty();
            $('#harvestMonth').empty();
            $('#harvestMonth').hide();
            $.ajax({
                type: 'GET',
                url: '<?php echo URL; ?>farmer/ajxGetCropVart',
                data: {
                    type: type
                },
                success: function(data) {
                    var json = $.parseJSON(data);
                    $(json).each(function(i, val) {
                        var newOp = new Option(val.crop_varient, val.crop_id);
                        // console.log(val.crop_id);
                        $(newOp).html(val.crop_varient);
                        $('#cropVart').append(newOp);
                    });
                }
            });
        }

        // // get center data
        // $.ajax({
        //     type: 'GET',
        //     url: '<?php echo URL; ?>farmer/ajxGetCenters',
        //     // data: {type:type},
        //     success: function(data) {
        //         var json = $.parseJSON(data);
        //         $(json).each(function(i, val) {
        //             var newOp = new Option(val.center_name, val.center_id);
        //             console.log(val.center_name);
        //             $(newOp).html(val.center_name);
        //             $('#selectCenter').append(newOp);
        //         });
        //     }
        // });




    });
</Script>

<h1>Crop Reqeust Edit Form</h1>

<div class="main-form">
    <form action="<?= URL; ?>farmer/updateCropReq/<?= $cropReqData['harvest_id']; ?>" method="post">


        <div class="row">
            <div class="col-25">
                <label for="province">Province</label>
            </div>
            <div class="col-75">
                <select id="province" name="province" required>
                    <?php foreach ($allProvinces as $provinceItem) : ?>
                        <option value="<?= $provinceItem['province_id'] ?>" <?php if ($locData['province_name'] == $provinceItem['province_name']) echo 'selected'; ?>> <?php echo $provinceItem['province_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="district">District</label>
            </div>
            <div class="col-75">
                <select id="district" name="district" required>
                    <?php foreach ($allDistricts as $districtItem) : ?>
                        <option value="<?= $districtItem['district_id'] ?>" <?php if ($locData['district_name'] == $districtItem['ds_name']) echo 'selected'; ?>> <?php echo $districtItem['ds_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="province">Divisional secratariast</label>
            </div>
            <div class="col-75">
                <select id="divisional_secratariast" name="divisional_secratariast" required>
                    <?php foreach ($allDivSecs as $divSecItem) : ?>
                        <option value="<?= $divSecItem['ds_id'] ?>" <?php if ($locData['div_sec_name'] == $divSecItem['ds_name']) echo 'selected'; ?>> <?= $divSecItem['ds_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="grama">Gramasewa Division</label>
            </div>
            <div class="col-75">
                <select id="gramaSewa" name="gramaSewa" required>
                    <?php foreach ($allGramaSewas as $gramaItem) : ?>
                        <option value="<?= $gramaItem['gs_id'] ?>" <?php if ($locData['gs_name'] == $gramaItem['gs_name']) echo 'selected'; ?>> <?= $gramaItem['gs_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="croptype">Crop type:</label>
            </div>
            <div class="col-75">
                <select id="cropType" name="croptype" required>
                    <!-- <option value="<?= $cropReqData['crop_id']; ?>" selected><?= $cropReqData['crop_type']; ?></option> -->
                    <?php foreach ($allCropTypes as $cropTypeItem) : ?>
                        <option value="<?= $cropTypeItem['crop_id'] ?>" <?php if ($cropReqData['crop_type'] == $cropTypeItem['crop_type']) echo 'selected'; ?>> <?= $cropTypeItem['crop_type'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="selectCrop">Crop Varient:</label>
            </div>
            <div class="col-75">
                <select id="cropVart" name="selectCrop" required>
                    <option value="<?= $cropReqData['crop_id']; ?>"> <?= $cropReqData['crop_varient']; ?></option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="areaSize">Size of the area (Acres)</label>
            </div>
            <div class="col-75">
                <input type="number" placeholder="ex: 2 Acres" id="areaSize" max="100" required>
            </div>
        </div>

        <div class="ajxToolTip" id="expectedHarv">Expected : kgs</div>

        <div class="row">
            <div class="col-25">
                <label for="exptdate">Cultivating date (start month)</label>
            </div>
            <div class="col-75">
                <input type="date" id="startMonth" name="startMonth" placeholder="Month/Date/Year " required>
            </div>
        </div>

        <div class="ajxToolTip" id="harvestMonth">harvestMonth : kgs</div>

        <div class="row">
            <div class="col-25">
                <label for="selectCenter">Collecting Center:</label>
            </div>
            <div class="col-75">
                <select id="selectCenter" name="selectCenter" required>
                    <?php foreach ($allCenters as $centerItem) : ?>
                        <option value="<?= $centerItem['center_id'] ?>" <?php if ($cropReqData['center_name'] == $centerItem['center_name']) echo 'selected'; ?>> <?= $centerItem['center_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-25">
                <label for="otherdetails">Other details:</label>
            </div>
            <div class="col-75">
                <textarea id="otherDetails" name="otherDetails" placeholder="Enter other details "
                    style="height:200px "></textarea>
            </div>
        </div> -->

        <input type="hidden" id="expected_harvest" name="expected_harvest" value="">
        <!-- <input type="hidden" id="starting_month" name="starting_month" value=""> -->
        <input type="hidden" id="harvesting_month" name="harvesting_month" value="">

        <div class="row">
            <div class="col-25">
            </div>
            <div class="col-75">
                <button type="submit">Update </button>
            </div>
        </div>
    </form>
</div>
<script src="<?php echo URL; ?>views/user/js/locations.js"></script>
<script src="<?php echo URL; ?>views/user/js/default.js"></script>