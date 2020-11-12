<h1>Crop Requests</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab" >Action Need</a></li>
        <li><a id="tab2" href="#" ><i class="fas fa-check-circle"></i>  Accepted</a></li>
        <li><a id="tab3" href="#" ><i class="fas fa-times-circle"></i> Rejected</a></li>
    </ul>
</div>

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
    <div class="banner" style="height:40vh;">
        <h4> No rejected crop requests found</h4>
        <h1><i class="far fa-times-circle icon-color"></i><h1>
        
    </div>

</div>