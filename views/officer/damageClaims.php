<script>
    $(function() {
        var selectedSort = "first_name";
        var selectedFilter;
        $('#box').html('');
        $.ajax({
            url: "ajxDmgClaimList",
            method: "post",
            dataType: "text",
            success: function(data) {
                $('#box').html(data);
            },
            async: true,
        });


        ///////////////////////////// SHow accepted/ pending

        // show accepted

        $('#showAccepted').click(function() {
            selectedFilter = 'accepted';
            $('#showPending').removeClass("active-btn");
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


        ////////////////// sorting ////////

        $("#sortby").change(function() {
            selectedSort = $("#sortby :selected").attr("value");
            // alert(selectedSort);
        });

        // asc
        $("#ascSort").click(function() {
            // alert(selectedSort);
            $("#descSort").removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxSortCropReqs",
                method: "post",
                data: {
                    filter: selectedSort,
                    ascOrDsc: "ASC",
                },
                dataType: "text",
                success: function(data) {
                    $("#box").html(data);
                },
                async: true,
            });
        });

        // desc
        $("#descSort").click(function() {
            $("#ascSort").removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxSortCropReqs",
                method: "post",
                data: {
                    filter: selectedSort,
                    ascOrDsc: "DESC",
                },
                dataType: "text",
                success: function(data) {
                    $("#box").html(data);
                },
                async: true,
            });
        });



        ///// searching ////////////

        var selectedSearchCategory = $("#searchField").val();

        $("#searchField").change(function() {
            selectedSearchCategory = $(this).val();
        });

        $("#searchBtn").click(function(event) {
            event.preventDefault();
            var input = $("#searchInput").val();
            if (input != "") {
                $("#searchInput").val("");
                location.reload();
            }
        });
        $("#searchInput").keyup(function() {
            var inputVal = $(this).val();
            if (inputVal != "") {
                $("#box").html("");
                switch (selectedSearchCategory) {
                    case "first_name": {
                        $.ajax({
                            url: "<?= URL ?>/officer/ajxSearchCropReq",
                            method: "post",
                            data: {
                                search: inputVal,
                            },
                            dataType: "text",
                            success: function(data) {
                                $("#box").html(data);
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


    });
</script>


<h1>Damage Claims</h1>

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

<div id="box" class="main-table">

</div>