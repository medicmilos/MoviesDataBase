<?php session_start();
	$username = $_REQUEST['username'];
	$token = $_REQUEST['token'];
	
	include('konekcija.php'); 
	$upit1 = sprintf("SELECT username, password FROM users WHERE username='%s' AND password='%s'",$username,$token);
	$rezultat2 = mysql_query($upit1, $konekcija);
	mysql_close($konekcija);
	
	if($rezultat2){
		include('konekcija.php');
		$upit = sprintf("UPDATE users SET active='1' WHERE username='%s'",$username);
		$rezultat = mysql_query($upit, $konekcija); 
		mysql_close($konekcija);
		
	}
	header("location:index.php?page=16&confirmmessage=<div class='success'> Registration was successful, you can login now!</div>");
?> 