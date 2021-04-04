<div class="main-form">
<!-- <form action="<?= URL; ?>farmer/viewfarmerprofile" method="post"> -->
        



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
            
            </div>
            <div class="col-75">
               <!-- <input type="submit" value="Update">  -->
               <a type="button" class="btn btn-success "  onclick="history.back()"><i class=" fa fa-toggle-left fa-0.5x"></i> Go Back</a>
            </div>
    </div>  
 



    <!-- </form> -->

</div>