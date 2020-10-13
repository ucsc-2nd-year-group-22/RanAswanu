<h1>Farmer Management</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab" >View</a></li>
        <li><a id="tab2" href="<? URL ;?>../user/register" >Add new Farmer +</a></li>
    </ul>
</div>

<div id="tab1C" class="tabContainer">
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

<div id="tab2C" class="tabContainer">
    <h2>Add New</h2>
   
</div>
