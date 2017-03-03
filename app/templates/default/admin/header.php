<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in index.php?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo url::get_template_path();?>assets/js/modernizr.js" type="text/javascript"></script>
	<!-- Iconos -->
    <link rel="stylesheet" href="<?php echo url::get_template_path();?>assets/font-awesome/css/font-awesome.min.css">

    <link href="<?php echo url::get_template_path();?>assets/css/admin.css" rel="stylesheet">
</head>
<body>
	<span class='bckg'></span>
	<header>
	  <h1>
		Admin
	  </h1>
	  <nav>
		<ul>
		  <li>
			<a data-title='Projects' href="/admin">Dashboard</a>
		  </li>
		  <li>
			<a data-title='Управление товарами' href="/admin/product">Products</a>
		  </li>
		  <li>
			<a data-title='Управление категориями'  href="/admin/category">Categories</a>
		  </li>
		  <li>
			<a data-title='Timeline'>Timeline</a>
		  </li>
		  <li>
			<a data-title='Settings'>Settings</a>
		  </li>
		  <li>
			<a data-title='Search'>Search</a>
		  </li>
		</ul>
	  </nav>
	</header>
	<main>
	  <div class='title'>
		<h2>Projects</h2>
		<a href='#' title='Profil'>
		  Hello Admin !
		</a>
	  </div>
