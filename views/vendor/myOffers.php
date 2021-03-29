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

    
        var selectedSort = 'max_offer';
        $('#sortby').change(function() {
            selectedSort = $('#sortby :selected').attr('val');
        });
        // asc
        $('#ascSort').click(function() {

            $('#descSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxSortCrops",
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

        //descending 
        $('#descSort').click(function() {
            //alert(selectedSort)
            $('#ascSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxSortCrops",
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

        //search
        var selectedSearchCategory = $('#searchField').val();

        $('#searchField').change(function() {
            selectedSearchCategory = $(this).val();
            // $('#test').html(selectedCategory);
        });

        $('#searchBtn').click(function(event) {
            event.preventDefault();
            var input = $('#searchInput').val();
            if (input != '') {
                location.reload();
                $('#searchInput').val('');
            }

        });

        $("#searchInput").keyup(function() {
            var inputVal = $(this).val();
            if (inputVal != '') {
                $('#box').html('');
                switch (selectedSearchCategory) {
                    case 'crop_type': {
                        $.ajax({
                            url: "ajxSearchCrops",
                            method: "post",
                            data: {
                                search: inputVal
                            },
                            dataType: "text",
                            success: function(data) {
                                $('#box').html(data);
                            },
                            async: true,
                        });
                        break;
                    }
                    case 'ds_name': {
                        $.ajax({
                            url: "ajxSearchCropsdistrict",
                            method: "post",
                            data: {
                                search: inputVal
                            },
                            dataType: "text",
                            success: function(data) {
                                $('#box').html(data);
                            },
                            async: true,
                        });
                        break;
                    }
                }
            } else {
                location.reload();
            }
        });




        /*
         var amount = 'expected_harvest';
         $('#sorts').change(function() {
             amount = $('#sorts :selected').attr('val');
         });
         

         })*/


    });
</script>


<!-- <div class="filter-panel">

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

</div> -->

<div class="filter-panel">

<div class="panel-container">

        <div class="pane1">

            <form class="search-bar">
                <label>Search Crops by : </label>
                <select id="searchField">
                    <option value="crop_type">Crops Name</option>
                    <option value="ds_name">District</option>

                </select>
                <input type="text" id="searchInput" placeholder="Search ...">
                <button type="button" id="searchBtn"><i class="fas fa-eraser"></i></button>
            </form>

        </div>


        <div class="pane2">
            <form class="normal-select">
                <label>Sort crop requests by : </label>
                <select id="sortby">

                    <option val="max_offer">Price</option>
                    <option val="harvest_amount">Weight</option>
                </select>

                <button type="button" id="ascSort" class="half"><i class="fas fa-sort-amount-down-alt"></i> Ascending </button>
                <button type="button" id="descSort" class="half"><i class="fas fa-sort-amount-down"></i> Descending</button>
            </form>
        </div>


    </div>
    </div>
<div id="box" class="main-table">

</div>