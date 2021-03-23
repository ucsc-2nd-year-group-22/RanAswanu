<script>
    $(function() {

        $('#box').html('');
        $.ajax({
            url: "listSellCrops",
            method: "post",
            data: {
                farmer_id: <?php echo Session::get('user_id'); ?>
            },
            dataType: "text",
            success: function(data) {
                $('#box').html(data);
            },
            async: true,
        });

        var selectedSort = 'expected_harvest';
        $('#sortby').change(function() {
            selectedSort = $('#sortby :selected').attr('val');
        });
        // asc
        $('#ascSort').click(function() {
            // alert(selectedSort);
            $('#descSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxSortCropReqs",
                method: "post",
                data: {
                    filter: selectedSort,
                    ascOrDsc: 'ASC'
                },
                dataType: "text",
                success: function(data) {
                    $('#box').html(data);
                },
                async: true
            });
        });
        // desc
        $('#descSort').click(function() {
            $('#ascSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxSortCropReqs",
                method: "post",
                data: {
                    filter: selectedSort,
                    ascOrDsc: 'DESC'
                },
                dataType: "text",
                success: function(data) {
                    $('#box').html(data);
                },
                async: true
            });
        });


        // show accepted
        var selectedFilter;
        $('#showAccepted').click(function() {
            selectedFilter = 'accepted';
            $('#showRejected').removeClass("active-btn");
            $('#showAll').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxFilterCropReq",
                method: "post",
                data: {
                    filter: selectedFilter
                },
                dataType: "text",
                success: function(data) {
                    $('#box').html(data);
                },
                async: true
            });
        });

        $('#showRejected').click(function() {
            selectedFilter = 'rejected';
            $('#showAccepted').removeClass("active-btn");
            $('#showAll').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxFilterCropReq",
                method: "post",
                data: {
                    filter: selectedFilter
                },
                dataType: "text",
                success: function(data) {
                    $('#box').html(data);
                },
                async: true
            });
        });

        $('#showAll').click(function() {
            selectedFilter = 'rejected';
            $('#showAccepted').removeClass("active-btn");
            $('#showRejected').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxListCropReq",
                method: "post",
                data: {
                    farmer_id: <?php echo Session::get('user_id'); ?>
                },
                dataType: "text",
                success: function(data) {
                    $('#box').html(data);
                },
                async: true,
            });
        });

    });
</script>

<h1>Sell Your Crops </h1>

<div class="user-tabs">
    <!--copied from vender offers-->
    <ul>
        <!--    <li><a id="tab1" href="#" class="active-tab" ><i class="fas fa-users"></i> View farmers</a></li>   -->
        <!--   <?php if (Session::get('isadmin') != 1) : ?>  -->
        <li><a id="tab4" href="<?php URL; ?>../farmer/sellyourcrops"><i class="fas fa-user-plus"></i> New </a></li>
        <!--    <?php endif ?> -->
    </ul>
</div>

<div class="panel-container">
    <div class="pane1">

        <form class="search-bar">
            <label>Search crop requests by : </label>
            <select placeholder="Search ...">
                <option>State</option>
                <option>Crop Type</option>
                <option>District</option>
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
                <option>Crop Type</option>
                <option>District</option>
            </select>
            <button type="submit" class="half"><i class="fas fa-sort-amount-down-alt"></i> Smaller-first </button>
            <button type="submit" class="half"><i class="fas fa-sort-amount-down"></i> Larger-first</button>
        </form>
    </div>

    <!-- Comment pane 3 & 4 If they are empty -->

    <!--   <div class="pane3">
         <label>Empty pane</label>
    </div>
    <div class="pane4">
        <label>Empty pane</label>
    </div>    -->
    
</div>

<div id="box" class="main-table">

</div>