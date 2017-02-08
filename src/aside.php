<aside class="sidebar-primary">
					<aside id="widget-custom-postson-10" class="widget widget-custom-postson">
						<h4 class="widget-title">New Added Movies</h4>
						<div class="custom-posts-holder row ">
							<?php
								$upit = "SELECT m.username as username, m.id_movies as id_movies,m.title as title,m.release_year as release_year,m.poster as poster,g.name as name FROM movies m JOIN genre g ON m.id_genre=g.id_genre ORDER BY m.time DESC LIMIT 3";
			
								include("konekcija.php");
								$rezultat = mysql_query($upit, $konekcija);   
								mysql_close($konekcija);	
								
								while($red = mysql_fetch_array($rezultat)){  
									$idmovie = $red['id_movies'];
									$title = $red['title'];
									$genre = $red['name'];
									$username = $red['username'];
									$year = $red['release_year'];
									$poster = $red['poster']; 
									
									echo ("	<div class='post'>
												<div class='post-inner'>
													<div class='post-image'>
														<img width='185' height='145' src='assets/images/".$poster."' class='wp-post-image' alt='".$title." (".$year.")'>        
													</div>
													<div class='post-content'>
													<div class='tag'>
														<a href='index.php?page=4&genre=".$genre."' class='".$genre."'>".$genre."</a>
													</div> 
														<h6 class='widget-title'><a href='index.php?page=3&movie=".$idmovie."' title='".$title." (".$year.")'>".$title." (".$year.")</a>
														</h6>  
                                                        <div class='meta'>
															<span class='author'>posted by <span class='post-author'><a href='index.php?page=19&usernamem=$username'>".$username."</a></span></span>  </div>
														</div>
													<a href='#' class='btn'></a>
												</div>
											</div>");
									}
							?>
						</div>
					</aside>
					<aside id="recent-comments-2" class="widget widget_recent_comments">
						<h4 class="widget-title">recent comments</h4>
						<ul id="recentcomments">
												<?php 
						$upit2 = "SELECT m.title as title, m.release_year as year, c.time as time, c.username as username  FROM movies as m JOIN comments c ON m.id_movies=c.id_movies ORDER BY c.time DESC LIMIT 3";
								include("konekcija.php");
								$rezultat2 = mysql_query($upit2, $konekcija);  
								mysql_close($konekcija);
								
								while($red = mysql_fetch_array($rezultat2)){ 
									$time = $red['time'];
									$username = $red['username'];
									$year = $red['year'];
									$title = $red['title'];
									
									
									echo ("<li class='recentcomments'>
												<span class='comment-author-link'><a href='index.php?page=19&usernamem=$username'>".$username."</a></span> on
												<a href='#'>
													".$title." (".$year.")
												</a>
											</li>");
								}
						
						?>
						</ul>
					</aside>
					<aside id="movies_online_widget_subscribe_follow-4" class="widget movies_online widget-subscribe">
						<div class="follow-block">
							<h4 class="widget-title">Follow and subscribe</h4>
							<div class="content_wrap">
								<h5 class="subtitle">Explore New Movies</h5>
								<div class="follow-block__message">.
									..and share the links to movies with your friends on Facebook &amp; More!
								</div>
								<div class="social-list social-list--widget">
									<ul id="social-list-2" class="social-list__items inline-list">
										<li class="#">
											<a href="https://www.facebook.com/" target=_blank"">
												<span class="screen-reader-text">facebook</span>
											</a>
										</li>
										<li class="#">
											<a href="https://www.twitter.com/" target="_blank">
												<span class="screen-reader-text">twitter</span>
											</a>
										</li>
										<li class="#">
											<a href="https://www.plus.google.com/" target="_blank">
												<span class="screen-reader-text">google+</span>
											</a>
										</li>
										<li class="#">
											<a href="https://www.youtube.com/" target=_blank"">
												<span class="screen-reader-text">youtube</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</aside>
					<aside id="recent-comments-2" class="widget widget_recent_comments">
						<h4 class="widget-title">poll</h4>
						
									<div id='statistika'> 
			<div id='statistika2'> 
				<?php
							include("poll.php");
						?>
			</div>
			</div>
						
					</aside>
				</aside>