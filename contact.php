<?php
	if(isset($_GET["btnSubmit"])){
		$url="https://www.google.com/recaptcha/api/siteverify"; 
		$privatekey="6LcqyhEUAAAAAKwrduKmns7crMk7MCIJJQiRiWEa";

		$client_captcha_response = $_GET['g-recaptcha-response'];
		$user_ip = $_SERVER['REMOTE_ADDR'];

		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$privatekey&response=$client_captcha_response&remoteip=$user_ip");
		$data = json_decode($response);

		if($data->success===true){
			header("Location:contact?CaptchaPass=True");
		}else{
			header("Location:contact?CaptchaFailed=True");
		}

		$name = trim($_REQUEST['name']); 
		$mail = trim($_REQUEST['email']); 
		$message = trim($_REQUEST['message']); 
		
		$rname = "/^[\w\s\/\.\_\d]{2,28}$/";
		$rmail = "/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/"; 
		
		$greske = array(); 
		 $g=0; 
		
		if(!preg_match($rname, $name)){
			$g++;
			echo("n");
		}
		if(!preg_match($rmail, $mail)){
			$g++;
			echo("e");
		}   
		if($message==""){
			$g++;
			echo("m");
		}  
		
		if($g==0){ 		
			$name = trim($_REQUEST['name']); 
			$mail = trim($_REQUEST['email']); 
			$message = trim($_REQUEST['message']);
			$headers =  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'From:'.$name.' <'.$mail.'>' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
				
			$to = "milos.medic.pvt@gmail.com";
			$subject = 'Contact form'; 
			$message = '<!DOCTYPE html><html><head><style type="text/css">.table-fill{background:#fff;border-radius:3px;border-collapse:collapse;height:320px;margin:auto;max-width:600px;padding:5px;width:100%;box-shadow:0 5px 10px rgba(0,0,0,0.1);animation:float 5s infinite}th{color:#D5DDE5;background:#1b1e24;border-bottom:4px solid #9ea7af;border-right:1px solid #343a45;font-size:23px;font-weight:100;padding:24px;text-align:left;text-shadow:0 1px 1px rgba(0,0,0,0.1);vertical-align:middle}th:first-child{border-top-left-radius:3px}th:last-child{border-top-right-radius:3px;border-right:none}tr{border-top:1px solid #C1C3D1;border-bottom-:1px solid #C1C3D1;color:#666B85;font-size:16px;font-weight:400;text-shadow:0 1px 1px rgba(256,256,256,0.1)}tr:hover td{background:#4E5066;color:#FFF;border-top:1px solid #22262e;border-bottom:1px solid #22262e}tr:first-child{border-top:none}tr:last-child{border-bottom:none}tr:nth-child(odd) td{background:#EBEBEB}tr:nth-child(odd):hover td{background:#4E5066}tr:last-child td:first-child{border-bottom-left-radius:3px}tr:last-child td:last-child{border-bottom-right-radius:3px}td{background:#FFF;padding:20px;text-align:left;vertical-align:middle;font-weight:300;font-size:18px;text-shadow:-1px -1px 1px rgba(0,0,0,0.1);border-right:1px solid #C1C3D1}td:last-child{border-right:0}th.text-left{text-align:left}th.text-center{text-align:center}th.text-right{text-align:right}td.text-left{text-align:left}td.text-center{text-align:center}td.text-right{text-align:right}</style></head><body><table class="table-fill"><thead><tr><th class="text-left">Name</th><th class="text-left">Email</th><th class="text-left">Message</th></tr></thead><tbody class="table-hover"><tr><td class="text-left">'.$name.'</td><td class="text-left">'.$mail.'</td><td class="text-left">'.$message.'</td></tr></tbody></table></body></html>';
				
			if (mail($to, $subject, $message, $headers)) {   
				header("Location:contact?MailPass=True");
			}else { 
				header("Location:contact?MailFailed=True");
			}
		}	
	}
?>

			<div class="content"> 
			<div id="primary-content-wrap">
			<div id="primary-content">
				<div class="primary">
					<form class="" action='<?php echo $_SERVER['PHP_SELF']; ?>' method="GET" name="ContactForm" id="ContactForm" onSubmit='return check2();'>
						<input type="hidden" name="page" value="1" />
						<?php 
							if(isset($_GET["CaptchaPass"])){
								echo "<div>Message Sent</div>";
							}
						?>
						<?php 
							if(isset($_GET["CaptchaFail"])){
								echo "<div>Captcha Failed</div>";
							} 
							if(isset($_GET["MailFail"])){
								echo "<div>Mail not sent.</div>";
							}
						?>
						<ul class="list-unstyled">
							<div id="div-name" class="form-group has-feedback">
								<li>
									<label for="contact-name" class="control-label">Your name:</label>
									<input type="text" class="form-control" name="name" id="contact-name" placeholder="eg. John Smith" value="" onBlur="namecheck();"/>
									<span id="span-name" class="" aria-hidden="true"></span>
								</li>
							</div>
							<div id="div-email" class="form-group has-feedback">
								<li>
									<label for="contact-email" class="control-label">Your email:</label>
									<input type="text" class="form-control" name="email" id="contact-email" placeholder="eg. example@gmail.com" value="" onBlur="emailcheck();"/>
									<span id="span-email" class="" aria-hidden="true"></span>
								</li>
							</div>
							<div id="div-message" class="form-group has-feedback">
								<li>
									<label for="contact-message" class="control-label">Message</label>
									<textarea class="form-control" name="message" id="contact-message" rows="10" onBlur="messagecheck();"></textarea>
									<span id="span-message" class="" aria-hidden="true"></span>
								</li>
							</div>
							<div id="div-captcha" class="form-group has-feedback">
								<li>
									<div class="g-recaptcha" data-sitekey="6LcqyhEUAAAAANEWtmGKvZJnxMB7BQdDChhWcgZA"></div>
								</li>
							</div>
							<div class="form-group">
								<li>
									<button class="btn btn-default" type="submit" name="btnSubmit">Send</button>
								</li>
							</div>
						</ul>
					</form>
				</div>
				<?php
					include("aside.php");
				?>
			</div>
		</div>
		</div>


