<table>

    <tr>
        <th>#</th>
        <th>View Profile</th>
        <th>Crop Name</th>
        <th>Weight</th>
        <th>Price</th>
        <th>District</th>
        <th>Action</th>
        <!-- <th>View Profile</th> -->
    </tr>



    <?php $i = 0;
    foreach ($crops as $cropsall) :;
        $i++; ?>
        <tr>
            <td><?= $i ?> </td>
            <td><a class="icon-color" style="font-size:1.5em;" href="<?php echo URL . 'vendor/viewfarmerprofile/' . $cropsall['farmer_user_id']; ?>"> <i class="far fa-address-card"></i></a></td>
            <td><?= $cropsall['crop_type']; ?> </td>
            <td><?= $cropsall['harvest_amount']; ?> </td>
            <td><?= $cropsall['max_offer']; ?> </td>
            <td><?= $cropsall['ds_name']; ?></td>
            <td>
            <?php if ($cropsall['offer_sent'] == 0) : ?>
                <a type="button" class="mini-button btn-success" href="<?php echo URL . 'vendor/giveOffer/' . $cropsall['selling_req_id']; ?>"><i class="fa fa-money"></i> Offer</a>
                <!-- <a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to update this request?');" href="<?php echo URL . 'vendor/giveOffer/' . $cropsall['user_id'] ;?>">Update Offer</a> -->
                <!-- <a type="button" class="mini-button btn-success" onclick="return confirm('Are you sure you want to give offer?');" href="<?php echo URL . 'vendor/giveOffer/'  . $cropsall['user_id'] ;?>"><i class="fa fa-money"></i>Offer</a> -->
                <!-- <a type="button" class="mini-button btn-success" href="<?php echo URL . 'vendor/giveOffer/' . $cropsall['selling_req_id'] . '/' . $cropsall['user_id']; ?>"><i class="fa fa-money"></i> Offer</a> -->
                <!-- <a href="<?php echo URL . 'vendor/placeaOffer/' . $cropsall['selling_req_id'] ?>" class="mini-button normal">Offer</a> -->
            <?php else : ?>
                Offer already sent
            <?php endif; ?>
            </td>

            <!-- <td><a type="button" class="mini-button btn-success" href="<?php echo URL . 'vendor/giveOffer/' . $cropsall['selling_req_id'] . '/' . $cropsall['user_id']; ?>"><i class="fa fa-money"></i> Offer</a></td> -->

        </tr>

    <?php endforeach; ?>
</table>