<?php 
	if(isset($_REQUEST['btnRegister2'])) {
		$email = trim($_REQUEST['tbEmail2']); 
		$username = trim($_REQUEST['tbUsername2']); 
		$password = trim($_REQUEST['tbPassword2']);
		$password2 = trim($_REQUEST['tbPassword22']);
		$gender = $_REQUEST['rbGender'];
		
		$remail = "/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/"; 
		$rusername = "/^[\w\s\/\.\_\d]{4,20}$/"; 
		$rpassword = "/^[\w\s\/\.\_\d]{4,}$/";
		$greske = array(); 
		 $g=0; 
		
		if(!preg_match($remail, $email)){
			 $g++;
		}
		if(!preg_match($rusername, $username)){
			 $g++;
		} 
		if(!preg_match($rpassword, $password)){
			 $g++;
		}
		if(!(preg_match($rpassword, $password2) && $password==$password2)){ 
			 $g++;
		} 
		if(empty($gender)){
			 $g++;
		}  
		
		
		
		
		
		
		if($g==0){ 
			$password = md5($password); 
			$upit = sprintf("SELECT * FROM users WHERE email='%s' OR username = '%s' ",$email,$username);
			include("konekcija.php");
			$rezultat = mysql_query($upit, $konekcija);
			mysql_close($konekcija);
			if(mysql_num_rows($rezultat) == 0){
				$upit = sprintf("INSERT INTO users (id_users, username, password, email, gende, user_mod, active) VALUES (NULL, '%s', '%s', '%s', '%s', %d, %d)",$username,$password,$email,$gender,2,0);
				include("konekcija.php");
				$rezultat = mysql_query($upit, $konekcija);  
				mysql_close($konekcija);
				
				if(!$rezultat){ 
					header("location:index.php?page=16&message=Error: " . mysql_error()); 
				}else {  
					$ver_code = "http://movies.milosmedic.com/confirm.php?username=".$username."&token=".$password."";  
					$to = $email;
					$subject = 'Verification link | Movies Database'; 
					
					$message = "<html><body>"; 
					$message .= "<table ><tr><td></td><td width='600' style='display: block !important;max-width: 600px !important; margin: 0 auto !important;  clear: both !important; margin: 0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box;font-size: 14px;'><div><table style=' background-color: #fff;border: 1px solid #e9e9e9;border-radius: 3px;' width='100%' cellpadding='0' cellspacing='0'><tr><td style='padding: 20px;'><table width='100%' cellpadding='0' cellspacing='0'><tr><td style='padding: 0 0 20px;'>Please confirm your email address by clicking the link below.</td></tr><tr><td style='padding: 0 0 20px;'>We may need to send you information about our service and it is important that we have an accurate email address.</td></tr><tr><td style='padding: 0 0 20px;'><a href='".$ver_code."' style='text-decoration: none;color: #FFF; background-color: #348eda; border: solid #348eda; border-width: 10px 20px;line-height: 2em;  font-weight: bold;  text-align: center; cursor: pointer; display: inline-block; border-radius: 5px;text-transform: capitalize;'>Confirm email address</a></td></tr><tr><td style='padding: 0 0 20px;'>&mdash; The Movies Database Team</td></tr></table></td></tr></table></div></td><td></td></tr></table>";
					$message .= "</body></html>";
					  
					$headers = "From: Movies Database\r\n"; 
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			 
					if (mail($to, $subject, $message, $headers)) {     
						echo("<div class='infoo'>Confirm your email adress!!</div>");
					}else {  
						echo("<div id='erori'>Registration failed!</div>");
					}
				} 
			}else {
				echo("<div id='erori'>User with that email or username is registered, <br/>try with another email or username!</div>");
			}
		}else{
			 $greske[]="That email or username is in use";
		}
	}
?>			
			
			
			<div class="content"> 
			<div id="primary-content-wrap">
			<div id="primary-content">
				<div class="primary">
				<div id="sadrzaj">
					<div id='registerpage'>
						<h2>Register now (it's free) </h2><br/>  
						<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='GET' onSubmit='return check();'>
							<input type='hidden' name='page' value='16'/>
							<input type='text' name='tbUsername2' id='tbUsername2' value='<?php echo @$_REQUEST['tbUsername2']; ?>' placeholder='username' onBlur="reg1();" /><br/>
							<span id='userS' class='greskeR'></span><br/>
							<input type='text' name='tbEmail2' id='tbEmail2' value='<?php echo @$_REQUEST['tbEmail2']; ?>' placeholder='email' onBlur="reg2();" /><br/>
							<span id='emailS' class='greskeR'></span><br/> 
							<input type='password' name='tbPassword2' id='tbPassword2' value='<?php echo @$_REQUEST['tbPassword2']; ?>' placeholder='password' onBlur="reg3();" /><br/>
							<span id='passS' class='greskeR'></span><br/>
							<input type='password' name='tbPassword22' id='tbPassword22' value='<?php echo @$_REQUEST['tbPassword22']; ?>' placeholder='re-password' onBlur="reg4();" /><br/>
							<span id='passS2' class='greskeR'></span><br/>
							<input type='radio' name='rbGender' id='rbGenderM' value='M' checked/> <label class='genders'>Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
							<input type='radio' name='rbGender' id='rbGenderR' value='F' /> <label class='genders'>Female</label><br/>
							<span id='genderS' class='greskeR'></span><br/>
							<input type='submit' name='btnRegister2' id='btnRegister2' value='Register'/><br/><br/>
						</form>
					</div>
				</div>
				</div>
				<?php
					include("aside.php");
				?>					<?php
						include("aside2.php");
					?>
			</div>
		</div>
		</div>


