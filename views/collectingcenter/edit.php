<div class="subHeader">
    <h1>Update Collecting Center</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>collectingcenter/update/<?php echo $this->center['id'] ?>" method="post">
        <div class="row">
            <div class="col-25">
            <label for="center_name">Collecting Center Name</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?php echo $this->center['center_name']; ?>" id="center_name" name="center_name" placeholder="Collecting center name..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="province">Province</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">
                <?php $provinces = [
                    'Nothern',
                    'North Western',
                    'Western',
                    'North Central',
                    'Central',
                    'Sabaragamuwa',
                    'Eastern',
                    'Uva',
                    'Southern'
                ]; ?>

                <?php foreach ($provinces as $provinceItem): ?>
                    <option value="<?= $provinceItem?>"      <?php if($this->center['province'] == $provinceItem) echo 'selected'; ?> > <?= $provinceItem?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="district">District</label>
            </div>
            <div class="col-75">
            <select id="district" name="district">
            <?php $districts = [
                    'Kalutara',
                    'Anuradhapura',
                    'Polonnaruwa',
                    'Gampaha',
                    'Matale',
                    'Kandy',
                    'NuwaraEliya',
                    'Kegalle',
                    'Ratnapura',
                    'Hambantota',
                    'Matara',
                    'Galle',
                    'Trincomalee',
                    'Jaffna',
                    'Kurunegala'
                ]; ?>

                <?php foreach ($districts as $districtItem): ?>
                    <option value="<?= $districtItem?>"      <?php if($this->center['district'] == $districtItem) echo 'selected'; ?> > <?= $districtItem?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="grama">Gramasewa Division</label>
            </div>
            <div class="col-75">
            <select id="grama" name="grama">
            <?php $gramas = [
                   'Kurudupoththa',
                   'Parakandeniya',
                   'Mahiyanganaya',
                   'Udawela',
                   'Kahatagasdeigiliya',
                   'Horowpathana',
                   'Ambewela',
                   'Haten',
                   'Kalmune'
                ]; ?>

                <?php foreach ($gramas as $gramaItem): ?>
                    <option value="<?= $gramaItem?>"      <?php if($this->center['grama'] == $gramaItem) echo 'selected'; ?> > <?= $gramaItem?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
            <input type="submit" value="Update">
            </div>
        </div>
    </form>
</div>