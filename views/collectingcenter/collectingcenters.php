<h1>Manage Collecting Centers</h1>

<div class="user-tabs">
    <ul>
        <?php foreach ($tabs as $tab) : ?>
            <li><a href="<?php echo URL . $tab['path'] ?>"><?= $tab['label'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="filter-panel">
    <div class="panel-container">
        <div class="pane1">

            <form class="search-bar">
                <label>Search crops by : </label>
                <select id="searchField">
                    <option value="center_name">Col. Center Name</option>
                    <option value="ds_name">District</option>
                </select>
                <input type="text" id="searchInput" placeholder="Search ...">
                <button type="button" id="searchBtn"><i class="fas fa-eraser"></i></button>
            </form>

        </div>
        <div class="pane2">
            <form class="normal-select">
                <label>Sort crops by : </label>
                <select id="sortby">
                    <option val="center_name" selected>Center Name</option>
                    <option val="district.ds_name">District</option>
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
            <th>Col. Center Name</th>
            <th>District</th>
            <th>View Col. Center</th>
            <th>Remove Col. Center</th>
        </tr>
        <?php $i = 0;
        foreach ($centerData as $center) :;
            $i++; ?>
            <tr>
                <td> <?= $i ?></td>
                <td><?= $center['center_name']; ?> </td>
                <td> <?= $center['ds_name']; ?></td>
                <td>
                    <a href="<?php echo URL . 'collectingcenter/edit/' . $center['center_id']; ?>" class="mini-button normal btn"><i class="fas fa-eye"> </i> View</a>
                </td>
                <td>
                    <a href="<?php echo URL . 'collectingcenter/delete/' . $center['center_id']; ?>" onclick="return confirm('Are you sure you want to delete this center?');" class="mini-button danger btn"><i class="fas fa-trash"> </i> Remove</a>
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
                    case 'center_name': {
                        $.ajax({
                            url: "ajxSearchCentName",
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
                            url: "ajxSearchDisName",
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

        var selectedSort = 'center_name';
        $('#sortby').change(function() {
            selectedSort = $('#sortby :selected').attr('val');
        });
        // asc
        $('#ascSort').click(function() {
            // alert(selectedSort);
            $('#descSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxFilterCenter",
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
                url: "ajxFilterCenter",
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