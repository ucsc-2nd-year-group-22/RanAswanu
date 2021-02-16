<script>
    $(function() {

        $('#box').html('');
        $.ajax({
            url: "ajxListCropReq",
            method: "post",
            data: {farmer_id: <?php echo Session::get('user_id');?>},
            dataType: "text",
            success: function(data) {
                $('#box').html(data);
            },
            async: true,
        });


    });
</script>
<div id="test">

</div>
<h1>Crop Requests</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab"><i class="fas fa-list"></i> View All</a></li>
        <?php if (Session::get('isadmin') != 1) : ?>
            <!-- <li><a id="tab2" href="#" ><i class="fas fa-user-edit"></i> Update</a></li>
        <li><a id="tab3" href="#" ><i class="fas fa-user-times"></i> Delete</a></li> -->
            <li><a id="tab4" href="newCropReqForm"" ><i class=" fas fa-plus-circle"></i> New crop request</a></li>
        <?php endif ?>
    </ul>
</div>

<div class="tabContainer" id="tab1C">
    <div class="panel-container">
        <div class="pane1">
            <!-- Search bar -->
            <form class="search-bar">
                <label>Search crop requests by : </label>
                <select id="searchField">
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
                <label>Sort farmers by : </label>
                <select id="sortby">
                    <option val="first_name" selected>First name</option>
                    <option val="last_name">Last name</option>
                    <option val="regdate">Registered Data</option>
                </select>
                <button type="button" id="ascSort" class="half"><i class="fas fa-sort-amount-down-alt"></i> Ascending </button>
                <button type="button" id="descSort" class="half"><i class="fas fa-sort-amount-down"></i> Descending</button>
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

    <div id="box" class="main-table">
        ss
    </div>
</div>