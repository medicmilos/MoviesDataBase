			<div class="header-top">
				<div class="header-top-inner">
					<div class="header-top-message">
						<p>
							<h4>The Free Movie Database!</h4>
						</p>
					</div>  
<?php
	include("menu.php");
?>
				</div>
				<div class="cisti"></div>
			</div>
		<header class="masterheader container" role="banner">

			<div class="cisti"></div>
			<div class="header-container">
				<div class="header-middle">
					<div class="header-middle-logo">
						<h1><a href="index.php?page=0"><img  src="assets/images/movies_logo.png" alt="movies_logo"/></a></h1>
					</div>
<?php
	include("login.php");
?>
				</div>
				<div class="cisti"></div>
				<div class="header-bottom">
					<nav id="main-navigation" class="main-navigation" role="navigation">
						<ul id="main-menu" class="main-menu">
							<li><a href="index.php?page=0">home</a></li>
							<?php
								
								$upit = sprintf("SELECT * FROM menu WHERE menu_place=%d LIMIT %d",2,6);
									include("konekcija.php");
									$rezultat = mysql_query($upit, $konekcija);  
									mysql_close($konekcija);
									
									while($red = mysql_fetch_array($rezultat)){  
										$name = $red['name'];
										$link = $red['link'];
										
										echo ("<li><a href='$link$name'>$name</a></li>");
									}
							?> 
							<li id="submenu" class="submenu">
								<a href="#" rel="#">OTHER GENRES</a>
								<ul class="sub-menu">
									<?php
										$upit = sprintf("SELECT * FROM menu WHERE menu_place=%d LIMIT %d,%d",2,6,17);
											include("konekcija.php");
											$rezultat = mysql_query($upit, $konekcija);  
											mysql_close($konekcija);
											
											while($red = mysql_fetch_array($rezultat)){  
												$name = $red['name'];
												$link = $red['link'];
												
												echo ("<li><a href='$link$name'>$name</a></li>");
											}
									?>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>