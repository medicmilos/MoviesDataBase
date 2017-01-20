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

$rezultat1='';
if(isset($_REQUEST['btnSaveMovie'])) {
		$title = trim($_REQUEST['tbTitle']); 
		$id_genre = trim($_REQUEST['ddlGenre']); 
		$release_year = trim($_REQUEST['ddlYear']);
		$cast1 = trim($_REQUEST['tbCast1']); 
		$cast2 = trim($_REQUEST['tbCast2']); 
		$cast3 = trim($_REQUEST['tbCast3']); 
		$director = trim($_REQUEST['tbDirector']); 
		$description = trim($_REQUEST['taDescription']); 
		
		$rtitle = "/^[A-Z]{1}[a-z]{2,20}(\s[A-Za-z]{1,20}){1,5}$/"; 
		$rcast = "/^[A-Z]{1}[a-z]{2,15}(\s[A-Z]{1}[a-z]{2,15}){1,5}$/";
		$rdescription = "/^[A-za-z0-9]{1,}$/"; 
		
		$greske = array(); 
		 $g=0; 
		
		if(!preg_match($rtitle, $title)){
			 $g++;
			 $greske[]="Enter correct title!";
		}
		if($id_genre==0){
			 $g++;
			 $greske[]="Pick genre!";
		} 
		if($release_year==0){
			 $g++;
			 $greske[]="Pick year!";
		} 
		if(!preg_match($rcast, $cast1)){
			$g++;
			 $greske[]="Enter 1. casts!";
		} 
		if(!preg_match($rcast, $cast2)){
			$g++;
			 $greske[]="Enter 2. casts!";
		} 
		if(!preg_match($rcast, $cast3)){
			$g++;
			 $greske[]="Enter 3. casts!";
		} 
		if(!preg_match($rdescription, $description)){
			$g++;
			 $greske[]="Fill description!";
		}

		$upit = "SELECT id_director FROM director ORDER BY id_director ASC";
			include("konekcija.php");
			$rezultat = mysql_query($upit, $konekcija);  
			mysql_close($konekcija);
			
			$brojdirektora="";
			while($row = mysql_fetch_assoc($rezultat)){
			  $brojdirektora=$row['id_director'];
			}
			$brojdirektora++;
			
		if($g==0){
					$name = $_FILES['file']['name'];
					$temp_name = $_FILES['file']['tmp_name'];

					if (isset($name)) {

						if (!empty($name)) {
							$location = 'assets/images/';
						}

						if (move_uploaded_file($temp_name, $location.$name)) {
							$upit = "INSERT INTO movies (id_movies, title, id_genre, release_year, cast, id_director, description, poster, username) VALUES (NULL, '".$title."', '".$id_genre."', '".$release_year."', '".$cast1.", ".$cast2.", ".$cast3."', '".$brojdirektora."', '".$description."', '".$name."', '".$_SESSION['username']."')";
							$upit4 = "INSERT INTO director (id_director, name) VALUES (NULL,'".$director."')";
							include("konekcija.php");
							$rezultat = mysql_query($upit, $konekcija);
							$rezultat4 = mysql_query($upit4, $konekcija);
							
							mysql_close($konekcija);
							if($rezultat && $rezultat4){
								$rezultat1='Movie added to database.';
							}else{
								$rezultat1='Movie not added to database.';
							}
						}
					}
		}else{
			$arrlength = count($greske);
			for($i = 0; $i < $arrlength; $i++) {
				$rezultat1.= $greske[$i]."<br/>"; 
			}
		}
		 
		 
		 
		 
		 
		 
		 
		
	}
 

	echo ("<div class='userad'><form action='". $_SERVER['PHP_SELF'] ."' enctype='multipart/form-data' method='POST'><table border=1  width='50%'><input type='hidden' name='page' value='12' />");
	
	$upit2 = "SELECT * FROM genre";
		include("konekcija.php");
		$rezultat2 = mysql_query($upit2, $konekcija);  
		mysql_close($konekcija);
	echo ("<tr><td>Title: </td><td><input type='text' class='' name='tbTitle'/></td></tr><tr><td>Genre: </td><td><select name='ddlGenre'><option value='0'>choose..</option>"); 
	while($red = mysql_fetch_array($rezultat2)){  
		$id_genre=$red['id_genre'];
		$name=$red['name'];
		echo ("<option value='".$id_genre."'>".$name."</option>");
	}
	echo ("
		</select></td></tr>
		<tr><td>Release_year: </td><td>
		<select name='ddlYear'><option value='0'>choose..</option>");
	$currentYear = date('Y'); 
        foreach (range($currentYear, 1900) as $value) {
            echo "<option value='".$value."'>".$value."</option > ";
        }	
	echo ("</select>
		</td></tr>
		<tr><td>Cast: </td>
		<td>
		1.<input type='text' class=''   name='tbCast1'/><br/>
		2.<input type='text' class=''   name='tbCast2'/><br/>
		3.<input type='text' class=''   name='tbCast3'/>
		</td></tr>
		<tr><td>Director: </td><td><input type='text' name='tbDirector'/></td></tr>
		<tr><td>Description: </td><td><textarea name='taDescription'></textarea></tr>
		<tr><td>Poster: </td><td><input type='file' name='file'/></tr>
		<tr><td colspan=2><input type='submit' class='save2' value='Add movie' name='btnSaveMovie'></td></tr>
	 
	");

	echo ("</table></form><div class='bottomrez'><b>$rezultat1</b></div></div>");
	?>
				</div>
				<?php
					include("aside.php");
				?>
			</div>
		</div>
		</div>