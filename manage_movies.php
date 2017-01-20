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
	
	if(isset($_REQUEST['delete'])){
			$upit = "DELETE FROM movies WHERE id_movies='".$_REQUEST['delete']."'";
				include("konekcija.php");
				$rezultat = mysql_query($upit, $konekcija);  
				mysql_close($konekcija);
		}
	
	
		$koliko_po_strani = 5;
		if(@$_GET['skriveno']) {
			$skriveno = $_GET['skriveno'];
		}else {
			$skriveno = 0;
		}
		include ("konekcija.php");
		$upit2 = mysql_query("SELECT count(id_movies) FROM movies");
		$niz = mysql_fetch_array($upit2);
		$ukupno_zapisa = $niz[0];
		$levo = $skriveno - $koliko_po_strani;
		$desno = $skriveno + $koliko_po_strani;
		// Zaglavlje tabele sa navigacijom
		echo ("<tr><td width=\"50px\">");
		$xyz="";
		if($levo<0){
			
			
			
			if(($ukupno_zapisa-$skriveno)<=$koliko_po_strani){
				$xyz="</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td width=\"50px\">";
			}else{
				$xyz="</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td width=\"50px\"><a class='naprednazad' href=\"index.php?page=7&skriveno=$desno\"> Forward</a>";
			}
			
			
		}elseif($desno >= $ukupno_zapisa){
			$xyz="</td><td><a href=\"index.php?page=7&skriveno=$levo\"  class='naprednazad' > Back </a></td><td></td><td></td><td></td><td></td><td></td><td></td><td width=\"50px\"> ";
		}else {
			$xyz="</td><td><a href=\"index.php?page=7&skriveno=$levo\" class='naprednazad' > Back </a></td><td></td><td></td><td></td><td></td><td></td><td></td><td width=\"50px\"><a href=\"index.php?page=7&skriveno=$desno\" class='naprednazad' > Forward </a>";
		}
			
		
			echo ("<div class='adduser save2'><a href='index.php?page=12'>Add new movie</a></div>");		
		$upit = "SELECT * FROM movies LIMIT $koliko_po_strani OFFSET $skriveno";
				include("konekcija.php");
				$rezultat = mysql_query($upit, $konekcija);  
				mysql_close($konekcija);
			echo("<div class='tableusers tableposts'>");
			echo("<table border='2.75' width='100%'><form>");
			echo $xyz;
			echo ("</td></tr>"); 
			echo("<tr><td>ID</td><td>Title</td><td>Genre</td><td>Year</td><td>Director</td><td>Description</td><td hidden>db_id</td><td>Manage</td><td>Delete</td></tr>");
			$pom = 0;
			while($red = mysql_fetch_array($rezultat)){  
				$idpost = $red['id_movies']; 
				$title = $red['title']; 
				$genre = $red['id_genre']; 
				$year = $red['release_year'];
				$description = $red['description'];
				$director = $red['id_director'];
				$pom++;
				
				 
				echo("<tr>
					<td>$pom</td>
					<td>$title</td>  
					<td>$genre</td>
					<td>$year</td>
					<td>$director</td>
					<td>$description</td>
					<td hidden>$idpost</td>
					<td id='xmark1'><a href='index.php?page=13&id=$idpost'>&#9997;</a></td>
					<td id='xmark2'><a href='index.php?page=12&delete=$idpost'>&#10006;</a></td>
				</tr>"); 
			}
			echo("</table></form>");
			echo("</div>");
		?>
				</div>
				<?php
					include("aside.php");
				?>
			</div>
		</div>
		</div>