<h1>Crop Requests</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab" >Action Need</a></li>
        <li><a id="tab2" href="#" >Accepted</a></li>
        <li><a id="tab3" href="#" >Rejected</a></li>
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
                <td><?= $cropReqItem['farmer'];?> </td>
                <td><?= $cropReqItem['crop'];?> </td>
                <td> <?= $cropReqItem['period'];?></td>
                <td> <?= $cropReqItem['area'];?></td>
                <td> <?= $cropReqItem['harvest'];?></td>
                <td> <?= $cropReqItem['demand'];?></td>
                <td><button class="mini-button normal">Accept</button> </td>
                <td>    <button class="mini-button danger">Reject</button> </td>
                
            </tr>
    <?php endforeach;?>
        </table>
    </div>
</div>
