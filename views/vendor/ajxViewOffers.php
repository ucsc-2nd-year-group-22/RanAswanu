<table>
            <tr>
                <th>#</th>
              
                <th>My Offer</th>
                <th>Action</th>
                <th>View Advertisement</th>
                
            </tr>

    <?php $i = 0; foreach($myOffers as $offer) :; $i++;?>
            <tr>
                <td> <?= $i ?></td> 
                
                <td> <?=$offer['offer_amount'];?></td>
                <td>  
                    <a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to update this request?');" href="<?php echo URL . 'vendor/updateOffer/' . $offer['offer_id'] ;?>">Update Offer</a>
                    <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this offer?');" href="<?php echo URL . 'vendor/undoOffer/' . $offer['offer_id'];?>">Undo</a>  
            
                </td>
            
                <td style="text-align:left;">
                    <a class="icon-color" style="font-size:1.5em;" href="<?php echo URL . 'vendor/undoOffer/' . $offer['offer_id'] ;?>"> 
                        <i class="fas fa-address-card"></i>
                    </a>
                </td>     
        
            </tr>
    <?php endforeach;?>
        </table>