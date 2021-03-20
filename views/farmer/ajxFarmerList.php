<div class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th style="text-align:center;">View Profile</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Contact</th>
            <th>NIC</th>
            <th>Email address</th>
            <?php if (Session::get('isadmin') != 1) : ?>
                <th>Action</th>
            <?php endif ?>
        </tr>
        <?php $i = 0;
        foreach ($farmerData as $farmer) :;
            $i++; ?>
            <tr>
                <td> <?= $i ?></td>
                <td style="text-align:center;"><a class="table-icon" href="<?php echo URL . 'user/viewUser/' . $farmer['user_id']; ?>"> <i class="fas fa-address-card"></i></a></td>
                <td><?= $farmer['first_name']; ?> </td>
                <td><?= $farmer['last_name']; ?> </td>
                <td>
                    <?php
                    $telAr = explode(',', $farmer['telNos']);
                    foreach ($telAr as $tel) {
                        echo "$tel <br> ";
                    }
                    ?>
                </td>
                <td><?= $farmer['nic']; ?> </td>
                <td><?= $farmer['email']; ?> </td>
                <?php if (Session::get('isadmin') != 1) : ?>
                    <td>
                        <a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to update this user?');" href="<?php echo URL . 'user/edit/' . $farmer['user_id']; ?>">Update</a>
                        <a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo URL . 'user/delete/' . $farmer['user_id']; ?>">Delete</a>
                    </td>
                <?php endif ?>
            </tr>
        <?php endforeach; ?>
    </table>