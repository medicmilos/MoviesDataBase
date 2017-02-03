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
			@$question = ($_REQUEST['taEditEmail']);
			@$comment = ($_REQUEST['taEditPass']);  
			@$active = ($_REQUEST['rbEditMod']);  
			
			$upit = sprintf("UPDATE poll SET question = '%s', active=%d WHERE id_poll = %d",$question,$active,$_REQUEST['id']);
				include("konekcija.php");
				$rezultat = mysql_query($upit, $konekcija);  
				mysql_close($konekcija); 
			//header("location:index.php?page=6&id=".$_SESSION['pom33'].""); 
		}


	$upit = sprintf("SELECT * FROM poll WHERE id_poll=%d",$_REQUEST['id']);
			include("konekcija.php");
			$rezultat = mysql_query($upit, $konekcija);  
			mysql_close($konekcija);
		
		 
		$pom = 0;
		echo("<form action='index.php?page=15' method='GET'>");
		
		$iduser = '';
		$idcomment = ''; 
			$question = '';
		while($red = mysql_fetch_array($rezultat)){  
			$idcomment = $red['id_poll']; 
			$question = $red['question'];  
			$usermod = $red['active'];  

			
			$usermod1='';
			$usermod2='';  
			if($usermod=='1'){
				$usermod1="checked";
			}else{
				$usermod2="checked";
			}
			
		}	 

	echo("<input type='hidden' name='id' value='$idcomment' />");
	
	
			$pom++;
			echo("
			
			<div id='user-content2' class='posts-content posts-content22 posts-content33'>
				<table border='1'>
					<input type='hidden' name='page' value='15' />
					<tr><td><b>Question:</b></td><td><span class='editmail'><input type='hidden' name='taEditEmail' value='$question' /><span class='email1'>$question</span></span></td></tr>
					<tr>
						<td rowspan=3><b>Active:</b></td> 
					</tr> 
					<tr>
					<td> 
					
					<span class='editmod'>
					<input type='hidden' name='taEditMod' value='$usermod' />
					<input type='radio' name='rbEditMod' value='1' $usermod1 /> Yes<br/>
					<input type='radio' name='rbEditMod' value='0' $usermod2 /> No
					</span>
					 
					</td></tr><tr></tr>    
					<tr><td class='save22' colspan='2'><b>  <input type='submit' class='save2' value='Update' name='btnSaveUprofile'>  </b></td></tr>
				</table>
			</div> 	
				
				
			"); 
		
		
		 echo("</form>");
		
		
		
}	
	?>

				
				</div>
				<?php
					include("aside.php");
				?>
			</div>
		</div>
		</div>