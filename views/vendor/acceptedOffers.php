<h1>Accepted Offers</h1>

<!-- <?php echo  $accepted_offers['first_name']. " ". $accepted_offers['last_name']?> -->
<div class="main-table">
<table>

    <tr>
        <th>#</th>
        <th>Id - Farmer's Name</th>
        <th>Crop Name</th>
        <th>Weight</th>
        <th>Your Accepted Offer</th>
        <th>District</th>
        <th>Collecting Center</th>
        <th>Action</th>
        <!-- <th>View Profile</th> -->
    </tr>

    <?php $i = 0;
    foreach ($accepted_offers as $acceptedoffers) :;
        $i++; ?>
        <tr>
            <td><?= $i ?> </td>
            <!-- <td><a class="icon-color" style="font-size:1.5em;" href="<?php echo URL . 'vendor/viewfarmerprofile/' . $cropsall['farmer_user_id']; ?>"> <i class="far fa-address-card"></i></a></td> -->
            <td><?= $acceptedoffers['farmer_user_id']."-". $acceptedoffers['first_name']." ". $acceptedoffers['last_name']; ?> </td>
            <td><?= $acceptedoffers['crop_type']; ?> </td>
            <td><?= $acceptedoffers['harvest_amount']; ?> </td>
            <td><?= $acceptedoffers['offer_amount']; ?></td>
            <td><?= $acceptedoffers['ds_name']; ?> </td>
            <td><?= $acceptedoffers['center_name']; ?> </td>

            <!-- <td><?= $cropsall['harvest_amount']; ?> </td>
            <td><?= $cropsall['max_offer']; ?> </td>
            <td><?= $cropsall['ds_name']; ?></td> -->
            <!-- <td> -->
            <!-- <?php if ($cropsall['offer_sent'] == 1) : ?>
                <a type="button" class="mini-button btn-success" href="<?php echo URL . 'vendor/giveOffer/' . $cropsall['selling_req_id'] . '/' . $cropsall['user_id']; ?>"><i class="fa fa-money"></i> Offer</a>
            <?php else : ?>
                Offer already sent
            <?php endif; ?>
            </td> -->

            <!-- <td><a type="button" class="mini-button btn-success" href="<?php echo URL . 'vendor/giveOffer/' . $cropsall['selling_req_id'] . '/' . $cropsall['user_id']; ?>"><i class="fa fa-money"></i> Offer</a></td> -->

        </tr>

    <?php endforeach; ?>
</table>
</div>