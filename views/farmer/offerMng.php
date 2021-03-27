<script>
    $(function() {

        $('#box').html('');
        $.ajax({
            url: "offerList",
            method: "post",
            dataType: "text",
            success: function(data) {
                $('#box').html(data);
            },
            async: true,
        });

        // sorting
        var selectedSort = 'offer_amount';
        $('#sortby').change(function() {
            selectedSort = $('#sortby :selected').attr('val');
        });
        // asc
        $('#ascSort').click(function() {
            $('#descSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxSortOffers",
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
                url: "ajxSortOffers",
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



        ///
        // show accepted
        var selectedFilter;
        $('#showAccepted').click(function() {
            selectedFilter = 'accepted';
            $('#showRejected').removeClass("active-btn");
            $('#showAll').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "filterOffers",
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
                url: "filterOffers",
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
                url: "offerList",
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

<h1>Vender Offers</h1>

<div class="panel-container">
    <form class="pane1 ">
        <label>Show accepted / pending </label>
        <div class="normal-select">
            <button type="button" id="showAccepted" class="half"><i class="fas fa-sort-amount-down-alt"></i> Accepted </button>
            <button type="button" id="showRejected" class="half"><i class="fas fa-sort-amount-down"></i> Pending</button>
            <button type="button" id="showAll" style="width:100%" class="half"><i class="fas fa-sort-amount-down"></i> Show All</button>
        </div>
    </form>
    <div class="pane2">
        <!-- sort bar -->
        <form class="normal-select">
            <label>Sort damage claims by : </label>
            <select id="sortby">
                <option val="offer_amount">Offer price</option>
                <option val="dateTime">Date</option>
            </select>
            <button type="button" id="ascSort" class="half"><i class="fas fa-sort-amount-down-alt"></i> Ascending </button>
            <button type="button" id="descSort" class="half"><i class="fas fa-sort-amount-down"></i> Descending</button>
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