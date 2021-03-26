<table>
    <tr>
        <th>#</th>
        <th>District</th>
        <th>Gramasewa.</th>
        <th>Crop type (Varient)</th>
        <th>Minimum price (Rs)</th>
        <th>Max offer (Rs)</th>
        <th>Amount (kg)</th>
        <th>Take Action</th>
    </tr>

    <?php $i = 0;
    foreach ($sellCrops as $sellCrop) :;
        $i++; ?>
        <tr>
            <td> <?= $i ?></td>
            <td> <?= $sellCrop['district_name']; ?> </td>
            <td> <?= $sellCrop['gs_name']; ?> </td>
            <td><?= $sellCrop['crop_type']; ?>  (<?= $sellCrop['crop_varient']; ?>)</td>
            <td><?= $sellCrop['min_offer']; ?> </td>
            <td>
                <?php if ($sellCrop['max_offer'] == 0) : ?>
                    <p style="color:rgb(200, 78, 78);font-weight:bold;">None</p>
                <?php else : ?>
                    <?= $sellCrop['max_offer']; ?>
                <?php endif; ?>
            </td>
            <td><?= $sellCrop['harvest_amount']; ?> </td>
            <td>
            <?php if ($sellCrop['max_offer'] > 0) : ?>
            <a class="mini-button normal btn" onclick="return confirm('Are you sure you want to accept the current offer?');" href="<?php echo URL . '/farmer/acceptSellReq/' . $sellCrop['selling_req_id']; ?>">Accept</a>
            <?php endif; ?>
                <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to cancel the selling request?');" href="<?php echo URL . '/farmer/deleteSellCrop/' . $sellCrop['selling_req_id']; ?>">Cancel</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>