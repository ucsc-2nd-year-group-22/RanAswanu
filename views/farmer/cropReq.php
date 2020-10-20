<h1>Crop Reqeust</h1>
       

<div class="main-form">
    <form action="/action_page.php"> 	
        <div class="row">                                                                             
            <div class="col-25">
                <label for="selectCrop">Crop type:</label>
            </div>

            <div class="col-75">
                <select id="selectCrop" name="selectCrop">
				<label for="type">Type</label>
                <input type="radio" id="Vegatable" name="Type" >
                <label for="vegatable">Vegatable</label><br>
                <input type="radio" id="Fruit" name="Type" >
                <label for="fruit">Fruit</label><br><br> 
                </select>
            </div>
        </div>
				
			
		<div class="row">
            <div class="col-25">
			    <label for="areasize">Expect area size to cultivate</label>
			</div>	
				  
		    <div class="col-75">
                <input type="text" placeholder="Enter area size as Acres" name="asize">
			</div>
		</div>

        <div class="row">
            <div class="col-25">
                <label for="selectCrop">Select Crop:</label>                                                
            </div>

            <div class="col-75">
                <select id="selectCrop" name="selectCrop">
				<option value ="" disabled selected>select crop</option>
                <option value="carret">carret</option>
				<option value="cucumber">cucumber</option>
                <option value="tomatoes">tomatoes</option>
                <option value="Onion">Onion</option>
                </select>
            </div>
        </div>
				
				
            
        <div class="row">
            <div class="col-25">
                <label for="cropVariety">Select Crop Variety:</label>                                     
            </div>

            <div class="col-75">
                <select id="cropVariety" name="cropVariety">
				<option value ="" disabled selected>Crop variety</option>
                <option value="Variety1">Variety1</option>
                <option value="Variety2">Variety2</option>
                <option value="Variety3">Variety3</option>
                </select>
            </div>

        </div>   


        <div class="row">                                                                          
            <div class="col-25">
                <label for="selectArea">Select Your District:</label>
            </div>

            <div class="col-75">
                <select id="selectDistrict" name="selectDistrict">
				<option value ="" disabled selected>select District</option>
				<option value="Colombo">Colombo</option>
				<option value="Gampaha">Gampaha</option>					
                <option value="Kaluthara">Kaluthara</option>
				<option value="Hambanthota">Hambanthota</option>
                <option value="Kandy">Kandy</option>
                </select>
            </div>
        </div>
				

        <div class="row">
            <div class="col-25">
                <label for="description">Address of the land</label>
            </div>

            <div class="col-75">
                <textarea id="laddress" name="laddress" placeholder="Enter your address of land" style="height:150px "></textarea>
            </div>
        </div>


    
        <div class="row">
            <div class="col-25">
            <label for="dmgdate">Expect Date To Harvest</label>
            </div>
            <div class="col-75">
            <input type="date" id="dmgdate" name="dmgdate" placeholder="Month/Date/Year ">
            </div>
        </div>
				  


        <div class="row">
            <div class="col-25"> 
                <label for="description">Other details:</label>
            </div>

            <div class="col-75">
                <textarea id="otherdetails" name="otherdetails" placeholder="Other details" style="height:200px "></textarea>
            </div>
        </div>
				
			 
        <div class="row">
            <div class="col-25">   
                <label for="conditions">I Agree to Terms & conditions:</label>
            </div>   

            <div class="col-75">
                <input type="checkbox" id="yes" name="confirm" value="yes">
                <label for="yes"> Yes</label><br>
                <input type="checkbox" id="no" name="confirm" value="no">
                <label for="no"> No</label><br>
                    
                </select>
            </div>
        </div>
        

        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
            <input type="submit" value="Submit">
            </div>
        </div>


    </form>
</div> 

        

        
        
