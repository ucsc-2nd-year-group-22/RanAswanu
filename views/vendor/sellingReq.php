
<!--<?php echo $sellingReq['name'];?>-->
<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab" >All</a></li>
        <li><a id="tab2" href="#" >My Offers</a></li>
   
    </ul>
</div>


<div id="tab1C" class="tabContainer">
    <h2>All</h2>
    <div class="filter-panel">

        <div class="panel-container">
            <div class="pane1">

            <form class="search-bar">
                <label>Search Crop By : </label>
                <select >
                        <option>Farmer-ID</option>
                        <option>Farmer Name</option>
                        <option>Crop Type</option>
                </select>
                <input type="text" placeholder="Search ...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

            </div> 
            <div class="pane2">
            <form class="normal-select">
                <label>Sort Crop By : </label>
                <select placeholder="other">
                        <option>Date</option>
                        <option>Weight</option>
                </select>
                <button type="submit" class="half"><i class="fas fa-sort-amount-down-alt"></i> Smaller-first </button>
                <button type="submit" class="half"><i class="fas fa-sort-amount-down"></i> Larger-first</button>
            </form>
            </div>

             <div class="pane3">

                <form class="search-bar">
                    <label>Select District : </label>
                    <input type="text" placeholder="Search ...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>

             </div> 
        </div>

    </div>
</div>

<div id="tab2C" class="tabContainer">
   <h2>Offers Sent</h2>
    <div class="filter-panel">

    <div class="panel-container">
        <div class="pane1">

        <form class="search-bar">
            <label>Search Crop By : </label>
            <select placeholder="Search ...">
                    <option>Farmer-ID</option>
                    <option>Farmer Name</option>
                    <option>Crop Type</option>
                </select>
            <input type="text" placeholder="Search ...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        </div> 
           <div class="pane2">
        <form class="normal-select">
            <label>Sort Crop By : </label>
            <select placeholder="other">
                    <option>Date</option>
                    <option>Weight</option>
            </select>
            <button type="submit" class="half"><i class="fas fa-sort-amount-down-alt"></i> Smaller-first </button>
            <button type="submit" class="half"><i class="fas fa-sort-amount-down"></i> Larger-first</button>
        </form>
        </div>
    </div>

    </div>
</div>


<div class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th>ID</th>
          <!--  <th>Farmer </th> -->
            <th>Crop Type</th>
            <th>Weight</th>
            <th>Price</th>
            <th>District</th>
            <th>Date</th>
            <th>Action</th>
            <th>Profile</th>
            
        </tr>
<?php $i = 0; foreach($Req as $dt) :; $i++;?>
        <tr>
            <td> <?= $i ?></td>
            <td><?= $dt['fid'];?> </td>
           <!-- <td><?= $dt['name'];?> </td> --> 
            <td> <?=$dt['crop'];?></td>
            <td> <?=$dt['weight'];?></td>
             <td> <?=$dt['price'];?></td>
              <td> <?=$dt['district'];?></td>
            <td> <?=$dt['date'];?></td>
            <td>
                <a href="<?php echo URL. 'vendor/placeaOffer'?>" class="mini-button normal">Offer</a>  
            </td>
            <td>
                  <a  class="mini-button normal" href="<?php echo URL . 'vendor/viewFarmer/'. $dt['fid'] ;?>">View Profile</a>  
            </td>    
             
              
        
        </tr>
<?php endforeach;?>
    </table>
</div>


<?php
if(isset($this->js))
    echo '<script src="'.URL.'views/'.$this->js.'.js"></script>'; // want to now what happens here
    ?>