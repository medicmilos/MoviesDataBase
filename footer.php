<?php
		if(isset($_REQUEST['subbutton'])){
			$mail=$_REQUEST['subscribe-mail'];
			
			$rmail = "/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/"; 
			$g=0; 
			if(!preg_match($rmail, $mail)){
				$g++; 
			} 
			if($g==0){ 		
				$maill = trim($mail);
				
		
		$upit = "INSERT INTO newsletter (id_email, email) VALUES (NULL,'".$mail."')";
		include("konekcija.php");
		mysql_query($upit, $konekcija);
		mysql_close($konekcija);
			}
		}
?>	
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
							<h5 class="widget-title">Subscribe</h5>		
							<div class="subscribe-block__message">Get Alerted About All the New Movies!</div>
							
							<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="subscribe-block__form">
								<input type="hidden" name="" value="">
								<div class="subscribe-block__input-group">
									<input class="subscribe-block__input" type="email" name="subscribe-mail" value="" placeholder="Enter your email">
									<input type="submit" name='subbutton' value="Subscribe" class="subscribe-block__submit btn btn-secondary"/>
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
						<div class="footer-copyright">© 2017 Movies Database, Inc. All Rights Reserved. Designed and coded by <a href='http://milosmedic.com/' target="_blank">Milos Medic.</a></div>		
					</div>
				</div>
			</div>
		</footer>