<h1>Manage Admins</h1>

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
            <th>Admin-ID</th>
            <th>Admin Name</th>
            <th>Address</th>
            <th>View</th>
            <th>Remove</th>
        </tr>
<? $i = 0; foreach($adminData as $admin) :; $i++;?>
        <tr>
            <td> <?= $i ?></td>
            <td><?=$admin['id'];?> </td>
            <td><?=$admin['firstname'];?> </td>
            <td> <?=$admin['address'];?></td>
            <td>
                <a class="mini-button normal">View</a>
            </td>
            <td>
                <a class="mini-button danger">Remove</a>
            </td>
        </tr>
<?endforeach;?>
    </table>
</div>