
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
                <li><a href="#">Home</a></li>
                    <li><a href="<?php echo URL; ?>dashboard" class="active">Dashboard</a></li>
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
                    <? else: ?>
                    <!-- ==================================================== End of admin configuration =================================== -->
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact Us</a></li>
                    <? endif ?>
                </ul>
            </nav>
            <div class="dropdown" >
                <button class="header-popup-btn">My Profile</button>
                <div class="dropdown-content right-menu">
                    <a href="#">Profile</a>
                    <a href="#">Setting</a>
                    <a href="#">Help & Support</a>
                    <hr>
                    <? if(Session::get('loggedIn') == true): ?>
                        <a href="<?= URL?>user/logout">Log out</a>
                    <? else: ?>
                        <a href="<?= URL?>user/login">Login</a>
                    <? endif ?>
                </div>
            </div>
        </header>
        <div class="content">