<script>
    $(function() {

        $('#box').html('');
        $.ajax({
            url: "AllCrops",
            method: "post",
            data: {
            
            },
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

<!--<?php echo $sellingReq['name'];?>-->
<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab" >All</a></li>
        <li><a id="tab2" href="#" >My Offers</a></li>
   
    </ul>
</div>

<div class="filter-panel">

        <div class="panel-container">
            <div class="pane1">

            <form class="search-bar">
                <label>Search Crop By : </label>
                <select >
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


<div id="tab1C" class="tabContainer">
    <h2>All</h2>
    
    <div id = "box" class="main-table">
        
    </div>

</div>

<div id="tab2C" class="tabContainer">
    <h2>Offers Sent</h2>
   
    <?php if(sizeof($myOffers) > 0){ ?>
    <!-- //////////////// -->
    <div id ="boxO" class="main-table">
    
       
    </div>
    <?php } else { ?>

    <div class="banner">
        <h4> No varitents found</h4>
        <h1><i class="far fa-times-circle icon-color"></i><h1>
    </div>

    <?php } ?>

</div>



<?php
if(isset($this->js))
    echo '<script src="'.URL.'views/'.$this->js.'.js"></script>'; // want to now what happens here
    ?>