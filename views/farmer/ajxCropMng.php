<table>
    <tr>
        <th>#</th>
        <th>crop_id</th>
        <th>crop_id</th>
        <th>expected_harvest</th>
        <th>is_accept</th>
        <th>gs_id</th>
        <th>center_id</th>
        <th>start</th>
        <th>harv</th>
    </tr>
    <?php $i = 0;
    foreach ($cropReqs as $cropReq) :;
        $i++; ?>
        <tr>
            <td> <?= $i ?></td>
            <td><?= $cropReq['crop_type']; ?> </td>
            <td><?= $cropReq['crop_varient']; ?> </td>
            <td><?= $cropReq['expected_harvest']; ?> </td>
            <td><?= $cropReq['is_accept']; ?> </td>
            <td><?= $cropReq['gs_name']; ?> </td>
            <td><?= $cropReq['center_name']; ?> </td>
            <td><?= $cropReq['start_month']; ?> </td>
            <td><?= $cropReq['harvest_month']; ?> </td>
        </tr>
    <?php endforeach; ?>
</table>