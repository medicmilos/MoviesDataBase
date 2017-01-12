<?php
	session_start(); 
?> 
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Movies database</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<meta name="description" content="The Free Movie Database is a free web service to obtain movie information."/>
		<meta name="keywords" content=""/>
		<meta name="author" content="Milos Medic"/>
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
		<link rel="stylesheet" type="text/css" href="src/css/main.css"/> 		
		<script src='src/js/jquery-3.1.1.min.js'></script>
		<script src='src/js/main.js'></script>
	</head>
	<body>
		<header class="masterheader container" role="banner">
			<div class="header-top">
				<div class="header-top-inner">
					<div class="header-top-message">
						<p>
							<h4>The Free Movie Database!</h4>
						</p>
					</div>  
					<div class="header-top-menu">
						<ul id="top-menu" class="top-menu">
							<li id="" class=""><a href="#" rel="#">home</a></li>
							<span class="menu-line">&#x0007C;</span><li id="" class=""><a href="#" rel="#">about</a></li>
							<span class="menu-line">&#x0007C;</span><li id="" class=""><a href="#" rel="#">contact</a></li>
						</ul>
					</div>
				</div>
				<div class="cisti"></div>
			</div>
			<div class="cisti"></div>
			<div class="header-container">
				<div class="header-middle">
					<div class="header-middle-logo">
						<h1><img src="https://ld-wp.template-help.com/wordpress_51822/wp-content/themes/movies_online/assets/images/logo.png" alt="" class=""></h1>
					</div>
					<div class="header-middle-form">
						<ul>
							<li id="login" class="login-page">
								<a id="login-trigger" href="#">
									Log in <span>▼</span>
								</a>
							  <div id="login-content" class="form">
								<form class="login-form">
								  <input type="text" placeholder="username"/>
								  <input type="password" placeholder="password"/>
								  <button>login</button>
								  <p class="message">Not registered? <a href="#">Create an account</a></p>
								</form>
							  </div>                     
							</li> 
						</ul>
				</div>
				<div class="cisti"></div>
				<div class="header-bottom">
					<nav id="main-navigation" class="main-navigation" role="navigation">
						<ul id="main-menu" class="main-menu">
							<li id="" class="active"><a href="index.php" rel="#">HOME</a></li>
							<li id="" class=""><a href="#" rel="#">COMEDY</a></li>
							<li id="" class=""><a href="#" rel="#">DRAMA</a></li>
							<li id="" class=""><a href="#" rel="#">ADCTION</a></li>
							<li id="" class=""><a href="#" rel="#">HORROR</a></li>
							<li id="" class=""><a href="#" rel="#">SCI-FI</a></li>
							<li id="" class=""><a href="#" rel="#">TV SHOWS</a></li>
							<li id="" class=""><a href="#" rel="#">OTHER GENRES</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
	</body>
</html>