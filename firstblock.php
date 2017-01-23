	<div class="first-block">
		<?php
			$upit = "SELECT m.id_movies as id_movies,m.title as title,m.release_year as release_year,m.poster as poster,m.time as time,g.name as name FROM movies m JOIN genre g ON m.id_genre=g.id_genre ORDER BY RAND() DESC LIMIT 1";
			
				include("konekcija.php");
				$rezultat = mysql_query($upit, $konekcija);   
				mysql_close($konekcija);	
				
				while($red = mysql_fetch_array($rezultat)){  
					$idmovie = $red['id_movies'];
					$title = $red['title'];
					$year = $red['release_year'];
					$genre = $red['name'];
					$poster = $red['poster']; 
					$time = $red['time'];
					
					echo ("<div class='main-window big'>
							<div class='main-window-0-background senka'>
								<img src='assets/images/".$poster."'>
							</div>					
							<div class='window-description'>
								<a href='index.php?page=3&movie=".$idmovie."' class='title'>".$title." (".$year.")</a> 
								<div class='tag'>
									<a href='index.php?page=4&genre=".$genre."' class='".$genre."'>".$genre."</a>
								</div> 
							</div>
						</div>");
				}
			
			$upit2 = "SELECT m.id_movies as id_movies, m.title as title,m.release_year as release_year,m.poster as poster,m.time as time,g.name as name FROM movies m JOIN genre g ON m.id_genre=g.id_genre ORDER BY RAND() DESC LIMIT 1,4";
				include("konekcija.php");
				$rezultat2 = mysql_query($upit2, $konekcija);  
				mysql_close($konekcija);
				 
				$br=1;
				while($red = mysql_fetch_array($rezultat2)){  
					$idmovie = $red['id_movies'];
					$title = $red['title'];
					$year = $red['release_year'];
					$genre = $red['name'];
					$poster = $red['poster'];
					$time = $red['time'];
					
					echo ("<div class='aside-window-".$br." small'>
							<div class='aside-window-".$br."-background senka'>
								<img src='assets/images/".$poster."'>
							</div>					
							<div class='window-description'>
								<a href='index.php?page=3&movie=".$idmovie."' class='title'>".$title." (".$year.")</a> 
								<div class='tag'>
									<a href='index.php?page=4&genre=".$genre."' class='".$genre."'>".$genre."</a>
								</div> 
							</div>
						</div>");
					$br++;
				}
		?>
	</div>