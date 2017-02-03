			<div class="content"> 
			<div id="primary-content-wrap">
			<div id="primary-content">
				<div class="primary"> 
				<div id="galerija">  
					<?php 
						// PAGINACIJA ///
								include('konekcija.php');
								$sql=mysql_query("SELECT * FROM movies",$konekcija);
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
								
								$items_per_page=12; 
								
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
									$center_pages.="&nbsp; <a href='index.php?page=18&pn=$add1'>$add1</a> &nbsp;"; //i opciju da doda jos jednu stranicu
								}
								else if($pn == $last_page) //ako je na poslednjoj strani
								{
									$center_pages.="&nbsp; <a href='index.php?page=18&pn=$sub1'>$sub1</a> &nbsp;"; //prikazemo opciju za jednu manje
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;"; //i stranicu gde se sad nalazi
								}
								else if($pn > 2 && $pn < ($last_page-1))
								{
									$center_pages.="&nbsp; <a href='index.php?page=18&pn=$sub2'>$sub2</a> &nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=18&pn=$sub1'>$sub1</a> &nbsp;";
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=18&pn=$add1'>$add1</a> &nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=18&pn=$add2'>$add2</a> &nbsp;";
								}
								else if($pn > 1 && $pn < $last_page)
								{
									$center_pages.="&nbsp; <a href='index.php?page=18&pn=$sub1'>$sub1</a> &nbsp;";
									$center_pages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
									$center_pages.="&nbsp; <a href='index.php?page=18&pn=$add1'>$add1</a> &nbsp;";
								} 		 
								
								$pagination_display=''; 
								
								if($last_page != "1") //ako ima vise od jedne strane, ako nema nista od ovoga se nece prikazati
								{
									//$pagination_display.="Page <strong>$pn</strong> of $last_page"; //prikaze stranu gde se nalazimo od kolikog broja strana
									
									if($pn != 1) //ako nismo na prvoj strani
									{
										$previous=$pn - 1;
										$pagination_display.="&nbsp; <a href='index.php?page=18&pn=$previous' class='nazad'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a>";
									}
									
									$pagination_display.="<span class='pagination_numbers'>$center_pages<span>";
									
									if($pn != $last_page) //ako nismo na zadnjoj strani
									{ 
										$next_page=$pn+1; 
										$pagination_display.="&nbsp; <a href='index.php?page=18&pn=$next_page' class='napred'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a>"; 
									}
								}	
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						include("konekcija.php");
						$pom=($pn-1)*$items_per_page;
						$upit = sprintf("SELECT * FROM movies LIMIT %d,$items_per_page",$pom);
						$rezultat = mysql_query($upit, $konekcija);
						mysql_close($konekcija);
						
						if(mysql_num_rows($rezultat) == 0){
							echo "We don't have movies, so galley is empty!";
						}else{ 
							echo "<div class='red_slika'>";
							while($red = mysql_fetch_array($rezultat)){
								$image = $red['poster'];
								$title = $red['title'];
								$username = $red['title'];
								
								if($image == ''){ 
									$image= "default.png";   
								}else{ 
									$image = $image;
								} 
									echo "<div class='img2'>";
										echo "<a  class='example-image-link'  data-lightbox='example-set' data-title='$username' href='assets/images/".$image."'>";
										echo "<img class='example-image' src='assets/images/".$image."' alt='".$title."'/></a>"; 
										if(strlen($username)>16){
											$prvideo=substr($username, 0, 16); 
											echo "<div class='descr2'>".$prvideo."...</div></div>";
										}else{
											echo "<div class='descr2'>".$username."</div></div>";
										} 
							}
							echo "<div class='cisti'></div></div>"; 
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