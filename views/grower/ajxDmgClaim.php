<table>
    <tr>
        <th>#</th>
        <th>Reason</th>
        <th>Damage area</th>
        <th>Gramasewa</th>
        <th>Date</th>
        <th>Crop</th>
        <th>Accepted ?</th>
        <th>Action</th>
    </tr>
    <?php $i = 0;
    foreach ($dmgClaims as $dmgClaim) :;
        $i++; ?>
        <tr>
            <td> <?= $i ?></td>
            <td><?= $dmgClaim['damage_reason']; ?> </td>
            <td><?= $dmgClaim['damage_area']; ?> </td>
            <td><?= $dmgClaim['gs_name']; ?> </td>
            <td><?= $dmgClaim['damage_date']; ?></td>
            <td><?= $dmgClaim['crop_type']; ?> </td>
            <td>
                <?php if ($dmgClaim['is_accepted'] == 0) : ?>
                    <p class="danger-label" style="color:rgb(200, 78, 78);font-weight:bold">No</p>
                <?php else : ?>
                    <p class="danger-label" style="color:#5cca58;font-weight:bold">Yes</p>
                <?php endif; ?>
            </td>

            <?php if ($dmgClaim['is_accepted'] == 0) : ?>
                <td>
                    <a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to update this damage claim?');" href="<?php echo URL . 'farmer/editDmgClaimsForm/' . $dmgClaim['damage_id']; ?>">Update</a>
                    <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to cancel this damage claim?');" href="<?php echo URL . 'farmer/deleteDmgClaim/' . $dmgClaim['damage_id']; ?>">Cancel</a>
                </td>
            <?php else : ?>
                <td><i class="fas fa-ban"></i></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>