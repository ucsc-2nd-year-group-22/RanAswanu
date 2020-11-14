<div class="subHeader">
    <h1>View Damage Claim</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/farmer/updatedmgclaim/<?php echo $this->farmer['dmgid'] ?>" method="post">
        
        
        <div class="row">
            <div class="col-25">
                <label for="dmgdate">Date That Damage Is Happend :</label>
            </div> 
            <div class="col-75">  
                <?php echo $this->farmer['dmgdate'];?>
            </div>
        </div> 

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
               <label for="gramasewa">Gramasewa Division :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['gramasewa'];?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
               <label for="address">Address:</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['address'];?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
               <label for="estdmgarea">Estimated Damage Area -Acres :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['estdmgarea'];?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="waydmg">Way Of Damage :</label>
            </div> 
            <div class="col-75">  
                <?php echo $this->farmer['waydmg'];?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="details">Details Of Damaged Crops :</label>
            </div> 

            <div class="col-75">  
                <?php echo $this->farmer['details'];?>
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