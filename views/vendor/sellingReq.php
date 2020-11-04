 <h1>Farmer's Selling Requests</h1>
<!--<?php echo $sellingReq['name'];?>-->
<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab" >All</a></li>
        <li><a id="tab2" href="#" >Accepted</a></li>
        <li><a id="tab3" href="#" >Rejected</a></li>
    </ul>
</div>


<div id="tab1C" class="tabContainer">
    <h2>All</h2>
    <div class="filter-panel">
        <div class="pane1">
            <div class="left">
                <label for="radio">Sort by</label>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <label class="container">Acending
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </li>
                    <li>
                        <label class="container">Decending
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>                    
            </div>
        </div>
        <div class="pane2">
            <div class="search-container">
                <form action="#">
                    <span class="left">
                        <input type="text" placeholder="Search.." name="search">
                    </span>
                    <span class="right">
                        <button type="submit">Submit</button>
                    </span>
                </form>
                </div>
            <div class="right">

            </div>
        </div>
        <div class="pane3">
            <label for="filter4">Sort by</label>
            <select id="filter4" name="filter4">
                <option value="australia">Date</option>
                <option value="canada">Amount</option>
                <option value="usa">Time</option>
            </select>                    
        </div>
        <div class="pane4"> 
            <label for="filter5">Search by</label>
            <select id="filter5" name="filter5">
                <option value="australia">Crop</option>
                <option value="canada">Area</option>
                <option value="usa">Officer</option>
            </select>                
        </div>
    </div>
</div>

<div id="tab2C" class="tabContainer">
    <h2>Accepted</h2>
    <div class="filter-panel">
        <div class="pane1">
            <div class="left">
                <label for="radio">Sort by</label>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <label class="container">Acending
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </li>
                    <li>
                        <label class="container">Decending
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>                    
            </div>
        </div>
        <div class="pane2">
            <div class="search-container">
                <form action="#">
                    <span class="left">
                        <input type="text" placeholder="Search.." name="search">
                    </span>
                    <span class="right">
                        <button type="submit">Submit</button>
                    </span>
                </form>
                </div>
            <div class="right">

            </div>
        </div>
        <div class="pane3">
            <label for="filter4">Sort by</label>
            <select id="filter4" name="filter4">
                <option value="australia">Date</option>
                <option value="canada">Amount</option>
                <option value="usa">Time</option>
            </select>                    
        </div>
        <div class="pane4"> 
            <label for="filter5">Search by</label>
            <select id="filter5" name="filter5">
                <option value="australia">Crop</option>
                <option value="canada">Area</option>
                <option value="usa">Officer</option>
            </select>                
        </div>
    </div>
</div>

<div id="tab3C" class="tabContainer">
    <h2>Rejected</h2>
    <div class="filter-panel">
        <div class="pane1">
            <div class="left">
                <label for="radio">Sort by</label>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <label class="container">Acending
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </li>
                    <li>
                        <label class="container">Decending
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>                    
            </div>
        </div>
        <div class="pane2">
            <div class="search-container">
                <form action="#">
                    <span class="left">
                        <input type="text" placeholder="Search.." name="search">
                    </span>
                    <span class="right">
                        <button type="submit">Submit</button>
                    </span>
                </form>
                </div>
            <div class="right">

            </div>
        </div>
        <div class="pane3">
            <label for="filter4">Sort by</label>
            <select id="filter4" name="filter4">
                <option value="australia">Date</option>
                <option value="canada">Amount</option>
                <option value="usa">Time</option>
            </select>                    
        </div>
        <div class="pane4"> 
            <label for="filter5">Search by</label>
            <select id="filter5" name="filter5">
                <option value="australia">Crop</option>
                <option value="canada">Area</option>
                <option value="usa">Officer</option>
            </select>                
        </div>
    </div>
</div>




<div class="main-table">
    <table>
        <tr>
            <th>#</th>
            <th>Farmer-ID</th>
            <th>Farmer Name</th>
            <th>Crop Type</th>
            <th>Action</th>
        </tr>
<?php $i = 0; foreach($Req as $dt) :; $i++;?>
        <tr>
            <td> <?= $i ?></td>
            <td><?= $dt['id'];?> </td>
            <td><?= $dt['name'];?> </td>
            <td> <?=$dt['crop'];?></td>
            <td>
                <a href="<?php echo URL. 'vendor/placeaOffer'?>" class="mini-button normal">Offer</a>  
            </td>
            <td>
                  <a  class="mini-button normal" href="<?php echo URL . 'vendor/viewFarmer/'. $dt['id'] ;?>">View Profile</a>  
            </td>    
              <td>
                   <a href="<?php echo URL; ?>vendor/viewCrops" class="mini-button normal">Other crops</a>
              </td>
              
        
        </tr>
<?php endforeach;?>
    </table>
</div>


<?php
if(isset($this->js))
    echo '<script src="'.URL.'views/'.$this->js.'.js"></script>'; // want to now what happens here
    ?>