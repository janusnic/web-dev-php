<?php

class Url {

	public static function redirect($url = null){
		header('location: '.'/'.$url);
		exit;
	}

	public static function get_template_path(){
	    return '/app/templates/'.Session::get('template').'/';
	}


	public static function treeView() {
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
				return createTreeView(0, $menus);
			}
}
