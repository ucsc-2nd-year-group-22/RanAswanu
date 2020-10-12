<h1>Manage Farmers</h1>

<div class="user-tabs">
    <ul>
    <? foreach($tabs as $tab) :?>
        <li><a href="<?php echo URL . $tab['path']?>"><?=$tab['label']?></a></li>
    <? endforeach; ?>
    </ul>
</div>
<div class="filter-panel">

    <div class="pane1">
        <label for="filter4">Search</label>                    
    </div>
    
    <div class="pane2">
        <!-- panel2 -->
        <form action="#">
            <!-- <div class="row"> -->
                
                <!-- <div class="search-75"> -->
                <input type="text" id="search" name="search" placeholder="Enter for search..">
                <!-- </div> -->
            <!-- </div> -->
            <input type="submit" value="Submit">
        </form>
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

<div class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th>Farmer-ID</th>
            <th>Farmer Name</th>
            <th>NIC Number</th>
            <th>Action</th>
        </tr>
<? $i = 0; foreach($cropReqData as $cropReqItem) :; $i++;?>
        <tr>
            <td> <?= $i ?></td>
            <td><?=$cropReqItem['farmerId'];?> </td>
            <td><?=$cropReqItem['farmerName'];?> </td>
            <td> <?=$cropReqItem['nic'];?></td>
            <td>
                <button class="mini-button normal">Accept</button> 
                <button class="mini-button danger">Reject</button> 
            </td>
        </tr>
<?endforeach;?>
    </table>
</div>