<table>
    <tr>
        <th>#</th>
        <th>District</th>
        <th>Gramasewa.</th>
        <th>Crop type/ Varient</th>
        <th>Minimum price</th>
        <th>Max offer</th>
        <th>Amount</th>
        <th>Take Action</th>
    </tr>

    <?php $i = 0;
    foreach ($sellCrops as $sellCrop) :;
        $i++; ?>
        <tr>
            <td> <?= $i ?></td>
            <td> <?= $sellCrop['district_name']; ?> </td>
            <td> <?= $sellCrop['gs_name']; ?> </td>
            <td><?= $sellCrop['crop_type']; ?> <?= $sellCrop['crop_varient']; ?> </td>
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
            <a class="mini-button normal btn" onclick="return confirm('Are you sure you want to delete this sellcrops data?');" href="<?php echo URL . '/farmer/deletesellcrops/' . $sellCrop['aId']; ?>">Accept</a>
            <?php endif; ?>
                <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this sellcrops data?');" href="<?php echo URL . '/farmer/deletesellcrops/' . $sellCrop['aId']; ?>">Cancel</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- <table>
    <tr>
        <th>#</th>
        <th>Crop type</th>
        <th>Crp variety</th>
        <th>Expected harvest</th>
        <th>Accepted ?</th>
        <th>Gramasewa Div.</th>
        <th>Collecting center</th>
        <th>Starting month</th>
        <th>Harvesting month</th>
        <th>Action</th>
    </tr>
    <?php $i = 0;
    foreach ($cropReqs as $cropReq) :;
        $i++; ?>
        <tr>
            <td> <?= $i ?></td>
            <td><?= $cropReq['crop_type']; ?> </td>
            <td><?= $cropReq['crop_varient']; ?> </td>
            <td><?= $cropReq['expected_harvest']; ?> kg </td>
            <td>
                <?php if ($cropReq['is_accept'] == 0) : ?>
                    <p class="danger-label" style="color:rgb(200, 78, 78);font-weight:bold">No</p>
                <?php else : ?>
                    <p class="danger-label" style="color:#5cca58;font-weight:bold">Yes</p>
                <?php endif; ?>
            </td>
            <td><?= $cropReq['gs_name']; ?> </td>
            <td><?= $cropReq['center_name']; ?> </td>
            <td><?= $cropReq['start_month']; ?> </td>
            <td><?= $cropReq['harvest_month']; ?> </td>
            <?php if ($cropReq['is_accept'] == 0) : ?>
            <td>
                <a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to update this user?');" href="<?php echo URL . 'farmer/editCropReqForm/' . $cropReq['harvest_id']; ?>">Update</a>
                <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo URL . 'farmer/deleteCropReq/' . $cropReq['harvest_id']; ?>">Cancel</a>
                
            </td>
            <?php else : ?>
               <td><a class="mini-button normal btn" onclick="return confirm('Are you sure you want claim new damage?');" href="<?php echo URL . 'farmer/newDmgClaimForm/' . $cropReq['harvest_id']; ?>">Damage claim</a></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table> -->