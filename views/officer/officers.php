<script>
    $(function() {
        var selectedSearchCategory = $('#searchField').val();

        $('#searchField').change(function() {
            selectedSearchCategory = $(this).val();
            $('#test').html(selectedCategory);
        });

        $('#searchBtn').click(function(event) {
            event.preventDefault();
            var input = $('#searchInput').val();
            if (input != '') {
                $('#searchInput').val('');
                location.reload();
            }

        });

        $("#searchInput").keyup(function() {
            var inputVal = $(this).val();
            if (inputVal != '') {
                $('#box').html('');
                switch (selectedSearchCategory) {
                    case 'fname': {
                        $.ajax({
                            url: "ajxSearchOfficerName",
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
                    case 'nic': {
                        $.ajax({
                            url: "ajxSearchOfficerNic",
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

        var selectedSort = 'first_name';
        $('#sortby').change(function() {
            selectedSort = $('#sortby :selected').attr('val');
        });
        // asc
        $('#ascSort').click(function() {
            // alert(selectedSort);
            $('#descSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxFilterFarmer",
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
                url: "ajxFilterFarmer",
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

<h1>Manage Officers</h1>

<div class="user-tabs">
    <ul>
        <?php foreach ($tabs as $tab) : ?>
            <li><a href="<?php echo URL . $tab['path'] ?>"><?= $tab['label'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="filter-panel">
<!-- <div class="tabContainer" id="tab1C"> -->

    <div class="panel-container">
        <div class="pane1">

            <form class="search-bar">
                <label>Search officers by : </label>
                <select id="searchField">
                    <option value="fname">Name</option>
                    <option value="nic">NIC</option>

                </select>
                <input type="text" id="searchInput" placeholder="Search ...">
                <button type="button" id="searchBtn"><i class="fas fa-eraser"></i></button>
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
</div>

<div id="box" class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th>Officer-ID</th>
            <th>Officer Name</th>
            <th>Telephone Number</th>
            <th>Address</th>
            <th><i class="fas fa-users"></i> View</th>
            <th><i class="fas fa-user-times"></i> Remove</th>
        </tr>
        <?php $i = 0;
        foreach ($officerData as $officer) :;
            $i++; ?>
            <tr>
                <td> <?= $i ?></td>
                <td><?= $officer['user_id']; ?> </td>
                <td><?= $officer['first_name']; ?> </td>
                <td>
                    <?php
                    $telAr = explode(',', $officer['telNos']);
                    foreach ($telAr as $tel) {
                        echo "$tel <br> ";
                    }
                    ?>
                </td>
                <td> <?= $officer['address']; ?></td>
                <td>
                    <a href="<?php echo URL . 'user/edit/' . $officer['user_id']; ?>" class="mini-button normal">View</a>
                </td>
                <td>
                    <a href="<?php echo URL . 'officer/delete/' . $officer['user_id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="mini-button danger">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</div>