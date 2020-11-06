<h1>Damage claim form</h1>


<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/farmer/creates" method="post">
        
     
        <div class="row">
            <div class="col-25">
            <label for="dmgdate">Date That Damage Is Happend</label>
            </div>
            <div class="col-75">
            <input type="date" id="dmgdate" name="dmgdate" placeholder="Month/Date/Year ">
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
            <label for="address">Address</label>
            </div>
            <div class="col-75">
                <input type="text" id="address" name="address" placeholder="ex: No. 32, Atha watunu wava, Horawpathana">
            </div>
        </div>  
        
        <div class="row">
            <div class="col-25">
            <label for="estdmgarea">Estimated Damage Area</label>
            </div>
            <div class="col-75">
            <input type="number" id="estdmgarea" name="estdmgarea" placeholder="ex: 3 acres">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="waydmg">Way Of Damage</label>
            </div>
            <div class="col-75">
            <textarea id="waydmg" name="waydmg" placeholder="Enter the way that damage is happend" style="height:200px"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
            <label for="details">Details Of Damaged Crops</label>
            </div>
            <div class="col-75">
            <textarea id="details" name="details" placeholder="crop type   -   area   -   crop amount" style="height:200px"></textarea>
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