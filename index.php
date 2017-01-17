<?php
	session_start(); 
?> 
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Movies database</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="The Free Movie Database is a free web service to obtain movie information."/>
		<meta name="keywords" content=""/>
		<meta name="author" content="Milos Medic"/>
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="src/css/main.css"/> 	 	
		<link rel="stylesheet" type="text/css" href="src/css/slider.css"/> 	 	
		<script src='src/js/jquery-3.1.1.min.js'></script>
		<script src='src/js/main.js'></script> 
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body>
		<?php
			include("header.php");

				if(isset($_REQUEST['page'])){ 
					$page=$_REQUEST['page'];
				}else{
					$page=100;
				} 
				 
				switch($page){
					case "0": include("content.php");break;
					case "1": include("contact.php"); break; 
					case "2": include("author.php"); break;  
					case "3": include("movie.php"); break;  
					case "4": include("genre.php"); break;  
					default: include("content.php");break;
				}
			 

			include("footer.php");
		?>
	</body>
</html>