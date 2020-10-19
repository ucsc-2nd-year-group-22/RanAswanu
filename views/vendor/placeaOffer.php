<h1>Place Your Offer</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab3" href="#" >Other Crops</a></li>
    </ul>
</div>


<div class="main-form">

<div class="row">
            <div class="col-25">
            <label for="amount">Enter your ammount</label>
            </div>
            <div class="col-75">
            <input type="text" id="amount" name="amount" placeholder="ammount in rupees">
            </div>
        </div>
</div>    

 
<div class="row">
        <div class="col-25">
        </div>
        <div class="col-75">
        <input type="submit" value="Enter">
        </div>
</div>


<?php
if(isset($this->js))
    echo '<script src="'.URL.'views/'.$this->js.'.js"></script>'; // want to now what happens here
    ?>