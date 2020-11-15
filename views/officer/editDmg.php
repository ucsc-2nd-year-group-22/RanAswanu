<h1>Edit Damaige Claim</h2>

<!-- FORM -->
<div class="main-form">
    <div id="errors" class="error"></div>
    
    <form action="<?= URL;?>/officer/damageClaims" onsubmit="return CheckPassword()" method="post">
        <div class="row">
            <div class="col-25">
            <label for="fname">Crops</label>
            </div>
            <div class="col-75">
            <input type="text" id="fname" name="firstname" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="fname">Area</label>
            </div>
            <div class="col-75">
            <input type="text" id="fname" name="firstname" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="fname">Damage Amount</label>
            </div>
            <div class="col-75">
            <input type="number" id="fname" name="firstname" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
            <button type="submit"><i class="fas fa-handshake"></i> Update </button>
            </div>
        </div>
    </form>
</div>