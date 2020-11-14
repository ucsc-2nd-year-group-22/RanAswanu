<div class="subHeader">
    <h1>Collecting Center Registration</h1>
</div>

<!-- FORM -->
<div class="main-form">
    <form action="<?= URL;?>/collectingcenter/create" method="post">
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
                <option value="province1">Province 1</option>
                <option value="province2">Province 2</option>
                <option value="province3">Province 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="district">District</label>
            </div>
            <div class="col-75">
            <select id="district" name="district">
                <option value="district1">District 1</option>
                <option value="district2">District 2</option>
                <option value="district3">District 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="grama">Gramasewa Division</label>
            </div>
            <div class="col-75">
            <select id="grama" name="grama">
                <option value="grama1">Grama 1</option>
                <option value="grama2">Grama 2</option>
                <option value="grama1">Grama 3</option>
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