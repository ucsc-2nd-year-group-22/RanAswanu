<div class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th>Officer-ID</th>
            <th>Officer Name</th>
            <th>Telephone Number</th>
            <th>NIC</th>
            <th>Address</th>
            <th><i class="fas fa-users"></i> View</th>
            <th><i class="fas fa-user-times"></i> Remove</th>
            <!-- <?php if (Session::get('isadmin') != 1) : ?>
                <th>Action</th>
            <?php endif ?>  -->
        </tr>
        <?php $i = 0;
        foreach ($farmerData as $farmer) :;
            $i++; ?>
            <tr>
                <td> <?= $i ?></td>
                <!-- <td style="text-align:center;"><a class="table-icon" href="<?php echo URL . 'user/viewUser/' . $farmer['user_id']; ?>"> <i class="fas fa-address-card"></i></a></td> -->
                <td><?= $farmer['user_id']; ?> </td>
                <td><?= $farmer['first_name']; ?> </td>
                <td>
                    <?php
                    $telAr = explode(',', $farmer['telNos']);
                    foreach ($telAr as $tel) {
                        echo "$tel <br> ";
                    }
                    ?>
                </td>
                <td><?= $farmer['nic']; ?> </td>
                <td><?= $farmer['address']; ?> </td>
                <td>
                    <a href="<?php echo URL . 'user/edit/' . $farmer['user_id']; ?>" class="mini-button normal">View</a>
                </td>
                <td>
                    <a href="<?php echo URL . 'officer/delete/' . $farmer['user_id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="mini-button danger">Remove</a>
                </td>
                <!-- <td><?= $farmer['email']; ?> </td> -->
                <!-- <?php if (Session::get('isadmin') != 1) : ?>
                    <td>
                        <a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to update this user?');" href="<?php echo URL . 'user/edit/' . $farmer['user_id']; ?>">Update</a>
                        <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo URL . 'user/delete/' . $farmer['user_id']; ?>">Delete</a>
                    </td>
                <?php endif ?> -->
            </tr>
        <?php endforeach; ?>
    </table>