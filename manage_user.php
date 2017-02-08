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
if(isset($_SESSION['user_mod'])==1){
if(isset($_REQUEST['btnSaveUprofile'])){
			@$email2 = ($_REQUEST['taEditEmail']);
			@$pass2 = ($_REQUEST['taEditPass']);
			@$desc2 = ($_REQUEST['taEditDesc']);
			@$mod2 = ($_REQUEST['rbEditMod']);
			@$active2 = ($_REQUEST['rbEditActive']);
			
			$upit = sprintf("UPDATE users SET email = '%s', password = '%s', description = '%s', user_mod = %d, active = %d WHERE id_users = %d",$email2,$pass2,$desc2,$mod2,$active2,$_REQUEST['id']);
				include("konekcija.php");
				$rezultat = mysql_query($upit, $konekcija);  
				mysql_close($konekcija); 
			//header("location:index.php?page=6&id=".$_SESSION['pom33'].""); 
		}




	$upit = sprintf("SELECT * FROM users WHERE id_users=%d",$_REQUEST['id']);
			include("konekcija.php");
			$rezultat = mysql_query($upit, $konekcija);  
			mysql_close($konekcija);
		
		 
		$pom = 0;
		echo("<form action='index.php?page=10' method='GET'>");
		
		$iduser = '';
		while($red = mysql_fetch_array($rezultat)){  
			$iduser = $red['id_users'];
			$avatar = $red['image'];
			$username = $red['username'];
			$password = $red['password'];
			$email = $red['email'];
			$description = $red['description'];
			$usermod = $red['user_mod'];
			$active = $red['active'];
			
			
			$maliavatar='';
				if($avatar == ''){ 
					$maliavatar = "<img src='assets/images/members/default.png' width='155' height='165'/>";   
				}else{ 
					$maliavatar = "<img src='assets/images/members/$avatar' width='155' height='165'/>";
				}
			
			
			$usermod1='';
			$usermod2='';
			$useractive1='';
			$useractive2='';
			if($active=='1'){
				$useractive1="checked";
			}else{
				$useractive2="checked";
			}
			if($usermod=='1'){
				$usermod1="checked";
			}else{
				$usermod2="checked";
			}
	echo("<input type='hidden' name='id' value='$iduser' />");
	
	
			$pom++;
			echo("
			
				<div id='user-content'>
					<div>$maliavatar</div><br/>
					<h3>$username<h3>
					
				</div><br/>
				
			<div id='user-content2'>
			<table border='1'>
			<input type='hidden' name='page' value='10' />
				<tr><td><b>Email:</b></td><td><span class='editmail'><input type='hidden' name='taEditEmail' value='$email' /><span class='email1'>$email</span></span></td></tr>
				<tr><td><b>Password:</b></td><td><span class='editpass'><input type='hidden' name='taEditPass' value='$password' /><span class='editpass1'>$password</span></span></td></tr>
				<tr><td><b>Description:</b></td><td><span class='editdesc'><input type='hidden' name='taEditDesc' value='$description' /><span class='editdesc1'>$description</span></span></td></tr>
				<tr><td><b>Role:</b></td><td><span class='editmod'><input type='hidden' name='taEditMod' value='$usermod' /><input type='radio' name='rbEditMod' value='1' $usermod1 /> Admin<br/><input type='radio' name='rbEditMod' value='2' $usermod2 /> User</span></td></tr>
				<tr><td><b>Active:</b></td><td><span class='editactive'><input type='hidden' name='taEditActive' value='$active' /><input type='radio' name='rbEditActive' value='1' $useractive1 /> Yes<br/><input type='radio' name='rbEditActive' value='0' $useractive2 /> No</span></td></tr>
				<tr><td class='save22' colspan='2'><b>  <input type='submit' class='save2' value='Update' name='btnSaveUprofile'>  </b></td></tr>
			</table>
			</div> 	
				
				
			"); 
		}
		
		 echo("</form>");
}
				?>
				</div>
				<?php
					include("aside.php");
				?>					<?php
						include("aside2.php");
					?>
			</div>
		</div>
		</div>