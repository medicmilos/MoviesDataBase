			<div class="content"> 
			<div id="primary-content-wrap">
			<div id="primary-content">
				<div class="primary">
		<?php 
//postavljanje avatara za profil

	$medic = @$_REQUEST['pomocnapom'];
	if($medic == 'meda'){
		if(isset($_FILES['file']['tmp_name'])){ 
			$maxsize    = 2097152;
			$tipovi = array( 
				'image/jpeg',
				'image/jpg',
				'image/gif',
				'image/png'
			);
			
			if(($_FILES['file']['size'] >= $maxsize) || (!in_array($_FILES['file']['type'], $tipovi))){
				header("location:index.php?page=19&message= <div class='error'> Only JPG, JPEG, PNG, GIF image format, and 2mb max!</div>");
			}else{
				move_uploaded_file($_FILES['file']['tmp_name'],"assets/images/members/".$_FILES['file']['name']);
				$upit2 = "UPDATE users SET image = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'";
				include("konekcija.php");
				$rezultat = mysql_query($upit2, $konekcija); 
				mysql_close($konekcija);
			} 
		} 
	}
	
	
	if(isset($_REQUEST['usernamem'])){ 
		$upit = "SELECT * FROM users WHERE username = '".$_REQUEST['usernamem']."'";
			include("konekcija.php");
			$rezultat = mysql_query($upit, $konekcija);  
			mysql_close($konekcija);
		
	}else{
		$upit = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
			include("konekcija.php");
			$rezultat = mysql_query($upit, $konekcija);  
			mysql_close($konekcija); 
	}

	$username = '';
	$time2 = '';
	$maliavatar = '';
	$slika = ''; 
	while($red = mysql_fetch_array($rezultat)){
		$slika .= $red['image'];  
		$time2 = $red['time']; 
		
	} 
	$time2 = strtotime($time2);
	$time2 = date('M d, Y', $time2);
	
	if($slika == ''){ 
		$maliavatar = "<img src='assets/images/members/default.png' width='145px' height='155px' alt='default_img' >";   
	}else{ 
		$maliavatar = "<img src='assets/images/members/$slika' width='145px' height='155px' alt='default_img' >";
	} 
//deskripcija korisnika

	if(isset($_REQUEST['btnSaveDesc'])){
		$deskripcija = ($_REQUEST['taEditProfile']);
		
		$upit = "UPDATE users SET description = '".$deskripcija."' WHERE username = '".$_SESSION['username']."'";
			include("konekcija.php");
			$rezultat = mysql_query($upit, $konekcija);  
			mysql_close($konekcija); 
	}
	
	
	if(isset($_REQUEST['usernamem'])){  
			$upit2 = "SELECT * FROM users WHERE username = '".$_REQUEST['usernamem']."'";
			include("konekcija.php");
			$rezultat = mysql_query($upit2, $konekcija);  
			mysql_close($konekcija);
		
	}else{
		$upit2 = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
			include("konekcija.php");
			$rezultat = mysql_query($upit2, $konekcija);  
			mysql_close($konekcija); 
	}
	
		$descript = '';
		while($red = mysql_fetch_array($rezultat)){
			$descript = $red['description']; 
			if($descript == ''){
				$descript = "This user did not update his description yet.";
			}else{
				$descript;
			}
		}
		

	
	
	
	
?>

 
		
				<?php  
					include("user.php"); 
				?>
				</div>
				<?php
					include("aside.php");
				?>
			</div>
		</div>
		</div>