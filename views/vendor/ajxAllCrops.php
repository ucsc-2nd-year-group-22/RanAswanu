<?php print_r($AllCrops); ?>

<table>
            <tr>
                <th>#</th>
                <!-- <th>ID</th> -->
            <!--  <th>Farmer </th> -->
                <th>Crop Name</th>
                <th>Weight</th>
                <th>Price</th>
                <th>District</th>
                <!--<th>Date</th> -->
                <th>Action</th>
                <th>View Profile</th>
                
            </tr>
    <?php $i = 0; foreach($AllCrops as $dt) :; $i++;?>
            <tr>
                <td> <?= $i ?></td>
                <td> <?=$dt['crop_type'];?></td>
                <td> <?=$dt['harvest_amount'];?></td>
                <td> <?=$dt['min_offer'];?></td>
                <td> <?=$dt['ds_name'];?></td>
                <td>
                <?php if($dt['offer_sent'] == 1): ?>
                    <a href="<?php echo URL. 'vendor/placeaOffer/'. $dt['selling_req_id']?>" class="mini-button normal">Offer</a>
                <?php else: ?>
                    Offer already sent
                <?php endif; ?>
                </td>
            
                <td style="text-align:left;">
                    <a class="icon-color" style="font-size:1.5em;" href="<?php echo URL . 'user/viewUser/' . $dt['farmer_user_id'] ;?>"> 
                        <i class="fas fa-address-card"></i>
                    </a>
                </td>    
        
            </tr>
    <?php endforeach;?>
        </table>