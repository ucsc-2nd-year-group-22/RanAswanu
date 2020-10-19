<h1>Other Crops</h1>



<div id="tab1C" class="tabContainer">
    <h2>All</h2>
    <div class="filter-panel">
       
        <div class="pane2">
            <div class="search-container">
                <form action="#">
                    <span class="left">
                        <input type="text" placeholder="Search.." name="search">
                    </span>
                    <span class="right">
                        <button type="submit">Submit</button>
                    </span>
                </form>
                </div>
            <div class="right">

            </div>
        </div>
        <div class="pane3">
            <label for="filter4">Sort by</label>
            <select id="filter4" name="filter4">
                <option value="australia">Date</option>
                <option value="canada">Amount</option>
                <option value="usa">Time</option>
            </select>                    
        </div>
        <div class="pane4"> 
            <label for="filter5">Search by</label>
            <select id="filter5" name="filter5">
                <option value="australia">Crop</option>
                <option value="canada">Area</option>
                <option value="usa">Officer</option>
            </select>                
        </div>
    </div>
</div>

<!--
<div class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th>Crop name</th>
            <th>Crop Type</th>
            <th>Crop Ammount</th>
            <th>Action</th>
        </tr>
<?php $i = 0; foreach ($cropReqData as $cropReqItem) :; $i++;?>
        <tr>
            <td> <?php= $i ?></td>
            <td><?php=$cropReqItem['farmerId'];?> </td>
            <td><?php=$cropReqItem['farmerName'];?> </td>
            <td> <?php=$cropReqItem['cropType'];?></td>
            <td>
                <button class="mini-button normal">Offer</button>  
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div>


<?php
//if(isset($this->js))
//    echo '<script src="'.URL.'views/'.$this->js.'.js"></script>'; // want to now what happens here
    ?>

 -->   