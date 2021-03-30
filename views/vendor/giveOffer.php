<div class="subHeader">
    <h1>Give an Offer</h1>
</div>

<!-- FORM -->
<?php echo $selling_req_id; ?>
<div class="main-form">
    <form action="<?php echo URL; ?>vendor/updateOffer/<?php echo $selling_req_id; ?>" method="post">
        <div class="row">
            <div class="col-25">
                <label for="max_offer">Give my Offer</label>
            </div>
            <div class="col-75">
                <input type="number" value="<?php echo $this->offer['max_offer']; ?>" id="max_offer" name="max_offer">

            </div>
        </div>


        <div class="row">
            <div class="col-25">

            </div>
            <div class="col-75">
                <input type="submit" class="btn btn-success" value="Update"></input>
            </div>
        </div>
    </form>
</div>