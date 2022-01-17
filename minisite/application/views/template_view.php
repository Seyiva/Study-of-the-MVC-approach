<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>DREAM TEAM</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="/">Logo</span> <span class="cms">of site</span></a>
				</div>
				<div id="menu">
					<ul>			
						<?php
						if(isset($_SESSION['auth'])) { 
							if ( $_SESSION['status'] == "admin" ) {?>
								<li><a href="/admin?page=1">Админка</a></li> 
							<?php } ?>
							<li><a href="/">Главная</a></li>
							<li><a href="/profile">Профиль</a></li>
							<li><a href="/logout">Выйти</a></li>
							<?php 
						} else { ?>
							<li><a href="/">Главная</a></li>
							<li><a href="/register">Регистрация</a></li>
							<li><a href="/login">Войти</a></li>
						<?php } ?>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			<a href="/">DREAM TEAM</a> &copy; 2022</a>
		</div>
	</body>
</html>