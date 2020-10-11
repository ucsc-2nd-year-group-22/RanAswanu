
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/title-logo.png" type="image/icon type">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
<body>
    <div class="main-grid">
        <header>
            <img src="<?php echo URL; ?>public/img/logo.png" width="150px" class="logo">
            <nav>
                <ul>
                    <li><a href="<?php echo URL; ?>dashboard">Dashboard</a></li>
                    <!-- Admin configurations for the navigation bar =============================================================== -->
                    <?php if(Session::get('role') == 'admin'): ?>
                        <li>
                            <div class="dropdown">
                                <a href="#">User Management</a>
                                <div class="dropdown-content">
                                    <a href="<? echo URL; ?>officer">Officers</a>
                                    <a href="<? echo URL; ?>farmer">Farmers</a>
                                    <a href="<? echo URL; ?>vendor">Vendors</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Crop Management</a></li>
                        <li><a href="#">Collection Centers</a></li>
                        <li>
                            <div class="dropdown">
                                <a href="#">Change Role</a>
                                <div class="dropdown-content">
                                    <a href="#">Admin</a>
                                    <a href="#">Officer</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Notifications</a></li>
                    <!-- ==================================================== End of admin configuration =================================== -->
                    
                    <!-- Officer configurations for the navigation bar =============================================================== -->
                    <? elseif(Session::get('role') == 'officer'): ?>

                        <li><a href="<? echo URL; ?>officer/cropReq" class="<? if(Session::get(activePage) == "cropReq") echo 'active' ?>">Crop Requests</a></li>
                        <li><a href="<? echo URL; ?>officer/damageClaims" class="<? if(Session::get(activePage) == "damageClaims") echo 'active' ?>">Damage Claims</a></li>
                        <li><a href="<? echo URL; ?>officer/reports">Reports</a></li>
                        <li><a href="<? echo URL; ?>officer/notifications">Notifications</a></li>
                    <? endif ?>
                </ul>
            </nav>
            <? if(Session::get('loggedIn') == true): ?>
            <div class="dropdown" >
                <button class="header-popup-btn">My Profile</button>
                <div class="dropdown-content right-menu">
                    <a href="#">Profile</a>
                    <a href="#">Setting</a>
                    <a href="#">Help & Support</a>
                    <? if(Session::get('loggedIn') == true): ?>
                        <a href="<?= URL?>user/logout">Log out</a>
                    <? endif; ?>
                </div>
            </div>
            <? endif;?>
        </header>
        <div class="content">