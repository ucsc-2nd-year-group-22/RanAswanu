<h1>Sell harvest form</h1>
<?php $dataForSellCrop = $dataForSellCrop[0];

?>

<!-- FORM -->
<div class="main-form">
  <form action="<?= URL; ?>/farmer/insertSellCrop" method="post">

  <div class="row">
      <div class="col-25">
        <label >Date (today)</label>
      </div>
      <div class="col-75">
        <input id="date" name="date" type="text" readonly value="<?php echo date("Y-m-d") ?>"  required />
      </div>
    </div>

  <div class="row">
      <div class="col-25">
        <label for="dmgArea">Crop</label>
      </div>
      <div class="col-75">
        <input type="text" disabled value="<?= $dataForSellCrop['crop_type'];?> (<?= $dataForSellCrop['crop_varient'];?>)"  required />
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="dmgArea">Location</label>
      </div>
      <div class="col-75">
        <input type="text" disabled value="<?= $dataForSellCrop['gs_name'];?> (<?= $dataForSellCrop['district_name'];?>)" required />
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="dmgArea">Harvest amount <b>(<?= $dataForSellCrop['expected_harvest'];?> kg or less)</b></label>
      </div>
      <div class="col-75">
        <input type="number" id="harvest_amount" name="harvest_amount" value="<?= $dataForSellCrop['expected_harvest'];?>" max="<?= $dataForSellCrop['expected_harvest'];?>"  required min=0 />
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="dmgArea">Valid time period (days)</label>
      </div>
      <div class="col-75">
        <input type="number" id="valid_time_period" name="valid_time_period" max="30" min=0 required />
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="dmgArea">Minimum price for harvest</label>
      </div>
      <div class="col-75">
        <input type="number" id="min_offer" name="min_offer" min=0  required />
      </div>
    </div>

    <input type="hidden" id="harvest_id" name="harvest_id" value="<?= $harvest_id; ?>">

    <div class="row">
      <div class="col-25"></div>
      <div class="col-75">
        <input type="submit" onclick="return confirm('Once you make a selling request for your crops you can not edit it. You may delete it later if something is wrong.');" value="Submit" />
      </div>
    </div>
  </form>
</div>
<script src="<?php echo URL; ?>/views/user/js/locations.js"></script>