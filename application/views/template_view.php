<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Accumen
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120712

Modified by VitalySwipe
-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>BeeJee - Задачи</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/custom.css" />
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />

		<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
		<script src="/js/bootstrap.js" type="text/javascript"></script>

	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<span class="cms">BeeJee - Задачи</span>
				</div>
				<div id="menu">
					<ul>
						<li class="first active"><a href="/">Задачи</a></li>
						<li><a href="/addtask">Добавить</a></li>
						<li class="last"><a href="/login">Вход</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">
				<div id="content">
					<?php include 'application/views/'.$content_view; ?>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<a href="/">Vadim</a> &copy; 2020</a>
		</div>
	</body>
</html>
