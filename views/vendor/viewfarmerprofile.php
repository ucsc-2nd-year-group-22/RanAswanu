<div class="subHeader">
      <h1>Farmer Name :-  <?php echo  $details['first_name'].' '.$details['last_name']; ?></h1>
      
</div>

<div class="main-form">
<!-- <form action="<?= URL; ?>farmer/viewfarmerprofile" method="post"> -->
        <div class="row">
            <div class="col-25">
                <label for="user_id">User Id:</label>
            </div> 
            <div class="col-75">  
                <?php echo  $this->vendr['user_id'];?>
            </div>
        </div> 



        <div class="row">
            <div class="col-25">
                <label for="phone_no">Telephone No:</label>
            </div> 
            <div class="col-75">  
                <?php echo  $this->vendr['phone_no'];?>
            </div>
        </div> 

        <div class="row">
            <div class="col-25">
                <label for="email">E-mail:</label>
            </div> 
            <div class="col-75">  
                <?php echo  $this->vendr['email'];?>
            </div>
        </div> 

        <div class="row">
            <div class="col-25">
                <label for="ds_name">District:</label>
            </div> 
            <div class="col-75">  
                <?php echo  $this->vendr['ds_name'];?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="gs_name">Gramasewa Division:</label>
            </div> 
            <div class="col-75">  
                <?php echo  $this->vendr['gs_name'];?>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="tele_no">Other Crop Details:</label>
            </div> 
        </div>
        <!-- <table>

        <tr>
            <th>#</th>
            <th>Crop Name</th>
            <th>Weight</th>
            <th>Price</th>
            <th>District</th> 
            <th>Action</th>
            
        </tr>

   
       

    

        </table> -->
    

    <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
               <!-- <input type="submit" value="Update">  -->
               <a type="button" class="btn btn-success "  onclick="history.back()"><i class=" fa fa-toggle-left fa-0.5x"></i> Go Back</a>
            </div>
    </div>  
 



    </form>

</div>