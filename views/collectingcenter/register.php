<div class="subHeader">
    <h1>Collecting Center Registration</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL; ?>/collectingcenter/create" method="post">
        <div class="row">
            <div class="col-25">
                <label for="center_name">Collecting Center Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="center_name" name="center_name" required placeholder="Collecting center name..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="province">Province</label>
            </div>
            <div class="col-75">
                <select id="province" name="province">
                    <option value="null"> -- SELECT PROVINCE -- </option>
                    <?php foreach ($provinces as $provinceItem) : ?>
                        <option value="<?= $provinceItem['province_id'] ?>"> <?= $provinceItem['province_name'] ?> </option>
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
                    <option value="null"> -- SELECT DISTRICT --</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">

            </div>
            <div class="col-75">
                <input type="submit" value="Register">
            </div>
        </div>
    </form>
</div>

<script src="<?php echo URL; ?>/views/collectingcenter/js/locations.js"></script>