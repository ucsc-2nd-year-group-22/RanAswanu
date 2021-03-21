<div class="main-table">
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
        <?php $i = 0; foreach($Req as $dt) :; $i++;?>
            <tr>
                <td> <?= $i ?></td>
                <td> <?=$dt['selectCrop'];?></td>
                <td> <?=$dt['weight'];?></td>
                <td> <?=$dt['exprice'];?></td>
                <td> <?=$dt['district'];?></td>
                <td>
                    <a href="<?php echo URL. 'vendor/placeaOffer/'. $dt['aId']?>" class="mini-button normal">Offer</a> 
                </td>
            
                <td style="text-align:left;">
                    <a class="icon-color" style="font-size:1.5em;" href="<?php echo URL . 'user/viewUser/' . $dt['id'] ;?>"> 
                        <i class="fas fa-address-card"></i>
                    </a>
                </td>     
        
            </tr>
    <?php endforeach;?>
        </table>
    </div>