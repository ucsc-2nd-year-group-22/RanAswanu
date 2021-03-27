<div class="subHeader">
    <h1>Give an Offer</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL; ?>/vendor/updateOffer" method="post">
        <!-- <form> -->

        <?php $dd = 1;
        $newof = $this->offer['max_offer'] + $dd; ?>
        <?php echo $newof; ?>
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
                <!-- <input type="submit" value="Update">  -->
                <a type="button" class="btn btn-success " onclick="history.back()"><i class=" fa fa-toggle-left fa-0.5x"></i> Go Back</a>
                <a input type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Update</a>
            </div>
        </div>








    </form>
</div>