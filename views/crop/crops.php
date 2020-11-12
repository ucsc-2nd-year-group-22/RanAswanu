<h1>Manage Crops</h1>

<div class="user-tabs">
    <ul>
    <?php foreach($tabs as $tab) :?>
        <li><a href="<?php echo URL . $tab['path']?>"><?= $tab['label']?></a></li>
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

        <!-- <div class="pane3">
            <label>Empty pane</label>
        </div>
        <div class="pane4">
            <label>Empty pane</label>
        </div> -->
    </div>
</div>

<div class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th>Crop-Varient</th>
            <th>Kg Per m<sup>2</sup></th>
            <th>Harvest Period (Days)</th>
            <th>View</th>
            <th>Remove</th>
        </tr>

<?php $i = 0; foreach($cropData as $cropItem) :; $i++;?>
        <tr>
            <td> <?= $i ?></td>
            <td><?=$cropItem['crop_varient'];?> </td>
            <td><?=$cropItem['harvest_per_land'];?> </td>
            <td> <?=$cropItem['harvest_period'];?></td>
            <td>
                <a href="<?php echo URL .'crop/edit/'.$cropItem['id']; ?>" class="mini-button normal btn"><i class="fas fa-eye"> </i> View</a> 
            </td>
            <td>
            <a href="<?php echo URL .'crop/delete/'.$cropItem['id']; ?>" class="mini-button danger btn"><i class="fas fa-trash"> </i> Remove </a> 
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div>