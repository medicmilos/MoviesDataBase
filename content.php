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
								<div class="post">
									<div id="innerp" class="post-inner">
										<div class="post-image">
											<img width="185" height="145" src="https://ld-wp.template-help.com/wordpress_51822/wp-content/uploads/2016/02/img9-185x145.jpg" class="wp-post-image" alt="Alex Cross (2012)">        
										</div>
										<div class="post-content">
											<h6 class="widget-title"><a href="https://ld-wp.template-help.com/wordpress_51822/2016/02/17/alex-cross-2012/" title="Alex Cross (2012)">Alex Cross (2012)</a>
											</h6>                                                                    
										</div>
										<a href="#" class="btn"></a>
									</div>
								</div>
								<div class="post">
									<div id="innerp" class="post-inner">
										<div class="post-image">
											<img width="185" height="145" src="https://ld-wp.template-help.com/wordpress_51822/wp-content/uploads/2016/02/img10-1-185x145.jpg" class="wp-post-image" alt="Broken city (2013)">        
										</div>
										<div class="post-content">
											<h6 class="widget-title"><a href="https://ld-wp.template-help.com/wordpress_51822/2016/02/15/broken-city-2013/" title="Broken city (2013)">Broken city (2013)</a>
											</h6>                                                                    
										</div>
										<a href="#" class="btn"></a>
									</div>
								</div>
								<div class="post">
									<div id="innerp" class="post-inner">
										<div class="post-image">
											<img width="185" height="145" src="https://ld-wp.template-help.com/wordpress_51822/wp-content/uploads/2016/03/img17-185x145.jpg" class="wp-post-image" alt="The Wicked  (2015)">        
										</div>
										<div class="post-content">
											<h6 class="widget-title"><a href="https://ld-wp.template-help.com/wordpress_51822/2016/02/14/the-wicked-2015/" title="The Wicked  (2015)">The Wicked (2015)</a>
											</h6>                                                                    
										</div>
										<a href="#" class="btn"></a>
									</div>
								</div>
								<div class="post">
									<div id="innerp" class="post-inner">
										<div class="post-image">
											<img width="185" height="145" src="https://ld-wp.template-help.com/wordpress_51822/wp-content/uploads/2016/03/img17-185x145.jpg" class="wp-post-image" alt="The Wicked  (2015)">        
										</div>
										<div class="post-content">
											<h6 class="widget-title"><a href="https://ld-wp.template-help.com/wordpress_51822/2016/02/14/the-wicked-2015/" title="The Wicked  (2015)">The Wicked (2015)</a>
											</h6>                                                                    
										</div>
										<a href="#" class="btn"></a>
									</div>
								</div>
								<div class="post">
									<div id="innerp" class="post-inner">
										<div class="post-image">
											<img width="185" height="145" src="https://ld-wp.template-help.com/wordpress_51822/wp-content/uploads/2016/03/img17-185x145.jpg" class="wp-post-image" alt="The Wicked  (2015)">        
										</div>
										<div class="post-content">
											<h6 class="widget-title"><a href="https://ld-wp.template-help.com/wordpress_51822/2016/02/14/the-wicked-2015/" title="The Wicked  (2015)">The Wicked (2015)</a>
											</h6>                                                                    
										</div>
										<a href="#" class="btn"></a>
									</div>
								</div>
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

