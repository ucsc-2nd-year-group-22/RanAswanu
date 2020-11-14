<div class="subHeader">
    <h1>View Crop Request</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/farmer/updatecropReq/<?php echo $this->farmer['cropreqid'] ?>" method="post">
      





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
               <label for="areasize">Area Size -Acres :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['areasize'];?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
               <label for="exptdate">Expecting Date To Cultivate :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['exptdate'];?>
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
               <label for="otherdetails">Other Details :</label>
            </div> 
            <div class="col-75">  
               <?php echo $this->farmer['otherdetails'];?>
            </div>
        </div>




        
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
               <!-- <input type="submit" value="Update">-->
               <a type="button" class="btn btn-success"   onclick="history.back()"><i class=" fa fa-toggle-left"></i> Go Back</a>
            </div>
        </div>
    </form>
</div>