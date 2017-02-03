		<div class="content">
			<div id="primary-content-wrap">
				<div id="primary-content">
					<div class="primary">
						<div class="posts-list posts-list--minimal one-right-sidebar">
							<?php								
						// PAGINACIJA ///
								include('konekcija.php');
								$upit=sprintf("SELECT m.id_movies as id_movies,m.title as title,m.release_year as release_year,m.poster as poster,m.cast as cast,m.username as username,m.time as time,m.description as description, g.name as genre,d.name as director FROM movies m JOIN genre g ON m.id_genre=g.id_genre JOIN director d ON m.id_director=d.id_director WHERE g.name='%s'",$_REQUEST['genre']);
								$sql=mysql_query($upit,$konekcija);
								mysql_close($konekcija);
								
								$nr=mysql_num_rows($sql); //prebrojimo redove
								$genre1 ="";
								while($red = mysql_fetch_array($sql)){  
									$genre1 = $red['genre'];
								}
								if(isset($_GET['pn'])) //uzmemo vrednost iz URL adrese
								{
									$pn=preg_replace('#[^0-9]#i','',$_GET['pn']); 
								}
								else
								{
									$pn=1; //ako nema vrednosti znaci da je korisnik prvi put tu i dolazimo na prvo stranu
								}
								
								$items_per_page=3; 
								
								$last_page=ceil($nr/$items_per_page); 
								if($pn<1)
								{
									$pn=1;
								}
								else if($pn>$last_page)
								{
									$pn=$last_page;
								}
								
								$center_pages=''; //prikaz brojeva stranica
								$sub1=$pn-1; 
								$sub2=$pn-2;
								$add1=$pn+1; 
								$add2=$pn+2;
								
								if($pn == 1)  //ako je na prvoj strani
								{
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;"; //prikazemo taj broj gde se nalazi
									$center_pages.="&nbsp; <a href='index.php?page=4&pn=$add1&genre=$genre1'>$add1</a> &nbsp;"; //i opciju da doda jos jednu stranicu
								}
								else if($pn == $last_page) //ako je na poslednjoj strani
								{
									$center_pages.="&nbsp; <a href='index.php?page=4&pn=$sub1&genre=$genre1'>$sub1</a> &nbsp;"; //prikazemo opciju za jednu manje
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;"; //i stranicu gde se sad nalazi
								}
								else if($pn > 2 && $pn < ($last_page-1))
								{
									$center_pages.="&nbsp; <a href='index.php?page=4&pn=$sub2&genre=$genre1'>$sub2</a> &nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=4&pn=$sub1&genre=$genre1'>$sub1</a> &nbsp;";
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=4&pn=$add1&genre=$genre1'>$add1</a> &nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=4&pn=$add2&genre=$genre1'>$add2</a> &nbsp;";
								}
								else if($pn > 1 && $pn < $last_page)
								{
									$center_pages.="&nbsp; <a href='index.php?page=4&pn=$sub1&genre=$genre1'>$sub1</a> &nbsp;";
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=4&pn=$add1&genre=$genre1'>$add1</a> &nbsp;";
								} 		 
								
								$pagination_display=''; 
								
								if($last_page != "1") //ako ima vise od jedne strane, ako nema nista od ovoga se nece prikazati
								{
									//$pagination_display.="Page <strong>$pn</strong> of $last_page"; //prikaze stranu gde se nalazimo od kolikog broja strana
									
									if($pn != 1) //ako nismo na prvoj strani
									{
										$previous=$pn - 1;
										$pagination_display.="&nbsp; <a href='index.php?page=4&pn=$previous&genre=$genre1' class='nazad'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a>";
									}
									
									$pagination_display.="<span class='pagination_numbers'>$center_pages<span>";
									
									if($pn != $last_page) //ako nismo na zadnjoj strani
									{ 
										$next_page=$pn+1; 
										$pagination_display.="&nbsp; <a href='index.php?page=4&pn=$next_page&genre=$genre1' class='napred'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a>"; 
									}
								}		
								
								$pom=($pn-1)*$items_per_page;
								$upit = sprintf("SELECT m.id_movies as id_movies,m.title as title,m.release_year as release_year,m.poster as poster,m.cast as cast,m.username as username,m.time as time,m.description as description, g.name as genre,d.name as director FROM movies m JOIN genre g ON m.id_genre=g.id_genre JOIN director d ON m.id_director=d.id_director WHERE g.name='%s' LIMIT %d,$items_per_page",$_REQUEST['genre'],$pom);
									include("konekcija.php");
									$rezultat = mysql_query($upit, $konekcija);  
									mysql_close($konekcija);
									
									while($red = mysql_fetch_array($rezultat)){  
										$idmovie = $red['id_movies'];
										$title = $red['title'];
										$year = $red['release_year'];
										$poster = $red['poster'];
										$cast = $red['cast'];
										$director = $red['director'];
										$description = $red['description'];
										$genre = $red['genre'];
										$username = $red['username'];
										$time = $red['time'];
										
										echo ("<article class='posts-list__item card hentry post type-post status-publish format-standard has-post-thumbnail category-comedy tag-tv has-thumb'>
													<div class='post-list__item-content'>
													<figure class='post-thumbnail'>
														<a href='index.php?page=3&movie=".$idmovie."' class='post-thumbnail__link post-thumbnail--fullwidth'><img width='192' height='152' src='assets/images/".$poster."'  alt='".$title."'/></a> 
													</figure> 
													<header class='entry-header'>
														<h2 class='entry-title'><a href='index.php?page=3&movie=".$idmovie."' rel='bookmark'>".$title." (".$year.")</a></h2>
													</header> 
													<div class='entry-content'>
														<span class='white-col'>Released in:</span> ".$year."
														<span class='white-col'>Genre:</span> ".$genre."
														<span class='white-col'>Directed by:</span> ".$director."
														<span class='white-col'>Cast:</span>".$cast."
													</div> 
													<div class='entry-meta'>
														<span class='post-author'>
															Posted by 
															<a class='post-author__link' href='#'>".$username."</a>
														</span>
														<span class='post__date'>
															<a class='post-date__link' href='#'>".$time."</a>
														</span>
													</div> 
													</div> 
												</article>");
												
									}
									echo ("<div id='pagination'>$pagination_display</div>");
							?>	
						</div>
					</div>
					<?php
						include("aside.php");
					?>
				</div>
			</div>
		</div>
