<script>
    $(function() {

        $('#box').html('');
        $.ajax({
            url: "damageClaimList",
            method: "post",
            dataType: "text",
            success: function(data) {
                $('#box').html(data);
            },
            async: true,
        });

        // show accepted
        var selectedFilter;
        $('#showAccepted').click(function() {
            selectedFilter = 'accepted';
            $('#showRejected').removeClass("active-btn");
            $('#showAll').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxFilterDmg",
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
                url: "ajxFilterDmg",
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
                url: "damageClaimList",
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



        var selectedSort = 'damage_area';
        $('#sortby').change(function() {
            selectedSort = $('#sortby :selected').attr('val');
        });
        // asc
        $('#ascSort').click(function() {
            $('#descSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxSortDmg",
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
                url: "ajxSortDmg",
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

    });
</script>

<div id="test">

</div>
<h1>Damage Claims</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab"><i class="fas fa-list"></i> View All</a></li>
        <?php if (Session::get('isadmin') != 1) : ?>
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
                <label>Sort damage claims by : </label>
                <select id="sortby">
                    <option val="damage_area">Damage area</option>
                    <option val="damage_date">Date</option>
                </select>
                <button type="button" id="ascSort" class="half"><i class="fas fa-sort-amount-down-alt"></i> Ascending </button>
                <button type="button" id="descSort" class="half"><i class="fas fa-sort-amount-down"></i> Descending</button>
            </form>
        </div>

    </div>

    <div id="box" class="main-table">

    </div>
</div>