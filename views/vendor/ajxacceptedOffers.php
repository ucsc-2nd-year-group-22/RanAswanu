<!-- <?php echo  $accepted_offers['first_name'] . " " . $accepted_offers['last_name'] ?> -->

<table>

    <tr>
        <th>#</th>
        <th>Offer Id</th>
        <th>Id - Farmer's Name</th>
        <th>Crop Name</th>
        <th>Weight</th>
        <th>Your Accepted Offer</th>
        <th>District</th>
        <th>Collecting Center</th>
        <th>Farmer's Contact details</th>
        <!-- <th>About Offer</th> -->
        <!-- <th>View Profile</th> -->
    </tr>

    <?php $i = 0;
    foreach ($accepted_offers as $acceptedoffers) :;
        $i++; ?>
        <tr>
            <td><?= $i ?> </td>
            <td><?= $acceptedoffers['offer_id']; ?> </td>
            <td><?= $acceptedoffers['farmer_user_id'] . "-" . $acceptedoffers['first_name'] . " " . $acceptedoffers['last_name']; ?> </td>
            <td><?= $acceptedoffers['crop_type']; ?> </td>
            <td><?= $acceptedoffers['harvest_amount']; ?> </td>
            <td><?= $acceptedoffers['offer_amount']; ?></td>
            <td><?= $acceptedoffers['ds_name']; ?> </td>
            <td><?= $acceptedoffers['center_name']; ?> </td>
            <td><?= $acceptedoffers['phone_no']; ?></td>

            <!-- <td><a class="icon-color" style="font-size:1.5em;" href="<?php echo URL . 'vendor/fcontactDetails/' . $acceptedoffers['farmer_user_id']; ?>"> <i class="far fa-address-card"></i></a></td> -->
            <!-- <td><a class="icon-color" style="font-size:1.5em;" href="<?php echo URL . 'vendor/aboutOffer/' . $acceptedoffers['farmer_user_id']; ?>"> <i class="far fa-address-card"></i></a></td> -->



        </tr>

    <?php endforeach; ?>
</table>