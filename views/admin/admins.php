<h1>Manage Admins</h1>

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
            <th>Admin-ID</th>
            <th>Admin Name</th>
            <th>Address</th>
            <th><i class="fas fa-users"></i> View</th>
            <th><i class="fas fa-user-times"></i> Remove</th>
        </tr>
<?php $i = 0; foreach($adminData as $admin) :; $i++;?>
        <tr>
            <td> <?= $i ?></td>
            <td><?=$admin['id'];?> </td>
            <td><?=$admin['firstname'];?> </td>
            <td> <?=$admin['address'];?></td>
            <td>
                <a href="<?php echo URL .'user/edit/'.$admin['id']; ?>" class="mini-button normal">View</a>
            </td>
            <td>
                <a href="<?php echo URL .'vendor/delete/'.$admin['id']; ?>" class="mini-button danger">Remove</a>
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div>