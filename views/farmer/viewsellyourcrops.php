<div class="subHeader">
    <h1>View Sell Crops</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/farmer/updatesellyourcrops/<?php echo $this->farmer['cropsid'] ?>" method="post">
       
       
        <div class="row">
            <div class="col-25">
                <label for="province">Province :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['province'];?>
            </div>
        </div> 

        <div class="row">
            <div class="col-25">
                <label for="district">District :</label>
            </div> 
            <div class="col-75">  
                <?php echo $this->farmer['district'];?>
            </div>
        </div>


        <div class="row">
            <div class="col-25">
                <label for="state">State :</label>
            </div> 
            <div class="col-75">  
                <?php echo $this->farmer['state'];?>
            </div>
        </div>


        <div class="row">
            <div class="col-25">
               <label for="selectCrop">Select Crop :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['selectCrop'];?>
            </div>
        </div>


        <div class="row">
            <div class="col-25">
               <label for="cropVariety">Crop Variety :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['cropVariety'];?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
               <label for="weight">Expecting min price (Per kg) -Rs :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['weight'];?>
            </div>
        </div>


        <div class="row">
            <div class="col-25">
               <label for="exprice">Total Weight (Or Expect) -Kg :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['exprice'];?>
            </div>
        </div>

        
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
               <!-- <input type="submit" value="Update">  -->
               <a type="button" class="btn btn-success"   onclick="history.back()"><i class=" fa fa-toggle-left"></i> Go Back</a>
            </div>
        </div>
    </form>
</div>