$(document).ready(function(){
	//login
	$('#login-content').hide();
	$('#login-trigger').click(function(){
		$(this).next('#login-content').slideToggle();
		$(this).toggleClass('active');          
		
		if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
			else $(this).find('span').html('&#x25BC;')
    })
	/*SLAJDER*/
	 var $slider = $(".slider"),
      $slideBGs = $(".slide__bg"),
      diff = 0,
      curSlide = 0,
      numOfSlides = $(".slide").length-1,
      animating = false,
      animTime = 500,
      autoSlideTimeout,
      autoSlideDelay = 3000,
      $pagination = $(".slider-pagi");
  
  function createBullets() {
    for (var i = 0; i < numOfSlides+1; i++) {
      var $li = $("<li class='sp-button'></li>");
      $li.addClass("slider-pagi__elem-"+i).data("page", i);
      if (!i) $li.addClass(" sp-selected-button");
      $pagination.append($li);
    }
  };
  
  createBullets();
  
  function manageControls() {
    $(".slider-control").removeClass("inactive");
    if (!curSlide) $(".slider-control.left").addClass("inactive");
    if (curSlide === numOfSlides) $(".slider-control.right").addClass("inactive");
  };
  
  function autoSlide() {
    autoSlideTimeout = setTimeout(function() {
      curSlide++;
      if (curSlide > numOfSlides) curSlide = 0;
      changeSlides();
    }, autoSlideDelay);
  };
  
  autoSlide();
  
  function changeSlides(instant) {
    if (!instant) {
      animating = true;
      manageControls();
      $slider.addClass("animating");
      $slider.css("top");
      $(".slide").removeClass("active");
      $(".slide-"+curSlide).addClass("active");
      setTimeout(function() {
        $slider.removeClass("animating");
        animating = false;
      }, animTime);
    }
    window.clearTimeout(autoSlideTimeout);
    $(".slider-pagi__elem").removeClass("active");
    $(".slider-pagi__elem-"+curSlide).addClass("active");
    $slider.css("transform", "translate3d("+ -curSlide*100 +"%,0,0)");
    $slideBGs.css("transform", "translate3d("+ curSlide*50 +"%,0,0)");
    diff = 0;
    autoSlide();
  }

  function navigateLeft() {
    if (animating) return;
    if (curSlide > 0) curSlide--;
    changeSlides();
  }

  function navigateRight() {
    if (animating) return;
    if (curSlide < numOfSlides) curSlide++;
    changeSlides();
  }

  $(document).on("mousedown touchstart", ".slider", function(e) {
    if (animating) return;
    window.clearTimeout(autoSlideTimeout);
    var startX = e.pageX || e.originalEvent.touches[0].pageX,
        winW = $(window).width();
    diff = 0;
    
    $(document).on("mousemove touchmove", function(e) {
      var x = e.pageX || e.originalEvent.touches[0].pageX;
      diff = (startX - x) / winW * 70;
      if ((!curSlide && diff < 0) || (curSlide === numOfSlides && diff > 0)) diff /= 2;
      $slider.css("transform", "translate3d("+ (-curSlide*100 - diff) +"%,0,0)");
      $slideBGs.css("transform", "translate3d("+ (curSlide*50 + diff/2) +"%,0,0)");
    });
  });
  
  $(document).on("mouseup touchend", function(e) {
    $(document).off("mousemove touchmove");
    if (animating) return;
    if (!diff) {
      changeSlides(true);
      return;
    }
    if (diff > -8 && diff < 8) {
      changeSlides();
      return;
    }
    if (diff <= -8) {
      navigateLeft();
    }
    if (diff >= 8) {
      navigateRight();
    }
  });
  
  $(document).on("click", ".slider-control", function() {
    if ($(this).hasClass("left")) {
      navigateLeft();
    } else {
      navigateRight();
    }
  });
  
  $(document).on("click", ".slider-pagi__elem", function() {
    curSlide = $(this).data("page");
    changeSlides();
  });
  
/*ddmenu*/
    $('#submenu ul').css({
    display: "none"
  });
  
  $('#submenu').hover(function() {
    $(this).find('ul').stop(true, true).slideDown('fast');
	}, 
	function() {
    $(this).find('ul').stop(true,true).fadeOut('fast');
	});

	/*---------------------------editovanje usera u admin panelu----------------------*/	 
$('.editmail .email1').click(function(){
	$(this).parent().html(" <textarea id='taEditEmail' name='taEditEmail' class='form-control'>"+$(this).text()+"</textarea>");
	});	 
$('.editpass .editpass1').click(function(){
	$(this).parent().html("  <textarea id='taEditPass' name='taEditPass' class='form-control'>"+$(this).text()+"</textarea>");
	});		
$('.editdesc .editdesc1').click(function(){
	$(this).parent().html(" <textarea id='taEditDesc' name='taEditDesc' class='form-control'>"+$(this).text()+"</textarea> ");
	});		
  /*hover main filmova*/ 

  
/*status linija iznad hedera*/
	setTimeout(function(){ 
		$(".info, .success, .error").slideUp(500);
	}, 3000);
	/*---------------------------deskripcija korisnika koja se pojavljuje kad on zeli da je edituje----------------------*/	 
	$('#description .edit').click(function(){
	$(this).parent().html("<input type='hidden' name='page' value='19' /><textarea id='taEditProfile' name='taEditProfile' class='form-control'>"+$(this).text()+"</textarea><input type='submit' class='save' value='Save' name='btnSaveDesc'>");
	});	
	/*novo*/
});

