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

});

</script>

<div id="test">

</div>
<h1>Damage Claims</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab"><i class="fas fa-list"></i> View All</a></li>
        <?php if (Session::get('isadmin') != 1) : ?>
            <!-- <li><a id="tab2" href="#" ><i class="fas fa-user-edit"></i> Update</a></li>
        <li><a id="tab3" href="#" ><i class="fas fa-user-times"></i> Delete</a></li> -->
            <li><a id="tab4" href="newDmgClaimForm"" ><i class=" fas fa-plus-circle"></i> New damage claim</a></li>
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
                    <!-- <option val="crop_type" selected>Crop type</option>
                    <option val="cetner">Collectin center</option> -->
                    <option val="expected_harvest">Area size</option>
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