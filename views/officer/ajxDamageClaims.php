<table>
    <tr>
        <th>#</th>
        <th>Farmer</th>
        <th>Crops</th>
        <th>Area</th>
        <th>Damage Amount</th>
        <th>Take Action</th>
    </tr>
    <?php $i = 0;
    foreach ($dmgClaimData as $dmgClaim) :;
        $i++; ?>
        <tr>
            <td> <?= $i ?></td>
            <td> <a style="font-size:1.2em; margin-right:5px;color:var(--main-theme-color);" href="<?= URL; ?>/user/viewUser/ <?= $dmgClaim['farmer_id']; ?>"> <i class="fas fa-address-card"></i></a> <?= $dmgClaim['farmer']; ?></a> </td>
            <td><?= $dmgClaim['crops']; ?> </td>
            <td> <?= $dmgClaim['area']; ?></td>
            <td> <?= $dmgClaim['damageAmt']; ?></td>
            <td>
                <?php if ($dmgClaim['is_accepted'] == 0) : ?>
                    <a class="mini-button btn" onclick="return confirm('Are you sure you want to accept this crop request ?');" href="<?= URL; ?>officer/acceptDmgClaim/<?= $dmgClaim['damage_id']; ?>"><i class="fas fa-check-circle"></i> Accept</a>
                    <a class="btn mini-button danger" onclick="if(confirm('Are you sure you want to reject this crop request ?')) return confirm('Warning ! You can not undo this action. Are you sure ?');" href="<?= URL; ?>officer/deleteCropReq/<?= $cropReqItem['harvest_id']; ?>"><i class="fas fa-times-circle"></i> Reject</a>
                <?php else : ?>
                    <i class="fas fa-ban"></i>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>