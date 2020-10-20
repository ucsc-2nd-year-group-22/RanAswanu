<h1>Crop Requests</h1>

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
                <th>Crop</th>
                <th>Harvest Period</th>
                <th>Area</th>
                <th>Expected harvest</th>
                <th>Demand status</th>
                <th>Take Action</th>
                <th></th>
            </tr>
    <?php $i = 0; foreach($cropReqData as $cropReqItem) :; $i++;?>
            <tr>
                <td> <?=  $i ?></td>
                <td><?= $cropReqItem['farmer'];?></a> <a href="#"> <i class="fas fa-phone-square icon-color"></i> </a> </td>
                <td><?= $cropReqItem['crop'];?> </td>
                <td> <?= $cropReqItem['period'];?></td>
                <td> <?= $cropReqItem['area'];?></td>
                <td> <?= $cropReqItem['harvest'];?></td>
                <td> <?= $cropReqItem['demand'];?></td>
                <td><button class="mini-button normal"> <i class="fas fa-check-circle"></i> Accept</button> </td>
                <td>    <button class="mini-button danger"><i class="fas fa-times-circle"></i> Reject</button> </td>
                
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
                <th>Crop</th>
                <th>Harvest Period</th>
                <th>Area</th>
                <th>Expected harvest</th>
                <th>Demand status</th>
                <th>Date/Time</th>
            </tr>
    <?php $i = 0; foreach($cropReqData as $cropReqItem) :; $i++;?>
            <tr>
                <td> <?=  $i ?></td>
                <td><?= $cropReqItem['farmer'];?></a> <a href="#"> <i class="fas fa-phone-square icon-color"></i> </a> </td>
                <td><?= $cropReqItem['crop'];?> </td>
                <td> <?= $cropReqItem['period'];?></td>
                <td> <?= $cropReqItem['area'];?></td>
                <td> <?= $cropReqItem['harvest'];?></td>
                <td> <?= $cropReqItem['demand'];?></td>
                <td> <?= $cropReqItem['dateTime'];?></td>                              
            </tr>
    <?php endforeach;?>
        </table>
    </div>
</div>


<div id="tab3C" class="tabContainer">
    <div class="banner">
        <h4> No rejected crop requests found</h4>
        <h1><i class="far fa-times-circle icon-color"></i><h1>
    </div>
</div>