			<div class="content"> 
			<div id="primary-content-wrap">
			<div id="primary-content">
				<div class="primary">
								<div id='admin-nav'>
			<span class='admin-nav-cont'><a href='index.php?page=6'>Users</a></span>
			<span class='admin-nav-cont'><a href='index.php?page=7'>Movies</a></span>
			<span class='admin-nav-cont'><a href='index.php?page=8'>Comments</a></span>
			<span class='admin-nav-cont'><a href='index.php?page=9'>Polls</a></span>
		</div>
					<?php   
						if(isset($_REQUEST['btnSaveUprofile'])){
								@$title = ($_REQUEST['taEditEmail']);
								@$year = ($_REQUEST['taEditPass']); 
								@$description = ($_REQUEST['taEditDesc']); 
								
								$upit = "UPDATE movies SET title = '".$title."', release_year = '".$year."', description = '".$description."'  WHERE id_movies = '".$_REQUEST['id']."'";
									include("konekcija.php");
									$rezultat = mysql_query($upit, $konekcija);  
									mysql_close($konekcija); 
								//header("location:index.php?page=6&id=".$_SESSION['pom33'].""); 
							}




						$upit = "SELECT * FROM movies WHERE id_movies='".$_REQUEST['id']."'";
								include("konekcija.php");
								$rezultat = mysql_query($upit, $konekcija);  
								mysql_close($konekcija);
							
							 
							$pom = 0;
							echo("<form action='index.php?page=13' method='GET'>");
							
							$iduser = '';
							while($red = mysql_fetch_array($rezultat)){  
								$idcomment = $red['id_movies']; 
								$title = $red['title']; 
								$year = $red['release_year']; 
								$description = $red['description']; 
								
								 
						echo("<input type='hidden' name='id' value='$idcomment' />");
						
						
								$pom++;
								echo("
								
								<div id='user-content2' class='posts-content posts-content22'>
									<table border='1'>
										<input type='hidden' name='page' value='13' />
										<tr><td><b>Title:</b></td><td><span class='editmail'><input type='hidden' name='taEditEmail' value='$title' /><span class='email1'>$title</span></span></td></tr>
										<tr><td><b>Year:</b></td><td><span class='editpass'><input type='hidden' name='taEditPass' value='$year' /><span class='editpass1'>$year</span></span></td></tr> 
										<tr><td><b>Description:</b></td><td><span class='editdesc'><input type='hidden' name='taEditDesc' value='$description' /><span class='editdesc1'>$description</span></span></td></tr> 
										<tr><td class='save22' colspan='2'><b>  <input type='submit' class='save2' value='Update' name='btnSaveUprofile'>  </b></td></tr>
									</table>
								</div> 	
									
									
								"); 
							}
							
							 echo("</form>");
									
					?>
				</div>
				<?php
					include("aside.php");
				?>
			</div>
		</div>
		</div>