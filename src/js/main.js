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
      autoSlideDelay = 6000,
      $pagination = $(".slider-pagi");
  
  function createBullets() {
    for (var i = 0; i < numOfSlides+1; i++) {
      var $li = $("<li class='slider-pagi__elem'></li>");
      $li.addClass("slider-pagi__elem-"+i).data("page", i);
      if (!i) $li.addClass("active");
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
/*nesto novo*/
	
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