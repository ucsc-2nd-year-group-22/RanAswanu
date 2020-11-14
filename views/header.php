
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="<?php echo URL;?>public/js/jquery-3.5.1.min.js"></script>
    <link rel="icon" href="<?php echo URL; ?>public/img/title-logo.png" type="image/icon type">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css"/>
    <script src="<?php echo URL;?>public/js/custom.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Ran Aswanu Hvst Mgt Sys</title>
</head>
<body>
    <div class="main-grid">
        <header>
            <img src="<?php echo URL; ?>public/img/logo.png" width="150px" class="logo">
            <nav>
                <ul>
                <?php if(Session::get('loggedIn')==false): ?>
                <li><a href="<?php echo URL; ?>" class="<?php View::getActivePage('homepage'); ?>">Home</a></li>
                <?php endif; ?>
                <li><a id="dashboardNav" href="<?php echo URL; ?>dashboard" class="<?php View::getActivePage('dashboard'); ?>">Dashboard</a></li>

                <!-- Admin configurations for the navigation bar =============================================================== -->
                <?php if(Session::get('role') == 'admin'): ?>
                        <li>
                            <div class="dropdown">
                                <a href="#" class="<?php View::getActivePage('userMgt'); ?>">User Management</a>
                                <div class="dropdown-content">
                                    <a href="<?php echo URL; ?>admin/admins">Admins</a>
                                    <a href="<?php echo URL; ?>officer/officers">Officers</a>
                                    <a href="<?php echo URL; ?>farmer/farmerMng">Farmers</a>
                                    <a href="<?php echo URL; ?>vendor/vendors">Vendors</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="<?php echo URL; ?>crop/crops" class="<?php View::getActivePage('crops'); ?>">Crop Management</a></li>
                        <li><a href="<?php echo URL; ?>collectingcenter/collectingcenters" class="<?php View::getActivePage('collectingcenters'); ?>">Collection Centers</a></li>
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
                        <li><a href="<?php echo URL; ?>admin/reports">Reports</a></li>
                        <li><a href="<?php echo URL; ?>admin/notifications" class="<?php View::getActivePage('notifications'); ?>">Notifications</a></li>

                    <!-- Officer configurations for the navigation bar =============================================================== -->
                    <?php elseif(Session::get('role') == 'officer'): ?>

                        <li><a href="<?php echo URL; ?>officer/cropReq" class="<?php View::getActivePage('cropReq'); ?>">Crop Requests</a></li>
                        <li><a href="<?php echo URL; ?>officer/damageClaims" class="<?php View::getActivePage('damageClaims'); ?>">Damage Claims</a></li>
                        <li><a href="<?php echo URL; ?>farmer/farmerMng" class="<?php View::getActivePage('farmerMng'); ?>">Farmers</a></li>
                        <li><a href="<?php echo URL; ?>officer/reports" class="<?php View::getActivePage('reports'); ?>">Reports</a></li>
                        <li><a href="<?php echo URL; ?>officer/notifications" class="<?php View::getActivePage('notifications'); ?>">Notifications</a></li>

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
                        <!-- <li><a href="<?php echo URL; ?>officer/reports" class="<?php View::getActivePage('reports'); ?>">Reports</a></li>
                        <li><a href="<?php echo URL; ?>officer/notifications" class="<?php View::getActivePage('notifications'); ?>">Notifications</a></li> -->

                    <!-- Vendor configurations for the navigation bar =============================================================== -->
                    <?php elseif(Session::get('role') == 'vendor'): ?>
                        <li><a href="<?php echo URL; ?>vendor/index" class="<?php View::getActivePage('index'); ?>">Buy Crops</a></li>

                        <!-- Farmer configurations for the navigation bar =============================================================== -->
                    <?php elseif ((Session::get('role') == 'farmer')): ?>
                        <li><a href="<?php echo URL; ?>farmer/sellyourcropsif" class="<?php View::getActivePage('sellyourcropsif'); ?>">Sell Crops</a></li>
                        <li><a href="<?php echo URL; ?>farmer/vendOffers" class="<?php View::getActivePage('vendOffers'); ?>">Vendor Offers</a></li>
                        <li><a href="<?php echo URL; ?>farmer/damageclaimif" class="<?php View::getActivePage('damageclaimif'); ?>">Damage Claims</a></li>
                        <li><a href="<?php echo URL; ?>farmer/cropReqif" class="<?php View::getActivePage('cropReqif'); ?>">Crop Requests</a></li>

                <?php endif ?>



                </ul>
            </nav>
            <?php if(Session::get('loggedIn') == true): ?>
            <div class="dropdown" >
                <button class="header-popup-btn"><?php echo substr(Session::get('firstname'),0, 9); ?></button>
                <div class="dropdown-content right-menu">
                    <a href="<?php echo URL . 'user/viewUser/' . Session::get('id') ?>"><i class="fas fa-user-circle"></i> My Profile</a>
                    <a href="#"><i class="fas fa-cog"></i> My Settings</a>
                    <a href="#"><i class="fas fa-question-circle"></i> Help & Support</a>
                    <?php if(Session::get('loggedIn') == true): ?>
                        <a href="<?= URL?>user/logout"><i class="fas fa-sign-out-alt"></i> Log out</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php else: ?>
            <a style="text-decoration: none;" class="header-popup-btn" href="<?php echo URL . 'user/login' ?>">Login</a>
            <?php endif;?>
        </header>
        <div class="content">