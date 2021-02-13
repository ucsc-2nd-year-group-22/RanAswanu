<script>

$(function() {
    var selectedSearchCategory = $('#searchField').val();

    $('#searchField').change(function() {
        selectedSearchCategory = $(this).val();
        $('#test').html(selectedCategory);
    });

    $('#searchBtn').click(function(event){
        event.preventDefault();
        var input = $('#searchInput').val();
        if(input != '') {
            $('#searchInput').val('');
            location.reload();
        }
        
    });

    $("#searchInput").keyup(function() {
        var inputVal = $(this).val();
        if(inputVal != '') {
            $('#box').html('');
            switch(selectedSearchCategory) {
                case 'fname': {
                    $.ajax({
                        url:"ajxSearchFarmerName",
                        method:"post",
                        data:{search:inputVal},
                        dataType:"text",
                        success:function(data) {
                            $('#box').html(data);
                        },
                        async:true,
                    });
                    break;
                }
                case 'nic' : {
                    $.ajax({
                        url:"ajxSearchFarmerNic",
                        method:"post",
                        data:{search:inputVal},
                        dataType:"text",
                        success:function(data) {
                            $('#box').html(data);
                        },
                        async:true,
                    });
                    break;
                }
            }
        } else {
            location.reload();
        }
    });

    
     
});

</script>
<div id="test">

</div>
<h1>Farmer Management</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab" ><i class="fas fa-users"></i> View farmers</a></li>
        <?php if(Session::get('isadmin') != 1): ?>
        <!-- <li><a id="tab2" href="#" ><i class="fas fa-user-edit"></i> Update</a></li>
        <li><a id="tab3" href="#" ><i class="fas fa-user-times"></i> Delete</a></li> -->
        <li><a id="tab4" href="<?php URL ;?>../user/register" ><i class="fas fa-user-plus"></i> New farmer</a></li>
        <?php endif ?>
    </ul>
</div>

<div class="tabContainer" id="tab1C">
    
    <div class="panel-container">
    <div class="pane1">
    <!-- Search bar -->
        <form class="search-bar">
            <label>Search crop requests by : </label>
            <select id = "searchField">
                <option value="fname">Name</option>
                <option value="nic">NIC</option>
                
            </select>
            <input type="text" id="searchInput" placeholder="Search ...">
            <button type="button" id="searchBtn"><i class="fas fa-eraser"></i></button>
        </form>

    </div>
    <div class="pane2">
    <!-- sort bar -->
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
<!-- 
    <div class="pane3">
         <label>Empty pane</label>
    </div>
    <div class="pane4">
        <label>Empty pane</label>
    </div> -->
</div> 

<!-- <div id="box" style="border:1px solid">
    This is box
</div> -->

    <div id="box" class="main-table">
        <table>
            <tr>
                <th>#</th>
                <th style="text-align:center;" >View Profile</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Contact</th>
                <th>NIC</th>
                <th>Email address</th>
              <?php if(Session::get('isadmin') != 1): ?>
                <th>Action</th>
              <?php endif ?>
            </tr>
        <?php $i = 0; foreach($farmerData as $farmer) :; $i++;?>
            <tr>
                <td> <?=  $i ?></td>
                <td style="text-align:center;"><a  class="table-icon" href="<?php echo URL . 'user/viewUser/' . $farmer['user_id'] ;?>"> <i class="fas fa-address-card"></i></a></td>
                <td><?= $farmer['first_name'];?> </td>
                <td><?= $farmer['last_name'];?> </td>
                <td> 
                    <?php 
                        $telAr = explode(',', $farmer['telNos']); 
                        foreach($telAr as $tel) {
                            echo "$tel <br> ";
                        }
                    ?>
                </td>
                <td><?= $farmer['nic'];?> </td>
                <td><?= $farmer['email'];?> </td>
                <?php if(Session::get('isadmin') != 1): ?>
                <td>
                    <a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to update this user?');" href="<?php echo URL . 'user/edit/' . $farmer['user_id'] ;?>">Update</a>
                    <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo URL . 'user/delete/' . $farmer['user_id'] ;?>">Delete</a>
                </td>
                <?php endif ?>
            </tr>
        <?php endforeach;?>
        </table>
    </div>
</div>