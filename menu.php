					<div class="header-top-menu">
						<ul id="top-menu" class="top-menu">
							<?php
							
								$upit = "SELECT * FROM menu WHERE menu_place='1'";
									include("konekcija.php");
									$rezultat = mysql_query($upit, $konekcija);  
									mysql_close($konekcija);
									
									while($red = mysql_fetch_array($rezultat)){  
										$name = $red['name'];
										$link = $red['link'];
										
										echo ("<li><a href='$link'>$name</a></li>&nbsp;");
									}
									/*<span class="menu-line">&#x0007C;</span>*/
							?> 
						</ul>
					</div>