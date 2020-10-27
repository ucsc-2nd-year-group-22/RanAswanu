<h1>Manage Crops</h1>

<div class="user-tabs">
    <ul>
    <?php foreach($tabs as $tab) :?>
        <li><a href="<?php echo URL . $tab['path']?>"><?php  echo $tab['label']?></a></li>
    <?php endforeach; ?>
    </ul>
</div>
<div class="filter-panel">
    <div class="pane1">
        <ul>
            <li id="sortByLbl">
                <label for="radio">Sort by</label></li>
            <li>
                <label class="container">Acending
                    <input type="radio" checked="checked" name="radio">
                    <span class="checkmark"></span>
                </label>
            </li>
            <li>
                <label class="container">Decending
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                </label>
            </li>
        </ul>                    
    </div>
    <div class="pane2">
        <!-- panel2                     -->
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
            <th>Crop-ID</th>
            <th>Crop Name</th>
            <th>Kg Per m<sup>2</sup></th>
            <th>Action</th>
        </tr>
<?php $i = 0; foreach($cropReqData as $cropReqItem) :; $i++;?>
        <tr>
            <td> <?php echo $i ?></td>
            <td><?php echo  $cropReqItem['farmerId'];?> </td>
            <td><?php echo $cropReqItem['farmerName'];?> </td>
            <td> <?php echo $cropReqItem['nic'];?></td>
            <td>
                <button class="mini-button normal">Accept</button> 
                <button class="mini-button danger">Reject</button> 
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div>
