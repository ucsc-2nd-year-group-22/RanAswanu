<?php print_r($data['cropReqData'][0]); ?>

<table>
    <tr>
        <th>#</th>
        <th>Farmer</th>
        <th>Crop type (varient)</th>
        <th>Expected harvest (kg)</th>
        <th>Status</th>
        <th>Gramasewa.</th>
        <th>Collecting center</th>
        <th>Take Action</th>
    </tr>
    <?php $i = 0;
    foreach ($cropReqData as $cropReqItem) :;
        $i++; ?>
        <tr>
            <td> <?= $i ?></td>
            <td><a style="font-size:1.2em; margin-right:5px;color:var(--main-theme-color);" href="<?= URL ;?>/user/viewUser/ <?= $cropReqItem['farmer_user_id']; ?>"> <i class="fas fa-address-card"></i></a> <?= $cropReqItem['first_name']; ?> <?= $cropReqItem['last_name']; ?><a href="#"> </a> </td>
            <td><?= $cropReqItem['crop_type']; ?> (<?= $cropReqItem['crop_varient']; ?>)</td>
            <td> <?= $cropReqItem['expected_harvest']; ?></td>
            <td>
            <?php if($cropReqItem['is_accept'] ==1): ?>
                <b style="color:#2aaa26;">Accepted</b>
            <?php else:?>
                <b style="color:rgb(200, 78, 78);">Pending</b>
            <?php endif; ?>
            </td>
            <td> <?= $cropReqItem['gs_name']; ?></td>
            <td> <?= $cropReqItem['center_name']; ?></td>
            <td>
                <?php if($cropReqItem['is_accept'] ==0): ?>
                <a class="mini-button btn"href="<?= URL ;?>officer/acceptCropReq/<?= $cropReqItem['harvest_id']; ?>"><i class="fas fa-check-circle"></i> Accept</a>
                <a class="btn mini-button danger" href="<?= URL ;?>officer/deleteCropReq/<?= $cropReqItem['harvest_id']; ?>"><i class="fas fa-times-circle"></i> Remove</a>
                <?php else: ?>
                na
                <?php endif; ?>
            </td>

        </tr>
    <?php endforeach; ?>
</table>