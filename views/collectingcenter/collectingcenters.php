<h1>Manage Collecting Centers</h1>

<div class="user-tabs">
    <ul>
    <? foreach($tabs as $tab) :?>
        <li><a href="<?php echo URL . $tab['path']?>"><?=$tab['label']?></a></li>
    <? endforeach; ?>
    </ul>
</div>
<div class="filter-panel">
    <div class="pane1">
        <!-- <label for="filter4">Search</label>                     -->
    </div>
    
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
            <th>Col. Center Name</th>
            <th>Province</th>
            <th>District</th>
            <th>View Col. Center</th>
            <th>Remove Col. Center</th>
        </tr>
<? $i = 0; foreach($centerData as $center) :; $i++;?>
        <tr>
            <td> <?= $i ?></td>
            <td><?=$center['center_name'];?> </td>
            <td><?=$center['province'];?> </td>
            <td> <?=$center['district'];?></td>
            <td>
                <a href="<?php echo URL .'collectingcenter/edit/'.$center['id']; ?>" class="mini-button normal">View</a> 
            </td>
            <td>
                <a href="<?php echo URL .'collectingcenter/delete/'.$center['id']; ?>" class="mini-button danger">Remove</a> 
            </td>
        </tr>
<?endforeach;?>
    </table>
</div>