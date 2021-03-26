<h1>Damage Claims</h1>

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

<div class="main-table">
        <table>
            <tr>
                <th>#</th>
                <th>Farmer</th>
                <th>Crops</th>
                <th>Area</th>
                <th>Damage Amount</th>
                <th>Take Action</th>    
            </tr>
    <?php $i = 0; foreach($dmgClaimData as $dmgClaim) :; $i++;?>
            <tr>
                <td> <?=  $i ?></td>
                <td> <a  style="font-size:1.2em; margin-right:5px;color:var(--main-theme-color);" href="#"> <i class="fas fa-address-card"></i></a>   <?= $dmgClaim['farmer'];?></a> </td>
                <td><?= $dmgClaim['crops'];?> </td>
                <td> <?= $dmgClaim['area'];?></td>
                <td> <?= $dmgClaim['damageAmt'];?></td>
                <td>
                    <a class="mini-button btn"> <i class="fas fa-check-circle"></i> Accept</a> 
                    <a class="btn mini-button warning" href="<?= URL; ?>officer/editDmg"><i class="fas fa-edit"></i> Edit Claim</a>
                    <a class="btn mini-button danger"><i class="fas fa-times-circle"></i> Reject</a>
                </td>
            </tr>
    <?php endforeach;?>
        </table>
    </div>