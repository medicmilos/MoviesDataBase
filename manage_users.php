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

				
				
				
		$koliko_po_strani = 5;
		if(@$_GET['skriveno']) {
			$skriveno = $_GET['skriveno'];
		}else {
			$skriveno = 0;
		}
		include ("konekcija.php");
		$upit2 = mysql_query("SELECT count(id_users) FROM users");
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
				$xyz="</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td width=\"50px\"><a class='naprednazad' href=\"index.php?page=6&skriveno=$desno\"> Forward</a>";
			}
			
			
		}elseif($desno >= $ukupno_zapisa){
			$xyz="</td><td><a href=\"index.php?page=6&skriveno=$levo\"  class='naprednazad' > Back </a></td><td></td><td></td><td></td><td></td><td></td><td></td><td width=\"50px\"> ";
		}else {
			$xyz="</td><td><a href=\"index.php?page=6&skriveno=$levo\" class='naprednazad' > Back </a></td><td></td><td></td><td></td><td></td><td></td><td></td><td width=\"50px\"><a href=\"index.php?page=6&skriveno=$desno\" class='naprednazad' > Forward </a>";
		}
			
		
		
		$upit = sprintf("SELECT * FROM users LIMIT %d OFFSET %d",$koliko_po_strani,$skriveno);
				include("konekcija.php");
				$rezultat = mysql_query($upit, $konekcija);  
				mysql_close($konekcija);
			echo("<div class='tableusers'>");
			echo("<table border='2.75' width='100%'><form>");
						echo $xyz;
			echo ("</td></tr>"); 
			echo("<tr><td>ID</td><td>Avatar</td><td>Username</td><td>Email</td><td>Role</td><td>Active</td><td hidden>db_id</td><td>Manage</td><td>Delete</td></tr>");
			$pom = 0;
			while($red = mysql_fetch_array($rezultat)){  
				$iduser = $red['id_users']; 
				$avatar = $red['image'];
				$username = $red['username'];
				$password = $red['password'];
				$email = $red['email'];
				$description = $red['description'];
				$usermod = $red['user_mod'];
				$active = $red['active'];
				$pom++;
				
				if($active=='1'){
					$active="Yes";
				}else{
					$active="No";
				}
				if($usermod=='1'){
					$usermod="Admin";
				}else{
					$usermod="User";
				}
				$maliavatar='';
				if($avatar == ''){ 
					$maliavatar = "<img src='assets/images/members/default.png' width='46' height='51'/>";   
				}else{ 
					$maliavatar = "<img src='assets/images/members/$avatar' width='46' height='51'/>";
				} 
				
				
				
				
				echo("<tr>
					<td>$pom</td>
					<td>$maliavatar</td>
					<td width='46'>$username</td>
					<td>$email</td>
					<td>$usermod</td>
					<td>$active</td>
					<td hidden>$iduser</td>
					<td id='xmark1'><a href='index.php?page=10&id=$iduser'>&#9997;</a></td>
					<td id='xmark2'><a href='index.php?page=6&delete=$iduser'>&#10006;</a></td>
				</tr>"); 
			}
			echo("</table></form>");
			echo("</div>");

		if(isset($_REQUEST['delete'])){
			$upit = sprintf("DELETE FROM users WHERE id_users=%d",$_REQUEST['delete']);
				include("konekcija.php");
				$rezultat = mysql_query($upit, $konekcija);  
				mysql_close($konekcija);
		}
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