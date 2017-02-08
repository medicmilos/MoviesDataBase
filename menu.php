					<div class="header-top-menu">
						<ul id="top-menu" class="top-menu">
							<?php
								if(@$_REQUEST['page']=='5') {
										echo("<li><a href='index.php?page=5'> <b>&starf;</b ><span> Cpanel </span></a></li>");
									}else if(@$_SESSION['user_mod']=='1'){
										echo("<li><a href='index.php?page=5'>&nbsp;  <b>&starf;</b ><span> Cpanel </span></a></li>");
									}else{
										
									}
								$upit = sprintf("SELECT * FROM menu WHERE menu_place=%d ORDER BY parent",1);
									include("konekcija.php");
									$rezultat = mysql_query($upit, $konekcija);  
									mysql_close($konekcija);
									
									while($red = mysql_fetch_array($rezultat)){  
										$name = $red['name'];
										$link = $red['link'];
										
										echo ("<li><a href='$link'>$name</a></li>&nbsp;");
									}
							?>
							</ul>
					</div>