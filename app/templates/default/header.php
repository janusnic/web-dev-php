<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in index.php?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo url::get_template_path();?>assets/js/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet prefetch" href="<?php echo url::get_template_path();?>assets/css/reset.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="<?php echo url::get_template_path();?>assets/font-awesome/css/font-awesome.min.css">

    <link href="<?php echo url::get_template_path();?>assets/css/main.css" rel="stylesheet">
	<link href="<?php echo url::get_template_path();?>assets/css/pager.css" rel="stylesheet">
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

	        <!-- Mega Menu -->
	        <div class='fadeIn animated' id='mega_menu'>
				<ul class="mega-menu">
					<?= url::treeView();?>
				</ul>
			</div>
	        <!-- Mega Menu -->

	    </header>
	    <nav id="main-nav">
	        <ul>
	            <li><a href="/" class="current">Home</a></li>
	            <li><a href="/about" class="">About</a></li>
	            <li class="drop-down"><a href="#">Catalog</a></li>
	            <?php if(User::isGuest()):?>
	                <li><a href="/user/signup">SignUp</a></li>
	                <li><a href="/user/login">LogIn</a></li>
	            <?php else:?>
	                <li><a href="/profile">Profile</a></li>
	                <li><a href="/user/logout">LogOut</a></li>
	            <?php endif;?>
	        </ul>
	    </nav>
<main>
