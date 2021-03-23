<div class="main-table">
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