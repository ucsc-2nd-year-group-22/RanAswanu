
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?php echo URL; ?>public/img/title-logo.png" type="image/icon type">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css"/>
    <script src="<?php echo URL;?>public/js/custom.js"></script>
    <script src="<?php echo URL;?>public/js/jquery-3.5.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harvest Mgt System</title>
</head>
<body>
    <div class="main-grid">
        <header>
            <img src="<?php echo URL; ?>public/img/logo.png" width="150px" class="logo">
            <nav>
                <ul>
                <li><a href="<?php echo URL; ?>">Home</a></li>
                    <li><a id="dashboardNav" href="<?php echo URL; ?>dashboard" class="active">Dashboard</a></li>
                    <!-- Admin configurations for the navigation bar =============================================================== -->
                    <?php if(Session::get('role') == 'admin'): ?>
                        <li>
                            <div class="dropdown">
                                <a href="#">User Management</a>
                                <div class="dropdown-content">
                                <a href="<? echo URL; ?>admin/admins">Admins</a>
                                    <a href="<? echo URL; ?>admin/officers">Officers</a>
                                    <a href="<? echo URL; ?>admin/vendors">Vendors</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="<? echo URL; ?>admin/crops">Crop Management</a></li>
                        <li><a href="#">Collection Centers</a></li>
                        <?php if(Session::get('isadmin') == 1): ?>
                            <li>
                                <div class="dropdown">
                                    <a href="#">Change Role</a>
                                    <div class="dropdown-content">
                                        <a href="<?php echo URL; ?>admin/toadmin/<?php echo Session::get('id'); ?>">Admin</a>
                                        <a href="<?php echo URL; ?>admin/toofficer/<?php echo Session::get('id'); ?>">Officer</a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Notifications</a></li>

                    <!-- Officer configurations for the navigation bar =============================================================== -->
                    <? elseif(Session::get('role') == 'officer'): ?>

                        <li><a href="<? echo URL; ?>officer/cropReq">Crop Requests</a></li>
                        <li><a href="<? echo URL; ?>officer/damageClaims">Damage Claims</a></li>
                        <!-- for real admins act as officers ===== -->
                        <?php if(Session::get('isadmin') == 1): ?>   
                            <li>
                                <div class="dropdown">
                                    <a href="#">Change Role</a>
                                    <div class="dropdown-content">
                                        <a href="<?php echo URL; ?>admin/toadmin/<?php echo Session::get('id'); ?>">Admin</a>
                                        <a href="<?php echo URL; ?>admin/toofficer/<?php echo Session::get('id'); ?>">Officer</a>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
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