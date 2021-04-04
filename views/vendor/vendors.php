<h1>Manage Vendors</h1>

<div class="user-tabs">
    <ul>
        <?php foreach ($tabs as $tab) : ?>
            <li><a href="<?php echo URL . $tab['path'] ?>"><?php $tab['label'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="filter-panel">
    <div class="panel-container">
        <div class="pane1">

            <form class="search-bar">
                <label>Search admins by : </label>
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
                <label>Sort admins by : </label>
                <select id="sortby">
                    <option val="first_name" selected>First name</option>
                    <option val="last_name">Last name</option>
                    <option val="user_registered_time">Registered Date</option>
                </select>
                <button type="button" id="ascSort" class="half"><i class="fas fa-sort-amount-down-alt"></i> Ascending </button>
                <button type="button" id="descSort" class="half"><i class="fas fa-sort-amount-down"></i> Descending</button>
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
            <th>Vendor-ID</th>
            <th>Vendor Name</th>
            <th>Telephone Number</th>
            <th>NIC</th>
            <th>Address</th>
            <th><i class="fas fa-users"></i> View User</th>
            <th><i class="fas fa-user-times"></i> Remove User</th>
        </tr>
        <?php $i = 0;
        foreach ($vendorData as $vendor) :;
            $i++; ?>
            <tr>
                <td> <?php echo $i ?></td>
                <td><?php echo $vendor['user_id']; ?> </td>
                <td><?php echo $vendor['first_name']; ?> </td>
                <td>
                    <?php
                    $telAr = explode(',', $vendor['telNos']);
                    foreach ($telAr as $tel) {
                        echo "$tel <br> ";
                    }
                    ?>
                </td>
                <td> <?php echo $vendor['nic']; ?></td>
                <td> <?php echo $vendor['address']; ?></td>
                <td>
                    <a href="<?php echo URL . 'user/edit/' . $vendor['user_id']; ?>" class="mini-button normal">View</a>
                </td>
                <td>
                    <a href="<?php echo URL . 'vendor/delete/' . $vendor['user_id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="mini-button danger">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

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
                            url: "ajxSearchVendorName",
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
                            url: "ajxSearchVendorNic",
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
                url: "ajxFilterVendor",
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
                url: "ajxFilterVendor",
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