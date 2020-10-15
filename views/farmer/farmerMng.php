<h1>Farmer Management</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab" >View</a></li>
        <?php if(Session::get('isadmin') != 1): ?>
        <li><a id="tab2" href="#" >Edit</a></li>
        <li><a id="tab3" href="#" >Delete</a></li>
        <li><a id="tab4" href="<? URL ;?>../user/register" >Add new Farmer +</a></li>
        <?php endif; ?>
    </ul>
</div>

<div class="tabContainer" id="tab1C">
    <h2>View all reegistered farmers</h2>
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
        <div class="main-table">
            <table>
                <tr>
                    <th>#</th>
                    <th>Officer-ID</th>
                    <th>First Name</th>
                    <th>Last name</th>
                    <th>Action</th>
                    <th>Cotact</th>
                    <th>email</th>
                </tr>
            <? $i = 0; foreach($officerData as $officer) :; $i++;?>
                <tr>
                    <td> <?= $i ?></td>
                    <td><?=$officer['id'];?> </td>
                    <td><?=$officer['firstname'];?> </td>
                    <td><?=$officer['lastname'];?> </td>
                    <td><?=$officer['nic'];?> </td>
                    <td><?=$officer['tel'];?> </td>
                    <td><?=$officer['email'];?> </td>
                </tr>
            <?endforeach;?>
            </table>
        </div>
    </div>


<!-- Edit farmer -->

<div id="tab2C" class="tabContainer">
    <h2>You are going to update farmers</h2>
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
   <!-- Table -->
    <div class="main-table">
        <table>
            <tr>
                <th>#</th>
                <th>Farmer-ID</th>
                <th>First Name</th>
                <th>Last name</th>
                <th>Action</th>
                <th>Cotact</th>
                <th>email</th>
                <th>Action</th>
            </tr>
        <? $i = 0; foreach($officerData as $officer) :; $i++;?>
            <tr>
                <td> <?= $i ?></td>
                <td><?=$officer['id'];?> </td>
                <td><?=$officer['firstname'];?> </td>
                <td><?=$officer['lastname'];?> </td>
                <td><?=$officer['nic'];?> </td>
                <td><?=$officer['tel'];?> </td>
                <td><?=$officer['email'];?> </td>
                <td><a type="button" class="mini-button warning btn" onclick="return confirm('Are you sure you want to edit this user?');" href="<? echo URL . 'user/edit/' . $officer['id'] ;?>">Edit</a></td>
            </tr>
        <?endforeach;?>
        </table>
    </div>

</div>

<!-- Tab 2 Delete -->
<div id="tab3C" class="tabContainer">
    <h2>Carefull ! You are going to delete farmers</h2>
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
   <!-- Table -->
    <div class="main-table">
        <table>
            <tr>
                <th>#</th>
                <th>Farmer-ID</th>
                <th>First Name</th>
                <th>Last name</th>
                <th>NIC</th>
                <th>Cotact</th>
                <th>email</th>
                <th>Action</th>
            </tr>
        <? $i = 0; foreach($officerData as $officer) :; $i++;?>
            <tr>
                <td> <?= $i ?></td>
                <td><?=$officer['id'];?> </td>
                <td><?=$officer['firstname'];?> </td>
                <td><?=$officer['lastname'];?> </td>
                <td><?=$officer['nic'];?> </td>
                <td><?=$officer['tel'];?> </td>
                <td><?=$officer['email'];?> </td>
                <td><a class="mini-button danger btn" onclick="return confirm('Are you sure you want to delete this user?');" href="<? echo URL . '/user/delete/' . $officer['id'] ;?>">Delete</a></td>
            </tr>
        <?endforeach;?>
        </table>
    </div>

</div>