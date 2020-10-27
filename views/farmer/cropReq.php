<h1>Crop Reqeust</h1>
       

<div class="main-form">
    <form action="<?= URL;?>/farmer/cropReq" method="post">	
        <div class="row">
            <div class="col-25">
            <label for="username">Username</label>
            </div>
            <div class="col-75">
            <input type="text" id="login" name="login" placeholder="ex: wasantha123">
            </div>
        </div>

       
        <div class="row">
            <div class="col-25">
            <label for="province">Province</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">
                <option value="province1">Province 1</option>
                <option value="province2">Province 2</option>
                <option value="province3">Province 3</option>
            </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
            <label for="district">District</label>
            </div>
            <div class="col-75">
            <select id="district" name="district">
                <option value="district1">District 1</option>
                <option value="district2">District 2</option>
                <option value="district3">District 3</option>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="gramasewa">Gramasewa Division</label>
            </div>

            <div class="col-75">
            <select id="gramasewa" name="gramasewa">
                <option value="grama1">Grama 1</option>
                <option value="grama2">Grama 2</option>
                <option value="grama1">Grama 3</option>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="address">Address of the land</label>
            </div>

            <div class="col-75">
                <input type="text" id="address" name="address" placeholder="ex: No. 32, Atha watunu wava, Horawpathana">
            </div>
        </div>  

        <div class="row">
            <div class="col-25">
			    <label for="areasize">Expect area size to cultivate</label>
			</div>	
				  
		    <div class="col-75">
                <input type="text" placeholder="ex: 2 Acres" name="asize">
			</div>
        </div>
        
        <div class="row">
            <div class="col-25">
            <label for="Expdate">Expect Date To Harvest</label>
            </div>
            <div class="col-75">
            <input type="date" id="Expdate" name="Expdate" placeholder="Month/Date/Year ">
            </div>
        </div>
        
        <div class="row">                                                                             
            <div class="col-25">
                <label for="croptype">Crop type:</label>
            </div>

            <div class="col-75">
                <select id="croptype" name="croptype">
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
                <label for="otherdetails">Other details:</label>
            </div>

            <div class="col-75">
                <textarea id="otherdetails" name="otherdetails" placeholder="Enter other details " style="height:200px "></textarea>
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

        

        
        
