<h1>Manage Crops</h1>

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
                    <option value="crop_type">Crop Name</option>
                    <option value="crop_varient">Crop Varient</option>
                </select>
                <input type="text" id="searchInput" placeholder="Search ...">
                <button type="button" id="searchBtn"><i class="fas fa-eraser"></i></button>
            </form>

        </div>
        <div class="pane2">
            <form class="normal-select">
                <label>Sort crops by : </label>
                <select id="sortby">
                    <option val="harvest_per_land" selected>Harvest per land</option>
                    <option val="harvest_period">Harvest period</option>
                    <option val="crop_type">Crop Name</option>
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
            <th>Crop-Name</th>
            <th>Crop Varient</th>
            <th>kg Per ha</sup></th>
            <th>Harvest Period (Days)</th>
            <th>Best Area</th>
            <th>View</th>
            <th>Remove</th>
        </tr>

        <?php $i = 0;
        foreach ($cropData as $cropItem) :;
            $i++; ?>
            <tr>
                <td> <?= $i ?></td>
                <td><?= $cropItem['crop_type']; ?> </td>
                <td><?= $cropItem['crop_varient']; ?> </td>
                <td><?= $cropItem['harvest_per_land']; ?> </td>
                <td> <?= $cropItem['harvest_period']; ?></td>
                <td> <?= $cropItem['ds_name']; ?></td>
                <td>
                    <a href="<?php echo URL . 'crop/edit/' . $cropItem['crop_id']; ?>" class="mini-button normal btn"><i class="fas fa-eye"> </i> View</a>
                </td>
                <td>
                    <a href="<?php echo URL . 'crop/delete/' . $cropItem['crop_id']; ?>" onclick="return confirm('Are you sure you want to delete this crop?');" class="mini-button danger btn"><i class="fas fa-trash"> </i> Remove </a>
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
                    case 'crop_type': {
                        $.ajax({
                            url: "ajxSearchCropType",
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
                    case 'crop_varient': {
                        $.ajax({
                            url: "ajxSearchCropVar",
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

        var selectedSort = 'harvest_per_land';
        $('#sortby').change(function() {
            selectedSort = $('#sortby :selected').attr('val');
        });
        // asc
        $('#ascSort').click(function() {
            // alert(selectedSort);
            $('#descSort').removeClass("active-btn");
            $(this).addClass("active-btn");
            $.ajax({
                url: "ajxFilterCrop",
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
                url: "ajxFilterCrop",
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