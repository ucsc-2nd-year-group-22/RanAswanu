<table>

    <tr>
        <th>#</th>
        <th>Crop Name</th>
        <th>Weight</th>
        <th>Price</th>
        <th>District</th> 
        <th>Action</th>
       <th>View Profile</th>
    </tr>


   
    <?php $i=0;
    foreach($crops as $cropsall):;
    $i++;?>
    <tr>
        <td><?= $i ?> </td>
        <td><?= $cropsall['crop_type']; ?> </td>
        <td><?= $cropsall['harvest_amount']; ?> </td>
        <td><?= $cropsall['max_offer']; ?> </td>
        <td><?= $cropsall['ds_name']; ?></td>
       
    </tr>

    <?php endforeach; ?>   
</table> 