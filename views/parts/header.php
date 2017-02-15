<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SHOPAHOLIC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php ROOT?>/assets/js/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet prefetch" href="<?php ROOT?>/assets/css/reset.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="<?php ROOT?>/assets/font-awesome/css/font-awesome.min.css">

    <link href="<?php ROOT?>/assets/css/main.css" rel="stylesheet">

</head>
<body>
    <header>
        <div class="search">
            <input type="submit" value="&#xf002;" class="search-btn fa ib-m">
            <div class="search-slide ib-m">
        		<input type="text" placeholder="Enter your search" class="ib-m">
                <div class="search-close ib-m"><i class="fa fa-times"></i></div>
        	</div>

        </div>
        <div id="hamburger-menu"><a href="#"><i class="fa fa-bars" aria-hidden="true"></i>
</a></div>
        <div id="cart-trigger">
            <a class="cart-link" href="#">
            <span class="cart-text fa fa-shopping-cart"><span class="cart-quantity empty">0</span></span>
          </a>
        </div>
    </header>
    <nav id="main-nav">
        <ul>
            <li><a href="/" class="current">Home</a></li>
            <li class="drop-down"><a href="#">Catalog</a></li>
            <?php if(isGuest() === false):?>
                <li><a href="/views/user/index.php">SignUp</a></li>
                <li><a href="/views/user/login.php">LogIn</a></li>
            <?php else:?>
                <li><a href="#">Profile</a></li>
                <li><a href="#">LogOut</a></li>
            <?php endif;?>
        </ul>
    </nav>
