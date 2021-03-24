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


<!-- FORM -->
<div class="main-form">
  <form action="<?= URL; ?>/farmer/updateDmg/<?= $damage_id; ?>" method="post">
    <div class="row">
      <div class="col-25">
        <label for="dmgdate">Date That Damage Is Happend</label>
      </div>
      <div class="col-75">
        <input type="date" id="dmgdate" name="dmgdate" value="<?= $editDmgData['damage_date'] ?>" required />
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="province">Province</label>
      </div>
      <div class="col-75">
        <select id="province" name="province">
          <option value="<?= $editDmgData['province_id'] ?>" readonly><?= $editDmgData['province_name'] ?></option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="district">District</label>
      </div>
      <div class="col-75">
        <select id="district" name="district">
          <option value="<?= $editDmgData['district_id'] ?>" readonly><?= $editDmgData['district_name'] ?></option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="province">Divisional secratariast</label>
      </div>
      <div class="col-75">
        <select id="div_sec" name="div_sec">
          <option value="<?= $editDmgData['div_sec_id'] ?>" readonly><?= $editDmgData['div_sec_name'] ?></option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="grama">Gramasewa Division</label>
      </div>
      <div class="col-75">
        <select id="gramaSewa" name="gramaSewa">
          <option value="<?= $editDmgData['gs_id'] ?>" readonly><?= $editDmgData['gs_name'] ?></option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="croptype">Crop type:</label>
      </div>
      <div class="col-75">
        <select id="cropType" name="croptype" required>
          <option value="<?= $editDmgData['crop_id'] ?>" readonly><?= $editDmgData['crop_type'] ?></option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="selectCrop">Crop Varient:</label>
      </div>
      <div class="col-75">
        <select id="cropVart" name="selectCrop" required>
          <option value="<?= $editDmgData['crop_id'] ?>" readonly><?= $editDmgData['crop_varient'] ?></option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="dmgArea">Estimated Damage Area -Acres</label>
      </div>
      <div class="col-75">
        <input type="number" id="estdmgarea" name="estdmgarea" value="<?= $editDmgData['damage_area'] ?>" max="100" required />
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="waydmg">Reason for the damage: </label>
      </div>
      <div class="col-75">
        <textarea id="reason" name="reason" placeholder="How the damage is happend" style="height: 200px" required><?= $editDmgData['damage_reason'] ?></textarea>
      </div>
    </div>

    <input type="hidden" id="harvest_id" name="harvest_id" value="<?= $editDmgData['harvest_id']; ?>">

    <div class="row">
      <div class="col-25"></div>
      <div class="col-75">
        <input type="submit" value="Submit" />
      </div>
    </div>
  </form>
</div>
<script src="<?php echo URL; ?>/views/user/js/locations.js"></script>