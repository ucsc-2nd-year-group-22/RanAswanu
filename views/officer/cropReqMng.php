<script>
    $(function() {

        $('#box').html('');
        $.ajax({
            url: "ajxCropReqList",
            method: "post",
            dataType: "text",
            success: function(data) {
                $('#box').html(data);
            },
            async: true,
        });


        ///////////////////////////// SHow accepted/ pending

        // show accepted
        var selectedFilter;
        $('#showAccepted').click(function() {
            selectedFilter = 'accepted';
            $('#showRejected').removeClass("active-btn");
            $('#showAll').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "<?= URL ?>/officer/ajxFilterCropReq",
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

        $('#showPending').click(function() {
            selectedFilter = 'pending';
            $('#showAccepted').removeClass("active-btn");
            $('#showAll').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "<?= URL ?>/officer/ajxFilterCropReq",
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
            $('#showPending').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxCropReqList",
                method: "post",
                dataType: "text",
                success: function(data) {
                    $('#box').html(data);
                },
                async: true,
            });
        });

    });
</script>

<h1>Crop Requests</h1>

<div class="panel-container">
    <div class="pane1">

        <form class="search-bar">
            <label>Search crop requests by : </label>
            <select placeholder="Search ...">
                <option value="first_name">Farmer's name</option>
            </select>
            <input type="text" placeholder="Search ...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

    </div>
    <div class="pane2">
        <form class="normal-select">
            <label>Sort crop requests by : </label>
            <select placeholder="other">
                <option value="first_name">Farmer's name</option>
                <option value="expected_harvest">expected_harvest</option>
                <option value="crop_type">crop_type</option>
                <option value="center_name">center_name</option>
            </select>
            <button type="submit" id="ascSort" class="half"><i class="fas fa-sort-amount-down-alt"></i> Smaller-first </button>
            <button type="submit" id="descSort" class="half"><i class="fas fa-sort-amount-down"></i> Larger-first</button>
        </form>
    </div>

    <!-- Comment pane 3 & 4 If they are empty -->

    <div class="pane3">
        <form class="pane1 ">
            <label>Show accepted / pending </label>
            <div class="normal-select">
                <button type="button" id="showAccepted" class="half"><i class="fas fa-sort-amount-down-alt"></i> Accepted </button>
                <button type="button" id="showPending" class="half"><i class="fas fa-sort-amount-down"></i> Pending</button>
                <button type="button" id="showAll" style="width:100%" class="half"><i class="fas fa-sort-amount-down"></i> Show All</button>
            </div>
        </form>
    </div>
    <!-- <div class="pane4">
        <label>Empty pane</label>
    </div> -->
</div>

<div id="box" class="main-table">

</div>