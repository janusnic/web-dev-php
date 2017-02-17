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
        // var_dump($menus);
        // Print all tree view menus
        echo "<div class='mega-menu fadeIn animated' id='mega_menu'><div class='mm-3column'><span class='left-images'><img  src=/assets/images/4.jpg><p><a href='#'>Most Popular Styles </a></p></span></div><div id='close-menu'><a class='img-replace' href='#'>Menu</a></div>";
        echo createTreeView(0, $menus);
        echo '</div>';

        // function to create dynamic treeview menus

        function createTreeView($parent, $menu) {
           $html = "";

           if (isset($menu['parents'][$parent])) {
               $html .= "
               <ul class='default submenu'>";

               foreach ($menu['parents'][$parent] as $itemId) {
                  if(!isset($menu['parents'][$itemId])) {
                      $html .= "<li><a href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['name']."</a></li>";
                  }
              $html .= "</ul>";

                  if(isset($menu['parents'][$itemId])) {
                      $html .= "
                      <div class='mm-3column'><span class='categories-list'>";
                     $html .= "<span class='link'><i class='fa fa-mobile'></i>&nbsp;<a  href='".$menu['items'][$itemId]['link']."'>".$menu['items'][$itemId]['name']."</a></span>";

                     $html .= createTreeView($itemId, $menu);
                     $html .= "</span></div>";
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
            <li class="drop-down"><a href="#">Catalog</a></li>
            <?php if(isGuest(true) === true):?>
                <li><a href="/user/signup">SignUp</a></li>
                <li><a href="/user/login">LogIn</a></li>
            <?php else:?>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/user/logout">LogOut</a></li>
            <?php endif;?>
        </ul>
    </nav>
