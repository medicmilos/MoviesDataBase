<?php 
	if(isset($_REQUEST['btnLogin'])) { 
        $username = trim($_REQUEST['tbUsername']);
        $password = trim($_REQUEST['tbPassword']);
 
        $username = addslashes($username);
        $password = addslashes($password);
 
        $password = md5($password);
		if(!($username == '' || $password == '')){
			$upit = "SELECT * FROM users WHERE username='$username' AND active=1 LIMIT 1";
			include("konekcija.php");	
			$rezultat = mysql_query($upit, $konekcija);
			mysql_close($konekcija); 

			$id = '';
			$db_password = '';
			while($red = mysql_fetch_array($rezultat)){
				$id = $red['id_users'];
				$db_password = stripslashes($red['password']);	
				$db_username = stripslashes($red['username']);	
				$db_role = $red['user_mod'];	
				$db_active = $red['active'];	
			}
			if(($username == $db_username) && $db_active=='0') {
					$_SESSION['username'] = $username;
					$_SESSION['id_users'] = $id;
					$_SESSION['user_mod'] = $db_role;
					header("location:index.php?<div class='info'> Please confirm your email adress!</div>");
			}else{
				if($password == $db_password) {
					$_SESSION['username'] = $username;
					$_SESSION['id_users'] = $id;
					$_SESSION['user_mod'] = $db_role;
					header("location:index.php?<div class='success'> Welcome back ".$_SESSION['username']."!</div>");
				} else { 
					header("location:index.php?<div class='error'> Login failed!</div>");
				}
			}
			
		}else{
			header("location:index.php?<div class='error'> Login failed!</div>");
		}
	}
	
	
	
	
	
	
	
	/*$upit = "SELECT * FROM users WHERE username = '".@$_SESSION['username']."'";
		include("konekcija.php");
		$rezultat = mysql_query($upit, $konekcija);  
		mysql_close($konekcija);
		//header("Location: $_SERVER[PHP_SELF]");
		
		$maliavatar2 = '';
		$slika = ''; 
		while($red = mysql_fetch_array($rezultat)){
			$slika .= $red['image']; 
		}  
		
		if($slika == ''){ 
			$maliavatar2 = "<a href='index.php?page=4'><img src='images/members/default.png' width='55px' height='55px' alt='default_img' id='firstavatar' /></a>";   
		}else{
			$maliavatar2 = "<a href='index.php?page=4'><img src='images/members/$slika' width='55px' height='55px' alt='default_img' id='firstavatar' /></a>";
		} */
		
		if(!isset($_SESSION['id_users'])){
			echo (
				"<div class='header-middle-form'>
						<ul>
							<li id='login' class='login-page'>
								<a id='login-trigger' href='#'>
									Log in <span>▼</span>
								</a>
								<div id='login-content' class='form'>
									<form class='login-form' action='". $_SERVER['PHP_SELF'] ."' method='GET' id='loginforma' name='loginforma'>
										<input type='text' id='tbUsername' name='tbUsername' placeholder='username'/>
										<input type='password' id='tbPassword' name='tbPassword' placeholder='password'/>
										<input type='submit' id='btnLogin' name='btnLogin' value='Login'/> 
										<p class='message'>Not registered? <a href='index.php?page=16'>Create an account</a></p>
									</form>
								</div>                     
							</li> 
						</ul>
					</div>"
			);
		}else{
			echo (
				"<div class='header-middle-form'>
						<ul>
							<li id='login' class='login-page'>
								<a id='login-trigger' href='#'>
									".$_SESSION['username']." <span>▼</span>
								</a>
								<div id='login-content' class='form'>
									<span class='logout'><a href='logout.php'>LOGOUT</a></span>
								</div>                     
							</li> 
						</ul>
					</div>");
		} 
?>
					