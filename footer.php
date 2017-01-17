		<footer class="site-footer container">
			<div class="footer-area-wrap invert">
				<div class="container">
					<section id="footer-area" class="footer-area">
						<aside id="categories-3" class="widget categories">
							<h5 class="widget-title">categories</h5>		
							<ul>
								<?php
									
									$upit = "SELECT * FROM menu WHERE menu_place='2' LIMIT 10";
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
						</aside>
						<aside id="nav_menu-2" class="widget widget_nav_menu">
							<h5 class="widget-title">information</h5>
								<ul id="menu-footer-menu" class="menu">
							<?php
							
								$upit = "SELECT * FROM menu WHERE menu_place='1'";
									include("konekcija.php");
									$rezultat = mysql_query($upit, $konekcija);  
									mysql_close($konekcija);
									
									while($red = mysql_fetch_array($rezultat)){  
										$name = $red['name'];
										$link = $red['link'];
										
										echo ("<li><a href='$link'>$name</a></li>");
									}
							?> 
								</ul>
						</aside>
						<aside id="tag_cloud-2" class="widget widget_tag_cloud">
							<h5 class="widget-title">tags</h5>
							<div class="tagcloud">
								<?php
									$upit = "SELECT * FROM genre";
										include("konekcija.php");
										$rezultat = mysql_query($upit, $konekcija);  
										mysql_close($konekcija);
										
										while($red = mysql_fetch_array($rezultat)){  
											$name = $red['name'];
											
											echo ("<a class='".$name."2"."' href='index.php?page=4&genre=".$name."'>$name</a>");
										}
										/*<span class="menu-line">&#x0007C;</span>*/
								?> 
							</div>
						</aside>
						<aside id="widget_subscribe" class="widget movies_online widget-subscribe">
						<div class="subscribe-block ">
							<h5 class="widget-title">Subscribe</h5>		<div class="subscribe-block__message">Get Alerted About All the New Movies!</div>
							<form method="POST" action="" class="subscribe-block__form">
								<input type="hidden" id="movies_online_subscribe" name="movies_online_subscribe" value="97f2824e8e">
								<input type="hidden" name="_wp_http_referer" value="/wordpress_51822/">
								<div class="subscribe-block__input-group">
									<input class="subscribe-block__input" type="email" name="subscribe-mail" value="" placeholder="Enter your email">
									<a href="#" class="subscribe-block__submit btn btn-secondary">Subscribe</a>
								</div>
							</form>
						</div>
						</aside>
					</section>
				</div>
			</div>
			<div class="footer-container">
				<div class="site-info container">
					<div class="site-info__flex">
						<div class="footer-copyright">© 2017 Movies Database, Inc. All Rights Reserved.</div>		
					</div>
				</div>
			</div>
		</footer>