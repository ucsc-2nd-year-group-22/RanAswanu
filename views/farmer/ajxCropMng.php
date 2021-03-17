
<table>
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
                <?php if($cropReq['is_accept'] == 0): ?>
                <p class="danger-label" style="color:rgb(200, 78, 78);font-weight:bold">No</p>
                <?php else: ?>
                <p class="danger-label" style="color:#5cca58;font-weight:bold">Yes</p>
                <?php endif; ?>
            </td>
            <td><?= $cropReq['gs_name']; ?> </td>
            <td><?= $cropReq['center_name']; ?> </td>
            <td><?= $cropReq['start_month']; ?> </td>
            <td><?= $cropReq['harvest_month']; ?> </td>
        </tr>
    <?php endforeach; ?>
</table>