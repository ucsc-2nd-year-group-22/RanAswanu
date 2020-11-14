<h1>Update Your Offer</h1>
<div class="user-tabs">
    <ul>
        <li><a id="tab3" href="#" ></a></li>
    </ul>
</div>


<div class="main-form">
    <!-- <form action="<?=URL;?>vendor/offer/. $adid ;?>" method="post"> -->
        <form action="<?= URL . '/vendor/update/' . $adid; ?>" method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">Place Your New Offer</label>
            </div>
            <div class="col-75">
                <input type="number"  name="ammount" >
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            </div>
            <div class="col-75">
            <input type="submit" value="Enter">
            </div>
        </div> 
    </form>    
</div>
 
