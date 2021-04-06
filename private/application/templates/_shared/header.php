<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Procedural Ali</title>
		<link rel="stylesheet" type = "text/css" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type = "text/css" href="assets/css/main.css">
	</head>
	<body>
		<div class="container">
			<?php 
				if(isset($_SESSION['ADMIN'])) {
					require_once '../private/application/templates/_shared/menus/admin_menu.php';
				} elseif (isset($_SESSION['CUSTOMER'])) {
					require_once '../private/application/templates/_shared/menus/customer_menu.php';
				} else {
					require_once '../private/application/templates/_shared/menus/visitor_menu.php';
				}
			?>