<div class="subHeader">
    <h1>Update Crop Varients</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>crop/addVarient/<?php echo $cropId ?>" method="post">
        <div class="row">
            <div class="col-25">
                <label for="crop_name">Crop Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="crop_name" name="crop_name" placeholder="Crop name..">
                <input type="submit" class="btn">
            </div>
        </div>
    </form>
</div>


<!-- Varients List -->

<?php if(sizeof($varientData) > 0){ ?>

<div class="main-table">
    <table>
        <tr>
            <th>Crop-Varient</th>
            <th>Remove</th>
        </tr>

<?php foreach($varientData as $varientItem): ?>
        <tr>
            <td> <?php echo $varientItem['varient_name']; ?> </td>
            <td>
                <a href="<?php echo URL .'crop/deleteVarient/'.$varientItem['id']; ?>" onclick="return confirm('Are you sure you want to delete this varient?');" class="mini-button danger"><i class="fas fa-trash"> Remove</i></a> 
            </td>
        </tr>
<?php endforeach;?>
    </table>
</div>

<?php } else { ?>

<div class="banner">
    <h4> No varitents found</h4>
    <h1><i class="far fa-times-circle icon-color"></i><h1>
</div>

<?php } ?>