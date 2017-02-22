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
	        <?php

	        $categories = [
	            ['id'=>1, 'name'=>'Computer', 'parent_id'=>0, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>2, 'name'=>'Laptops', 'parent_id'=>1, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>3, 'name'=>'Tablets', 'parent_id'=>1, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>4, 'name'=>'Monitors', 'parent_id'=>1, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>5, 'name'=>'Printers', 'parent_id'=>1, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>6, 'name'=>'Scanners', 'parent_id'=>1, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>7, 'name'=>'Phones', 'parent_id'=>0, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>8, 'name'=>'iPhone', 'parent_id'=>7, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>9, 'name'=>'Speakers', 'parent_id'=>7, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>10, 'name'=>'Subwoofers', 'parent_id'=>7, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>11, 'name'=>'Amplifiers', 'parent_id'=>7, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>12, 'name'=>'Players', 'parent_id'=>7, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>13, 'name'=>'iPods', 'parent_id'=>7, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>14, 'name'=>'TVs', 'parent_id'=>7, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>15, 'name'=>'Clothes', 'parent_id'=>0, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>16, 'name'=>'Jumpers', 'parent_id'=>15, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>17, 'name'=>'Cardigans', 'parent_id'=>15, 'sort_order'=>0, 'status'=>11, 'link' =>'#' ],
	            ['id'=>18, 'name'=>'Clothes', 'parent_id'=>15, 'sort_order'=>0, 'status'=>1, 'link' =>'#' ],
	        ];
	        $menus = array(
	        	'items' => array(),
	        	'parents' => array()
	        );

	        foreach($categories as $items) {
	        	// Create current menus item id into array
	        	$menus['items'][$items['id']] = $items;
	        	// Creates list of all items with children
	        	$menus['parents'][$items['parent_id']][] = $items['id'];
	        }

	        // Print all tree view menus

	        echo "<div class='fadeIn animated' id='mega_menu'>";

			echo '<ul class="mega-menu">';

			echo createTreeView(0, $menus);

			echo '</ul></div>';

	        // function to create dynamic treeview menus

	        function createTreeView($parent, $menu) {
	           $html = "";

	           if (isset($menu['parents'][$parent])) {
	               foreach ($menu['parents'][$parent] as $itemId) {
	                  if(!isset($menu['parents'][$itemId])) {
	                      $html .= "<li><a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['name']."</a></li>";
	                  }

	                  if(isset($menu['parents'][$itemId])) {
	                      $html .= "<li><a  href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['name']."</a><ul class='mega-menu-inner'>";
	                     $html .= createTreeView($itemId, $menu);
	                     $html .= "</li>";
						 $html .= "</ul>";
	                  }
	               }
	           }

	           return $html;
	        }
	         ?>
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
