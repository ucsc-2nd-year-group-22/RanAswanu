<h1>Manage Collecting Centers</h1>

<div class="user-tabs">
    <ul>
    <?php foreach($tabs as $tab) :?>
        <li><a href="<?php echo URL . $tab['path']?>"><?=$tab['label']?></a></li>
    <?php endforeach; ?>
    </ul>
</div>
<div class="filter-panel">
<div class="panel-container">
    <div class="pane1">

        <form class="search-bar">
            <label>Search crop requests by : </label>
            <select placeholder="Search ...">
                    <option>Demand status</option>
                    <option>Farmer name</option>
                    <option>Crop</option>
                </select>
            <input type="text" placeholder="Search ...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        </div>
        <div class="pane2">
            <form class="normal-select">
                <label>Sort crop requests by : </label>
                <select placeholder="other">
                        <option>Date</option>
                        <option>Demand status</option>
                        <option>Farmer name</option>
                        <option>Crop</option>
                    <option>111</option>
                </select>
                <button type="submit" class="half"><i class="fas fa-sort-amount-down-alt"></i> Smaller-first </button>
                <button type="submit" class="half"><i class="fas fa-sort-amount-down"></i> Larger-first</button>
            </form>
        </div>

        <!-- Comment pane 3 & 4 If they are empty -->

        <div class="pane3">
            <label>Empty pane</label>
        </div>
        <div class="pane4">
            <label>Empty pane</label>
        </div>
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
<?php $i = 0; foreach($centerData as $center) :; $i++;?>
        <tr>
            <td> <?= $i ?></td>
            <td><?=$center['center_name'];?> </td>
            <td><?=$center['province'];?> </td>
            <td> <?=$center['district'];?></td>
            <td>
                <a href="<?php echo URL .'collectingcenter/edit/'.$center['id']; ?>" class="mini-button normal"><i class="fas fa-eye"> View</i></a> 
            </td>
            <td>
                <a href="<?php echo URL .'collectingcenter/delete/'.$center['id']; ?>" class="mini-button danger"><i class="fas fa-trash"> Remove</i></a> 
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div>