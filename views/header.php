
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/title-logo.png" type="image/icon type">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css"/>
    <!-- <link rel="stylesheet" href="my-profile.css"> -->
    <!-- <link rel="stylesheet" href="lay-table.css"> -->
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
                    <li><a href="#" class="active">Downloads</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
            <div class="dropdown">
                <button class="header-popup-btn">My Profile</button>
                <div class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="#">Setting</a>
                    <a href="#">Help & Support</a>
                    <?php if(Session::get('loggedIn') == true):?>
                        <hr>
                        <a href="<?= URL?>user/logout">Log out</a>
                    <?php endif; ?>
                </div>
            </div>
        </header>
        <div class="content">