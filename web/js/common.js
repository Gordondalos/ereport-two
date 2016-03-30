$(document).ready(function() {
	//$.noConflict();

	//SVG Fallback
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};

	//Аякс отправка форм
	//Документация: http://api.jquery.com/jquery.ajax/
	$("#form").submit(function() {
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: $(this).serialize()
		}).done(function() {
			alert("Спасибо за заявку!");
			setTimeout(function() {
				
				$("#form").trigger("reset");
			}, 1000);
		});
		return false;
	});

	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	};


	// By default, swipe is enabled.
	$('section').horizon();

	// If you do not want to include another plugin, TouchSwipe, you can set it to false in the default options by passing in the option as false.
	//$('section').horizon({swipe: false});

	$(document).on('click', '.go-to-2', function () {
		$(document).horizon('scrollTo', 'section-section2');
	});



	
});

// джаваскрипт от панели




$(document).ready(function() {
	var h = $(window).height();
	$('.navigation-panel').css('height',""+h);

	$('.bar').click(function(e){
		e.preventDefault();
		w = $('.navigation-panel').css('width');
		if(w == '64px'){
			$('.navigation-panel .fa-bars').css('transform','rotate(90deg)');
			$('.navigation-panel .fa-bars').css('transition','.4s ease');
			$('.navigation-panel').find('.links').animate({width:'85%'}, 500);
			$('.navigation-panel').find('.links').fadeIn(500);
			$('.navigation-panel').animate({width:'20rem'}, 400);
			$('.navigation-panel').find('.superlative').fadeIn(400);
		}else{

			$('.navigation-panel .fa-bars').css('transform','rotate(0deg)');
			$('.navigation-panel .fa-bars').css('transition','.4s ease');
			$('.navigation-panel').find('.links').fadeOut(100);
			$('.navigation-panel').find('.superlative').fadeOut(100);
			$('.navigation-panel').animate({width:'4rem'}, 400);


		}
	});


	$(window).on("orientationchange",function(){
		if(window.orientation == 0) // Книжная
		{
			location.reload();
		}
		else // Альбомная
		{
			location.reload();
		}
	});



}); // end of ready()
