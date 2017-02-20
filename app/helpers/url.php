<?php

class Url {

	public static function redirect($url = null){
		header('location: '.'/'.$url);
		exit;
	}

	public static function get_template_path(){
	    return '/app/templates/'.Session::get('template').'/';
	}

}
