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


   
    <?php $i=0;
    foreach($crops as $cropsall):;
    $i++;?>
    <tr>
        <td><?= $i ?> </td>
        <td ><a class="icon-color" style="font-size:1.5em;" href="<?php echo URL . 'vendor/viewfarmerprofile/' . $cropsall['user_id'] ;?>"> <i class="far fa-address-card"></i></a></td>
        <td><?= $cropsall['crop_type']; ?> </td>
        <td><?= $cropsall['harvest_amount']; ?> </td>
        <td><?= $cropsall['max_offer']; ?> </td>
        <td><?= $cropsall['ds_name']; ?></td>
        <td><a type="button" class="mini-button btn-success" href="<?php echo URL . '/vendor/giveOffer' . $cropsall['farmer_user_id'] ;?>"><i class="fa fa-money"></i> Offer</a></td>
        <!-- <td style ="text-align:center;"><a class="icon-color"; style="font-size:1.5em;" href="<?php echo URL .'vendor/viewfarmerprofile/'.$cropsall['farmer_user_id'];?>"><i class="far -fa-address-card"></td> -->
        <!-- <td ><a class="icon-color" style="font-size:1.5em;" href="<?php echo URL . 'vendor/viewfarmerprofile/' . $cropsall['user_id'] ;?>"> <i class="far fa-address-card"></i></a></td> -->

    </tr>

    <?php endforeach; ?>   
</table> 