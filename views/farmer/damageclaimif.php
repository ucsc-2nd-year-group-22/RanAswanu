<h1>Damage claim </h1>


<!--http://localhost/mvc-ui-embeded/farmer/farmerMng  -->


<div class="user-tabs">                 
    <ul>
    <!--    <li><a id="tab1" href="#" class="active-tab" ><i class="fas fa-users"></i> View farmers</a></li>   -->
        <?php if(Session::get('isadmin') != 1): ?>
        <li><a id="tab4" href="<?php URL ;?>../farmer/damageclaim" ><i class="fas fa-user-plus"></i> New </a></li>
        <?php endif ?>
    </ul>
</div>

<!--
<div class="tabContainer" id="tab1C">
    <h2>View all reegistered farmers</h2>
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
   
     
</div> 

 -->

   <!-- Table -->
   <div class="main-table">
        <table>
            <tr>
                <th>#</th>
                <th>Damaged date</th>
                <th>District</th>
                <th>Address</th>
                <th>Approval</th>        <!--accept / reject / pending -->
                <th>Take Action</th>           <!-- view submited form / delete form -->
            </tr>
        <?php $i = 0; foreach($damageclaimData as $dmgclaim) :; $i++;?>
            <tr>
                <td> <?=  $i ?></td>
                <td><?= $dmgclaim['dmgdate'];?> </td>
                <td><?= $dmgclaim['district'];?> </td>
                <td><?= $dmgclaim['address'];?> </td>
                <td><?= $dmgclaim['approval'];?> </td>
                <td>
                    <a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to update this user?');" href="<?php echo URL . 'farmer/edit/' . $dmgclaim['dmgid'] ;?>">Edit</a>
                    <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this damageclaim data?');" href="<?php echo URL . '/farmer/delete/' . $dmgclaim['dmgid'] ;?>">Delete</a>
                </td>

               <!-- <td><button class="mini-button normal"> <i class="fas fa-check-circle"></i> Accept</button> </td> -->
            <!--    <td>    <button class="mini-button danger"><i class="fas fa-times-circle"></i> Delete</button> </td> -->
            <!--    <td><a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to edit this user?');" href="<?php echo URL . 'user/edit/' . $officer['id'] ;?>">Edit</a></td>   -->
            </tr>
        <?php endforeach;?>
        </table>
    </div>

</div>

<!-- Tab 2 Delete -->
<!--
<div id="tab3C" class="tabContainer">
    <h2>Carefull ! You are going to delete farmers</h2>
    
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
        -->
    <!-- Comment pane 3 & 4 If they are empty -->

<!--    
    <div class="pane3">
         <label>Empty pane</label>
    </div>
    <div class="pane4">
        <label>Empty pane</label>
    </div>
</div>                            -->
      
   <!-- Table -->
<!--   
    <div class="main-table">
        <table>
            <tr>
                <th>#</th>
                <th>Farmer-ID</th>
                <th>First Name</th>
                <th>Last name</th>
                <th>NIC</th>
                <th>Cotact</th>
                <th>email</th>
                <th>Action</th>
            </tr>
        <?php $i = 0; foreach($officerData as $officer) :; $i++;?>
            <tr>
                <td> <?=  $i ?></td>
                <td><?= $officer['id'];?> </td>
                <td><?= $officer['firstname'];?> </td>
                <td><?= $officer['lastname'];?> </td>
                <td><?= $officer['nic'];?> </td>
                <td><?= $officer['tel'];?> </td>
                <td><?= $officer['email'];?> </td>
                <td><a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo URL . '/user/delete/' . $officer['id'] ;?>">Delete</a></td>
            </tr>
        <?php endforeach;?>
        </table>
    </div>
        -->
    
</div>


