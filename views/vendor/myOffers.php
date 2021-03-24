<script>
    $(function() {

        $('#box').html('');
        $.ajax({
            url: "loadOffers",
            method: "post",
            dataType: "text",
            success: function(data) {
                $('#box').html(data);
            },
            async: true,
        });

        ///////////NEW BOX FUNCTION FOR VIEW OFFERS///////////////

        // $('#boxO').html('');
        // $.ajax({
        //     url: "AllOffers",
        //     method: "post",
        //     data: {

        //     },
        //     dataType: "text",
        //     success: function(data) {
        //         $('#box').html(data);
        //     },
        //     async: true,
        // });
        ///////////////////////////////////////////
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


<div class="filter-panel">

    <div class="panel-container">
        <div class="pane1">

            <form class="search-bar">
                <label>Search Crop By : </label>
                <select>
                    <option>Farmer-ID</option>
                    <option>Farmer Name</option>
                    <option>Crop Type</option>
                </select>
                <input type="text" placeholder="Search ...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

        </div>
        <div class="pane2">
            <form class="normal-select">
                <label>Sort Crop By : </label>
                <select placeholder="other">
                    <option>Date</option>
                    <option>Weight</option>
                </select>
                <button type="submit" class="half"><i class="fas fa-sort-amount-down-alt"></i> Smaller-first </button>
                <button type="submit" class="half"><i class="fas fa-sort-amount-down"></i> Larger-first</button>
            </form>
        </div>

        <div class="pane3">

            <form class="search-bar">
                <label>Select District : </label>
                <input type="text" placeholder="Search ...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

        </div>
    </div>

</div>
<div id="box" class="main-table">

</div>