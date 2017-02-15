<?php 
	$konekcija = mysql_connect('localhost', 'root', '');
	$database = mysql_select_db('moviesdatabase') or die( "Database in unavailable!"); 
	
	if (!$konekcija) {
		die('Database connection has timed out! '.mysql_error());
	}
?>