/*CONTACT*/
function check2(){
	
	var username = document.getElementById("contact-name").value;
	var email = document.getElementById("contact-email").value; 
	var message = document.getElementById("contact-message").value;
	
	var nameS = document.getElementById("nameS");
	var mailS = document.getElementById("mailS");
	var messageS = document.getElementById("mesageS");
	
	var reg_user=/^[A-Z]{1}[a-z]{2,15}(\s[A-Z]{1}[a-z]{2,15}){1,5}$/;
	var reg_email=/^([a-z0-9_\.-]{3,50})@([a-z0-9]{2,20}.){1,5}[a-z]{2,8}$/;
	
	var greske=0; 
	
	if(!reg_user.test(username)){
		document.getElementById("div-name").className = "form-group has-feedback";
		document.getElementById("div-name").className += " has-error";
		document.getElementById("span-name").className = "";
		document.getElementById("span-name").className += "glyphicon glyphicon-remove form-control-feedback";
		greske++;
	}else{
		document.getElementById("div-name").className = "form-group has-feedback";
		document.getElementById("div-name").className += " has-success";
		document.getElementById("span-name").className = "";
		document.getElementById("span-name").className += "glyphicon glyphicon-ok form-control-feedback";
	}
	if(!reg_email.test(email)){
		document.getElementById("div-email").className = "form-group has-feedback";
		document.getElementById("div-email").className += " has-error";
		document.getElementById("span-email").className = "";
		document.getElementById("span-email").className += "glyphicon glyphicon-remove form-control-feedback";
		greske++;
	}else{
		document.getElementById("div-email").className = "form-group has-feedback";
		document.getElementById("div-email").className += " has-success";
		document.getElementById("span-email").className = "";
		document.getElementById("span-email").className += "glyphicon glyphicon-ok form-control-feedback";
	}
	if(message==""){
		document.getElementById("div-message").className = "form-group has-feedback";
		document.getElementById("div-message").className += " has-error";
		document.getElementById("span-message").className = "";
		document.getElementById("span-message").className += "glyphicon glyphicon-remove form-control-feedback";
	}else{
		document.getElementById("div-message").className = "form-group has-feedback";
		document.getElementById("div-message").className += " has-success";
		document.getElementById("span-message").className = "";
		document.getElementById("span-message").className += "glyphicon glyphicon-ok form-control-feedback";
	}
	 
	
	if(greske==0){
		return true;
	}else{
		return false;
	}
}
	function namecheck() {
		var username = document.getElementById("contact-name").value;
		var reg_user=/^[A-Z]{1}[a-z]{2,15}(\s[A-Z]{1}[a-z]{2,15}){1,5}$/;
		if(!reg_user.test(username)){
			document.getElementById("div-name").className = "form-group has-feedback";
			document.getElementById("div-name").className += " has-error";
			document.getElementById("span-name").className = "";
			document.getElementById("span-name").className += "glyphicon glyphicon-remove form-control-feedback";
		}else{
			document.getElementById("div-name").className = "form-group has-feedback";
			document.getElementById("div-name").className += " has-success";
			document.getElementById("span-name").className = "";
			document.getElementById("span-name").className += "glyphicon glyphicon-ok form-control-feedback";
		}
	} 
	function emailcheck() {
		var email = document.getElementById("contact-email").value;
		var reg_email=/^([a-z0-9_\.-]{3,50})@([a-z0-9]{2,20}.){1,5}[a-z]{2,8}$/;
		if(!reg_email.test(email)){
			document.getElementById("div-email").className = "form-group has-feedback";
			document.getElementById("div-email").className += " has-error";
			document.getElementById("span-email").className = "";
			document.getElementById("span-email").className += "glyphicon glyphicon-remove form-control-feedback";
		}else{
			document.getElementById("div-email").className = "form-group has-feedback";
			document.getElementById("div-email").className += " has-success";
			document.getElementById("span-email").className = "";
			document.getElementById("span-email").className += "glyphicon glyphicon-ok form-control-feedback";
		}
	}  
	function messagecheck() {
		var message = document.getElementById("contact-message").value;
		if(message==""){
			document.getElementById("div-message").className = "form-group has-feedback";
			document.getElementById("div-message").className += " has-error";
			document.getElementById("span-message").className = "";
			document.getElementById("span-message").className += "glyphicon glyphicon-remove form-control-feedback";
		}else{
			document.getElementById("div-message").className = "form-group has-feedback";
			document.getElementById("div-message").className += " has-success";
			document.getElementById("span-message").className = "";
			document.getElementById("span-message").className += "glyphicon glyphicon-ok form-control-feedback";
		}
	} 
