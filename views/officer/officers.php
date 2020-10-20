<h1>Manage Officers</h1>

<div class="user-tabs">
    <ul>
    <?php foreach($tabs as $tab) :?>
        <li><a href="<?php echo URL . $tab['path']?>"><?= $tab['label']?></a></li>
    <?php endforeach; ?>
    </ul>
</div>
<div class="filter-panel">

    <div class="pane1">
        <label for="filter4">Search</label>                    
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
            <th>Officer-ID</th>
            <th>Officer Name</th>
            <th>Telephone Number</th>
            <th>Address</th>
            <th>View</th>
            <th>Remove</th>
        </tr>
<?php $i = 0; foreach($officerData as $officer) :; $i++;?>
        <tr>
            <td> <?=  $i ?></td>
            <td><?= $officer['id'];?> </td>
            <td><?= $officer['firstname'];?> </td>
            <td> <?= $officer['tel'];?></td>
            <td> <?= $officer['address'];?></td>
            <td>
                <a href="<?php echo URL .'user/edit/'.$officer['id']; ?>" class="mini-button normal">View</a>
            </td>
            <td>
                <a href="<?php echo URL .'user/delete/'.$officer['id']; ?>" class="mini-button danger">Remove</a> 
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div>

</div>