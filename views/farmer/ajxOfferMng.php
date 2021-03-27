
<table>
        <tr>
            <th>#</th>
            <th>Vender Name</th>
            <th>Crop Type (Crop varient)</th>
            <th>Price per lot (Rs)</th>
            <th>District</th>
            <th>dateTime</th>
            <th>Take Action</th>
        </tr>
        <?php $i = 0;
        foreach ($offerData as $offerDataItem) :;
            $i++; ?>
            <tr>
                <td> <?= $i ?></td>
                <td><?= $offerDataItem['first_name']; ?> <?= $offerDataItem['last_name']; ?> <a href="<?php echo URL ;?>user/viewUser/<?= $offerDataItem['vendor_user_id']; ?>"><i class="fas fa-phone-square icon-color"></i> </a> </td>
                <td><?= $offerDataItem['crop_type']; ?> (<?= $offerDataItem['crop_varient']; ?>) </td>
                <td> <?= $offerDataItem['offer_amount']; ?></td>
                <td> <?= $offerDataItem['district_name']; ?> (<?= $offerDataItem['gs_name']; ?>)</td>
                <td> <?= $offerDataItem['date_time']; ?></td>
                <td>
                <?php if($offerDataItem['transaction_flag'] == 0) :?>
                    <a type="button" class="mini-button normal btn" onclick="return confirm('Are you sure you want to accept this offer?');" href="<?php echo URL . 'farmer/acceptOffer/' . $offerDataItem['offer_id']; ?>">Accept</a>
                    <a type="button" class="mini-button danger btn" onclick="return confirm('Are you sure you want to reject this offer?');" href="<?php echo URL . 'farmer/rejectOffer/' . $offerDataItem['offer_id']; ?>">Reject</a>
                <?php else: ?>
                    <b style="color:#2aaa26"><i class="fas fa-check-circle"></i> Accepted</b>
                <?php endif;?>
                </td>
                

            </tr>
        <?php endforeach; ?>
    </table>