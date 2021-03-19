
<table>
    <tr>
        <th>#</th>
        <th>Reason</th>
        <th>Damage area</th>
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
            <td><?= $dmgClaim['damage_date']; ?></td>
            <td><?= $dmgClaim['harvest_id']; ?> </td>
            <td>
                <?php if ($dmgClaim['is_accepted'] == 0) : ?>
                    <p class="danger-label" style="color:rgb(200, 78, 78);font-weight:bold">No</p>
                <?php else : ?>
                    <p class="danger-label" style="color:#5cca58;font-weight:bold">Yes</p>
                <?php endif; ?>
            </td>

            <?php if ($dmgClaim['is_accepted'] == 0) : ?>
                <td>
                    <a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to update this user?');" href="<?php echo URL . 'farmer/editdmgClaimsForm/' . $dmgClaims['harvest_id']; ?>">Update</a>
                    <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo URL . 'farmer/deleteCropReq/' . $cropReq['harvest_id']; ?>">Cancel</a>
                </td>
            <?php else : ?>
                <td>N/A</td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>