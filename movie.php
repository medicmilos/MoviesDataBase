		<?php
							if(isset($_REQUEST["submitreply"])){
								$id_movies=$_REQUEST['movie'];
								$username=$_SESSION['username'];
								$comment=$_REQUEST['replycomment'];
								$upit2 = "INSERT INTO comments (id_comments, id_movies,username,comment) VALUES(NULL,'".$id_movies."','".$username."','".$comment."')";
									include("konekcija.php");
									$rezultat2 = mysql_query($upit2, $konekcija);  
									mysql_close($konekcija);
									$movief=$_REQUEST['movie'];
									header("Location:index.php?page=3&movie='".$movief."'");
							}
		?>
	<div class="content">
			<div id="primary-content-wrap">
				<div id="primary-content">
					<div class="primary">
						<?php
							$upit = "SELECT m.title as title,m.release_year as release_year,m.poster as poster,m.cast as cast,m.username as username,m.time as time,m.description as description, g.name as genre,d.name as director FROM movies m JOIN genre g ON m.id_genre=g.id_genre JOIN director d ON m.id_director=d.id_director WHERE id_movies=".$_REQUEST['movie']."";
								include("konekcija.php");
								$rezultat = mysql_query($upit, $konekcija);  
								mysql_close($konekcija);
								
								while($red = mysql_fetch_array($rezultat)){   
									$title = $red['title'];
									$year = $red['release_year'];
									$poster = $red['poster'];
									$cast = $red['cast'];
									$director = $red['director'];
									$description = $red['description'];
									$genre = $red['genre'];
									$username = $red['username'];
									$time1 = date('j. F Y.',strtotime($red['time']));
									$time = strtolower($time1);
									
									echo (" <main id='main' class='site-main' role='main'>
												<article id='post-60' class='post-60 post type-post status-publish format-standard has-post-thumbnail hentry category-drama category-fantasy category-uncategorized tag-fantasy has-thumb'>
													<header class='entry-header'>
													<div class='post__cats'>
														<a href='index.php?page=4&genre=".$genre."' class='".$genre."'>".$genre."</a>
													</div>
													<h4 class='entry-title'>".$title." (".$year.")</h4>
													<div class='entry-meta'>
														<span class='post-author'>Posted by <a class='post-author__link' href='#'>".$username."</a></span>
														<span class='post__date'>".$time."</span> 
													</div> 
													</header> 
													<figure class='post-thumbnail'>
														<img width='770' height='480' src='assets/images/".$poster."' class='post-thumbnail__img wp-post-image' alt='".$title."'> </figure> 
													<div class='entry-content'>
														<p><span style='color: #ffffff;'>Released in:</span> ".$year."</p>
														<p><span style='color: #ffffff;'>Genre:</span> ".$genre."</p>
														<p><span style='color: #ffffff;'>Directed by:</span>".$director."</p>
														<p><span style='color: #ffffff;'>Cast:</span> ".$cast."</p>
														<p><span style='color: #ffffff;'>Description:</span> ".$description."</p>
													</div>
												</article>  
											</main>");
								}
						// PAGINACIJA ///
								include('konekcija.php');
								$sql=mysql_query("SELECT c.id_movies as movie, c.username as username,c.time as time,u.image as image,c.comment as comment FROM comments c JOIN users u ON c.username=u.username WHERE 
							c.id_movies=".$_REQUEST['movie']." ",$konekcija);
								mysql_close($konekcija);
								
								$nr=mysql_num_rows($sql); //prebrojimo redove
								$movie1 ="";
								while($red = mysql_fetch_array($sql)){  
									$movie1 = $red['movie'];
								}
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
									$center_pages.="&nbsp; <a href='index.php?page=3&pn=$add1&movie=$movie1'>$add1</a> &nbsp;"; //i opciju da doda jos jednu stranicu
								}
								else if($pn == $last_page) //ako je na poslednjoj strani
								{
									$center_pages.="&nbsp; <a href='index.php?page=3&pn=$sub1&movie=$movie1'>$sub1</a> &nbsp;"; //prikazemo opciju za jednu manje
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;"; //i stranicu gde se sad nalazi
								}
								else if($pn > 2 && $pn < ($last_page-1))
								{
									$center_pages.="&nbsp; <a href='index.php?page=3&pn=$sub2&movie=$movie1'>$sub2</a> &nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=3&pn=$sub1&movie=$movie1'>$sub1</a> &nbsp;";
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=3&pn=$add1&movie=$movie1'>$add1</a> &nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=3&pn=$add2&movie=$movie1'>$add2</a> &nbsp;";
								}
								else if($pn > 1 && $pn < $last_page)
								{
									$center_pages.="&nbsp; <a href='index.php?page=3&pn=$sub1&movie=$movie1'>$sub1</a> &nbsp;";
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=3&pn=$add1&movie=$movie1'>$add1</a> &nbsp;";
								} 		 
								
								$pagination_display=''; 
								
								if($last_page != "1") //ako ima vise od jedne strane, ako nema nista od ovoga se nece prikazati
								{
									//$pagination_display.="Page <strong>$pn</strong> of $last_page"; //prikaze stranu gde se nalazimo od kolikog broja strana
									
									if($pn != 1) //ako nismo na prvoj strani
									{
										$previous=$pn - 1;
										$pagination_display.="&nbsp; <a href='index.php?page=3&pn=$previous&movie=$movie1' class='nazad'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a>";
									}
									
									$pagination_display.="<span class='pagination_numbers'>$center_pages<span>";
									
									if($pn != $last_page) //ako nismo na zadnjoj strani
									{ 
										$next_page=$pn+1; 
										$pagination_display.="&nbsp; <a href='index.php?page=3&pn=$next_page&movie=$movie1' class='napred'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a>"; 
									}
								}		
							@$upit2 = "SELECT c.username as username,c.time as time,u.image as image,c.comment as comment FROM comments c JOIN users u ON c.username=u.username WHERE 
							c.id_movies=".$_REQUEST['movie']." LIMIT ".($pn-1)*$items_per_page." ,$items_per_page";
								include("konekcija.php");
								$rezultat2 = mysql_query($upit2, $konekcija);  
								mysql_close($konekcija);
							if($rezultat2){
								echo ("<div id='comments' class='comments-area'><ol class='comment-list'>");

								while(@$red = mysql_fetch_array($rezultat2)){   
									$username = $red['username'];
									$time1 = date('j. F Y.',strtotime($red['time']));
									$time = strtolower($time1);
									$image = $red['image'];
									$comment = $red['comment'];
									
									echo (" 
												
													<li class='comment byuser comment-author-admin bypostauthor even thread-even depth-1' id='comment-2'>
														<article id='div-comment-2' class='comment-body'>
															<div class='comment-body__holder'>
																<footer class='comment-meta'>
																	<div class='comment-author vcard'>
																		<img alt='' src='assets/images/members/".$image ."'class='avatar avatar-71 photo' height='71' width='71'> 
																	</div>
																	<div class='comment-metadata'>
																		<span class='posted-by'>Posted by</span> 
																		<b class='fn'>".$username ."</b> 
																		<a href='#' class='comment-date'>".$time ."</a> 
																	</div>
																</footer>
																<div class='comment-content'>
																	<p>".$comment ."</p>
																</div>
															</div>
														</article> 
													</li>   
												");
								}
								echo ("<div id='pagination'>$pagination_display</div></ol></div>");
							}							
							?>
						
						
		<div id="respond" class="comment-respond">
			<h3 id="reply-title" class="comment-reply-title">
				Leave a Reply 
				<small>
				<a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a>
				</small>
			</h3>
			<?php
				if(isset($_SESSION['username'])){
					echo "			<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."'  method='GET' id='commentform' class='comment-form'>
			<input type='hidden' name='page' value='3'/>
			<input type='hidden' name='movie' value='".$_REQUEST['movie']."'/>
				<p class='comment-form-comment'>
					<textarea id='comment' class='comment-form__field' name='replycomment' placeholder='your comment.. *' cols='45' rows='8' aria-required='true' required='required'></textarea>
				</p>
				<p class='form-submit'><input name='submitreply' type='submit' id='submit' class='submit' value='Submit Comment'>
				</p>
			</form>";
				}else{
					echo "<div class='loogininfo'>You have to login to comment.</div>";
				}
			?>
			
		</div> 					
	</div>
					<?php
						include("aside.php");
					?>
				</div>
			</div>
		</div>