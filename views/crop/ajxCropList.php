<div class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th>Crop-Name</th>
            <th>Crop Varient</th>
            <th>Kg Per m<sup>2</sup></th>
            <th>Harvest Period (Days)</th>
            <th>Best Area</th>
            <th>View</th>
            <th>Remove</th>
        </tr>

        <?php $i = 0;
        foreach ($cropItems as $cropItem) :;
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