////////////////////////////AJAX ANKETA//////////////
var http;
function ajaxprovera(){ 
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	http.open("GET","poll.php",true);
	http.send();
	http.onreadystatechange = write_poll; 
}
function write_poll(){
	if(http.readyState==4){
		document.getElementById("statistika2").innerHTML=http.responseText;
	}
	
}
function poll_vote(){
	if(window.XMLHttpRequest){
		http=new XMLHttpRequest();
	}else{
		http=new ActiveXObject("Microsoft.XMLHTTP");
	}
	http.open("GET","poll.php?submit_poll=obj&answers="+getanswer(),true);
	http.send();
	http.onreadystatechange = write_poll; 
	
	
}
function getanswer(){
	
	var n= parseInt(document.getElementById("numbofradio").value);
	var check=0;
	
	for(var i=1;i<n;i++){ 
		if(document.getElementById(""+i).checked){
			check = document.getElementById(""+i).value; 
		}
		
	}
	return check;
}
//provera registracije
function check(){
	
	var username = document.getElementById("tbUsername2").value;
	var email = document.getElementById("tbEmail2").value;
	var gender = document.getElementsByName("rbGender");
	var pass = document.getElementById("tbPassword2").value;
	var repass = document.getElementById("tbPassword22").value;
	
	var userS = document.getElementById("userS");
	var emailS = document.getElementById("emailS");
	var genderS = document.getElementById("genderS");
	var passS = document.getElementById("passS");
	var passS2 = document.getElementById("passS2");
	
	var reg_user=/^[\w\s\/\.\_\d]{4,20}$/;
	var reg_email=/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/;
	var reg_pass=/^[\w\s\/\.\_\d]{4,}$/;
	
	var greske=0; 
	
	if(!reg_user.test(username)){
		userS.innerHTML="Username must be at least 4 characters";
		userS.className ="greskeR2";
		document.getElementById("tbUsername2").style.border = "1px solid #a94442";
		greske++;
	}else{
		userS.innerHTML=""; 
		document.getElementById("tbUsername2").style.border = "none";
	}
	if(!reg_email.test(email)){
		emailS.innerHTML="Please enter valid email";
		emailS.className ="greskeR2";
		document.getElementById("tbEmail2").style.border = "1px solid #a94442";
		greske++;
	}else{
		emailS.innerHTML="";
		document.getElementById("tbEmail2").style.border = "none";
	}
	
	var choosen=""; 
	for(var i=0;i<gender.length;i++){
		if(gender[i].checked){ 
		choosen=gender[i].value; break;
		}
	}
	if(choosen==""){
		genderS.innerHTML="Please select gender ";
		genderS.className ="greskeR2"; 
		greske++;
	} else{
		genderS.innerHTML="";
	}
	if(!reg_pass.test(pass)) {
		passS.innerHTML="Password must be at least 4 characters";
		passS.className ="greskeR2";
		document.getElementById("tbPassword2").style.border = "1px solid #a94442";
		greske++;
	}else{
		passS.innerHTML="";
		document.getElementById("tbPassword2").style.border = "none";
	}
	if(reg_pass.test(repass) && pass==repass){
		passS2.innerHTML="";
		document.getElementById("tbPassword22").style.border = "none";
	}else{
		passS2.innerHTML="Passwords must match ";
		passS2.className ="greskeR2";
		document.getElementById("tbPassword22").style.border = "1px solid #a94442";
		greske++;
	}
	
	if(greske==0){
		return true;
	}else{
		return false;
	}
}
function reg1() {
		var username = document.getElementById("tbUsername2").value;
		var userS = document.getElementById("userS");
		var reg_user=/^[\w\s\/\.\_\d]{4,}$/;
		if(!reg_user.test(username)){
			userS.innerHTML="Username must be at least 4 characters";
			userS.className ="greskeR2";
			document.getElementById("tbUsername2").style.border = "1px solid #a94442"; 
		}else{
			userS.innerHTML=""; 
			document.getElementById("tbUsername2").style.border = "none";
		}
} 
function reg2() { 
		var email = document.getElementById("tbEmail2").value;
		var emailS = document.getElementById("emailS");
		var reg_email=/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/;
		if(!reg_email.test(email)){
			emailS.innerHTML="Please enter valid email";
			emailS.className ="greskeR2";
			document.getElementById("tbEmail2").style.border = "1px solid #a94442"; 
		}else{
			emailS.innerHTML="";
			document.getElementById("tbEmail2").style.border = "none";
		}
} 
function reg3() {
		var pass = document.getElementById("tbPassword2").value;
		var passS = document.getElementById("passS");
		var reg_pass=/^[\w\s\/\.\_\d]{4,}$/;
		if(!reg_pass.test(pass)) {
			passS.innerHTML="Password must be at least 4 characters";
			passS.className ="greskeR2";
			document.getElementById("tbPassword2").style.border = "1px solid #a94442"; 
		}else{
			passS.innerHTML="";
			document.getElementById("tbPassword2").style.border = "none";
		}
} 
function reg4() {  
		var pass = document.getElementById("tbPassword2").value;
		var repass = document.getElementById("tbPassword22").value;
		var passS2 = document.getElementById("passS2");
		var reg_pass=/^[\w\s\/\.\_\d]{4,}$/;
	if(reg_pass.test(repass) && pass==repass){
		passS2.innerHTML="";
		document.getElementById("tbPassword22").style.border = "none";
	}else{
		passS2.innerHTML="Passwords must match ";
		passS2.className ="greskeR2";
		document.getElementById("tbPassword22").style.border = "1px solid #a94442"; 
	}
} 