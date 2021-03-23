<script>
    $(function() {

        $('#box').html('');
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
                url:"ajxSortCropReqs",
                method:"post",
                data:{filter:selectedSort, ascOrDsc:'ASC'},
                dataType:"text",
                success:function(data) {
                    
                    $('#box').html(data);
                },
                async:true
            });
        });
        // desc
        $('#descSort').click(function() {
            $('#ascSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url:"ajxSortCropReqs",
                method:"post",
                data:{filter:selectedSort, ascOrDsc:'DESC'},
                dataType:"text",
                success:function(data) {
                    $('#box').html(data);
                },
                async:true
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
                url:"ajxFilterCropReq",
                method:"post",
                data:{filter:selectedFilter},
                dataType:"text",
                success:function(data) {
                    $('#box').html(data);
                },
                async:true
            });
        });

        $('#showRejected').click(function() {
            selectedFilter = 'rejected';
            $('#showAccepted').removeClass("active-btn");
            $('#showAll').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url:"ajxFilterCropReq",
                method:"post",
                data:{filter:selectedFilter},
                dataType:"text",
                success:function(data) {
                    $('#box').html(data);
                },
                async:true
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
        <!-- accepted/ rejected filter -->
        <form class="pane1 ">
            <label>Show accepted / rejected </label>
            <div class="normal-select">
                <button type="button" id="showAccepted" class="half"><i class="fas fa-sort-amount-down-alt"></i> Accepted </button>
                <button type="button" id="showRejected" class="half"><i class="fas fa-sort-amount-down"></i> Rejected</button>
                <button type="button" id="showAll" style="width:100%" class="half"><i class="fas fa-sort-amount-down"></i> Show All</button>
            </div>
        </form>

        <div class="pane2">
            <!-- sort bar -->
            <form class="normal-select">
                <label>Sort crop requests by : </label>
                <select id="sortby">
                    <!-- <option val="crop_type" selected>Crop type</option>
                    <option val="cetner">Collectin center</option> -->
                    <option val="expected_harvest">Expected harvest</option>
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
        
    </div>
</div>