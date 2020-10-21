<h1>Sell Your Crops</h1>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/farmer/sellcrops" method="post">
        <div class="row">
            <div class="col-25">
            <label for="login">Username</label>
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
                <label for="state">State:</label>
            </div>

            <div class="col-75">
                <select id="selectCrop" name="selectCrop">
				<label for="type">Type</label>
                <input type="radio" id="Beforehvt" name="Type" >
                <label for="vegatable">After Harvest</label><br>
                <input type="radio" id="Afterhvt" name="Type" >
                <label for="fruit">Before Harvest</label><br><br> 
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
            <label for="exprice">Expect price (Per kg)</label>
            </div>
            <div class="col-75">
            <input type="text" id="exprice" name="exprice" placeholder="ex:Rs 40">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="weight">Total Weight (Or Expect)</label>
            </div>
            <div class="col-75">
            <input type="text" id="weight" name="weight" placeholder="ex: 500 Kg">
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