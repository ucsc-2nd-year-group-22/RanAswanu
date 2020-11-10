<h1>Sell Your Crops Form</h1>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/farmer/sellurcrops" method="post">
    
        
        <div class="row">
            <div class="col-25">
            <label for="province">Province</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">
            <option value ="" disabled selected>select province</option>
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
            <option value ="" disabled selected>select district</option>
                <option value="district1">District 1</option>
                <option value="district2">District 2</option>
                <option value="district3">District 3</option>
            </select>
            </div>
        </div>

        

        <div class="row">                                                                             
            <div class="col-25">
                <label for="state">State:</label>
            </div>

            <div class="col-75">
                <select id="state" name="state">
                <option value ="" disabled selected>select state</option>
                    <option value="after hvst"> After Harvest</option>
                    <option value="before hvst">Before Harvest</option>
			<!--	<label for="type">Type</label>   
                <input type="radio" id="Beforehvt" name="state" >
                <label for="aftharvest">After Harvest</label><br>
                <input type="radio" id="Afterhvt" name="state" >
                <label for="bfrharvest">Before Harvest</label><br><br>   -->
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
        <!--        <label for="cropVariety">Select Crop Variety:</label>       -->                               
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
            <label for="exprice">Expecting minimum price (Per kg) -Rs</label>
            </div>
            <div class="col-75">
            <input type="number" id="exprice" name="exprice" placeholder="ex:Rs 40">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="weight">Total Weight (Or Expect) -Kg</label>
            </div>
            <div class="col-75">
            <input type="number" id="weight" name="weight" placeholder="ex: 500 Kg">
            </div>
        </div>


        

        <div class="row">
            <div class="col-25">
            <label for="display">Display time (Max: 7 Days)</label>
            </div>
            <div class="col-75">
            <input type="number" id="display" name="display" min="1" max="7" /> 
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