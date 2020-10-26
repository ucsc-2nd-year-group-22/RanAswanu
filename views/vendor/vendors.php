<h1>Manage Vendors</h1>

<div class="user-tabs">
    <ul>
    <?php foreach($tabs as $tab) :?>
        <li><a href="<?php echo URL . $tab['path']?>"><?php=$tab['label']?></a></li>
    <?php endforeach; ?>
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
            <th>Vendor Name</th>
            <th>Telephone</th>
            <th>Address</th>
            <th><i class="fas fa-users"></i> View User</th>
            <th><i class="fas fa-user-times"></i> Remove User</th>
        </tr>
<?php $i = 0; foreach($vendorData as $vendor) :; $i++;?>
        <tr>
            <td> <?php= $i ?></td>
            <td><?php=$vendor['firstname'];?> </td>
            <td><?php=$vendor['tel'];?> </td>
            <td> <?php=$vendor['address'];?></td>
            <td>
                <a href="<?php echo URL .'user/edit/'.$vendor['id']; ?>" class="mini-button normal">View</a> 
            </td>
            <td>
                <a href="<?php echo URL .'vendor/delete/'.$vendor['id']; ?>" class="mini-button danger">Remove</a> 
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div>