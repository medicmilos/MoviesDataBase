			<div class="content">
			<?php
				include("firstblock.php");
			?>
			<div id="primary-content-wrap">
			<div id="primary-content">
				<div class="primary">
				<section id="top-first" class="movies_slider">
						<aside id="widget_slider" class="widget cherry widget_slider">
							<h4 class="widget-title">featured news</h4> 
							<div class="slider-container">
							  <div class="slider-control left inactive"></div>
							  <div class="slider-control right"></div>
							  <div class="slider">
							 <?php
								$upit = "SELECT * FROM movies ORDER BY time DESC LIMIT 4";
									include("konekcija.php");
									$rezultat = mysql_query($upit, $konekcija);  
									mysql_close($konekcija);
									
									$br=0;
									while($red = mysql_fetch_array($rezultat)){  
										$idmovie = $red['id_movies'];
										$title = $red['title'];
										$year = $red['release_year'];
										$poster = $red['poster'];
										$username = $red['username'];
										$time = $red['time'];
										
										echo (" <div class='slide slide-".$br." active senka'>
													<div class='slide__bg' style=\"background-image: url('assets/images/".$poster."')\">
													</div>
													<div class='slide__content'>
														<div class='slide__text'>
															<a href='index.php?page=3&movie=".$idmovie."' class='slide__text-link'>".$title." (".$year.")</a> 
														</div>
													</div>
												</div>");
										$br++;
									}
									/*<span class="menu-line">&#x0007C;</span>*/
							?>  
							  </div>
							</div>
						</aside>
					</section>
					<main id="main" class="site-main" role="main">
						<aside id="widget-custom-postson-10" class="widget widget-custom-postson">
							<h4 class="widget-title-news">MORE NEWS</h4>
							<div class="custom-posts-holder row news">
														<?php								
						// PAGINACIJA ///
								include('konekcija.php');
								$upit="SELECT m.id_movies as id_movies,m.title as title,m.release_year as release_year,m.poster as poster,m.cast as cast,m.username as username,m.time as time,m.description as description, g.name as genre,d.name as director FROM movies m JOIN genre g ON m.id_genre=g.id_genre JOIN director d ON m.id_director=d.id_director";
								$sql=mysql_query($upit,$konekcija);
								mysql_close($konekcija);
								
								$nr=mysql_num_rows($sql); //prebrojimo redove
								if(isset($_GET['pn'])) //uzmemo vrednost iz URL adrese
								{
									$pn=preg_replace('#[^0-9]#i','',$_GET['pn']); 
								}
								else
								{
									$pn=1; //ako nema vrednosti znaci da je korisnik prvi put tu i dolazimo na prvo stranu
								}
								
								$items_per_page=5; 
								
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
									$center_pages.="&nbsp; <a href='index.php?page=0&pn=$add1'>$add1</a> &nbsp;"; //i opciju da doda jos jednu stranicu
								}
								else if($pn == $last_page) //ako je na poslednjoj strani
								{
									$center_pages.="&nbsp; <a href='index.php?page=0&pn=$sub1'>$sub1</a> &nbsp;"; //prikazemo opciju za jednu manje
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;"; //i stranicu gde se sad nalazi
								}
								else if($pn > 2 && $pn < ($last_page-1))
								{
									$center_pages.="&nbsp; <a href='index.php?page=0&pn=$sub2'>$sub2</a> &nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=0&pn=$sub1'>$sub1</a> &nbsp;";
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=0&pn=$add1'>$add1</a> &nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=0&pn=$add2'>$add2</a> &nbsp;";
								}
								else if($pn > 1 && $pn < $last_page)
								{
									$center_pages.="&nbsp; <a href='index.php?page=0&pn=$sub1'>$sub1</a> &nbsp;";
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=0&pn=$add1'>$add1</a> &nbsp;";
								} 		 
								
								$pagination_display=''; 
								
								if($last_page != "1") //ako ima vise od jedne strane, ako nema nista od ovoga se nece prikazati
								{
									//$pagination_display.="Page <strong>$pn</strong> of $last_page"; //prikaze stranu gde se nalazimo od kolikog broja strana
									
									if($pn != 1) //ako nismo na prvoj strani
									{
										$previous=$pn - 1;
										$pagination_display.="&nbsp; <a href='index.php?page=0&pn=$previous' class='nazad'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a>";
									}
									
									$pagination_display.="<span class='pagination_numbers'>$center_pages<span>";
									
									if($pn != $last_page) //ako nismo na zadnjoj strani
									{ 
										$next_page=$pn+1; 
										$pagination_display.="&nbsp; <a href='index.php?page=0&pn=$next_page' class='napred'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a>"; 
									}
								}		
								
								$pom=($pn-1)*$items_per_page;
								$upit = sprintf("SELECT m.id_movies as id_movies,m.title as title,m.release_year as release_year,m.poster as poster,m.cast as cast,m.username as username,m.time as time,m.description as description, g.name as genre,d.name as director FROM movies m JOIN genre g ON m.id_genre=g.id_genre JOIN director d ON m.id_director=d.id_director LIMIT %d,$items_per_page",$pom);
									include("konekcija.php");
									$rezultat = mysql_query($upit, $konekcija);  
									mysql_close($konekcija);
									
									while($red = mysql_fetch_array($rezultat)){  
										$idmovie = $red['id_movies'];
										$title = $red['title'];
										$year = $red['release_year'];
										$poster = $red['poster']; 
										$description = $red['description']; 
										$username = $red['username'];
										$time = $red['time'];
										
										$prvideo="";
											if(strlen($description)>150){
											$prvideo=substr($description, 0, 150); 
										}else{
											$prvideo=$description;
										}
										echo ("<div class='post'>
									<div id='innerp' class='post-inner'>
										<div class='post-image'>
											<img width='185' height='145' src='assets/images/".$poster."' class='wp-post-image' alt='".$title."'>        
										</div>
										<div class='post-content'>
											<h6 class='widget-title'><a href='index.php?page=3&movie=".$idmovie."' title='".$title."'>".$title." (".$year.")</a></h6> 
											<p>".$prvideo."...</p>
											<div class='meta'>
											<span class='author'>posted by <span class='post-author'>".$username."</span><span class='dottclass'>&middot;</span></span>
											<span class='post__date'>".$time."</span> </div>
										</div>
										<a href='#' class='btn'></a>
									</div>
								</div>");
												
									}
									echo ("<div id='pagination'>$pagination_display</div>");
							?>
							</div>
						</aside>
					</main>
				</div>
				<?php
					include("aside.php");
				?>
			</div>
		</div>
		</div>

