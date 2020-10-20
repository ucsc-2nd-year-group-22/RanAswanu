<h1>Damage Claims</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab" >Action Need</a></li>
        <li><a id="tab2" href="#" ><i class="fas fa-check-circle"></i>  Accepted</a></li>
        <li><a id="tab3" href="#" ><i class="fas fa-times-circle"></i> Rejected</a></li>
    </ul>
</div>

<div id="tab1C" class="tabContainer">
    <div class="main-table">
        <table>
            <tr>
                <th>#</th>
                <th>Farmer</th>
                <th>Crops</th>
                <th>Area</th>
                <th>Damage Amount</th>
                <th>Take Action</th>
                <th></th>
                <th></th>
            </tr>
    <?php $i = 0; foreach($dmgClaimData as $dmgClaim) :; $i++;?>
            <tr>
                <td> <?=  $i ?></td>
                <td><?= $dmgClaim['farmer'];?></a> <a href="#"> <i class="fas fa-phone-square icon-color"></i> </a> </td>
                <td><?= $dmgClaim['crops'];?> </td>
                <td> <?= $dmgClaim['area'];?></td>
                <td> <?= $dmgClaim['damageAmt'];?></td>
                <td><button class="mini-button normal"> <i class="fas fa-check-circle"></i> Accept</button> </td>
                <td><button class="mini-button danger"><i class="fas fa-times-circle"></i> Reject</button> </td>
                <td><p><a href="#">Edit Claim ...</a></p></a>
                
            </tr>
    <?php endforeach;?>
        </table>
    </div>
</div>

<div id="tab2C" class="tabContainer">
    <div class="main-table">
    <table>
            <tr>
                <th>#</th>
                <th>Farmer</th>
                <th>Crops</th>
                <th>Area</th>
                <th>Damage Amount</th>
            </tr>
    <?php $i = 0; foreach($dmgClaimData as $dmgClaim) :; $i++;?>
            <tr>
                <td> <?=  $i ?></td>
                <td><?= $dmgClaim['farmer'];?></a> <a href="#"> <i class="fas fa-phone-square icon-color"></i> </a> </td>
                <td><?= $dmgClaim['crops'];?> </td>
                <td> <?= $dmgClaim['area'];?></td>
                <td> <?= $dmgClaim['damageAmt'];?></td>
            </tr>
    <?php endforeach;?>
        </table>
    </div>
</div>


<div id="tab3C" class="tabContainer">
    <div class="banner">
        <h4> No rejected damage claims found</h4>
        <h1><i class="far fa-times-circle icon-color"></i><h1>
    </div>
</div>