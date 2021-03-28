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
                url: "<?= URL ?>/officer/ajxFilterDmgClaim",
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
                url: "<?= URL ?>/officer/ajxFilterDmgClaim",
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
                url: "ajxDmgClaimList",
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
                url: "ajxSortDmgClaims",
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
                url: "ajxSortDmgClaims",
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
                            url: "<?= URL ?>/officer/ajxSearchDmgClaim",
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
            <select id="searchField">
                <option value="first_name">Farmer name</option>
            </select>
            <input type="text" id="searchInput" placeholder="Search ..." />
            <button type="button" id="searchBtn">
                <i class="fas fa-eraser"></i>
            </button>
        </form>

    </div>
    <div class="pane2">
        <form class="normal-select">
            <label>Sort farmers by : </label>
            <select id="sortby">
                <option value="first_name" selected>Farmer's name</option>
                <option value="last_name">Last name</option>
                <option value="damageAmt">Damage Amount</option>
                <option value="area">Area</option>
            </select>
            <button type="button" id="ascSort" class="half">
                <i class="fas fa-sort-amount-down-alt"></i> Ascending
            </button>
            <button type="button" id="descSort" class="half">
                <i class="fas fa-sort-amount-down"></i> Descending
            </button>
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