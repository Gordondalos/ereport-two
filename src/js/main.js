    // js panel
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
            $('.navigation-panel').find('.links').fadeOut(10);
            function func() {
                $('.navigation-panel').find('.superlative').fadeOut(100);
                $('.navigation-panel').animate({width:'4rem'}, 400);
            }
            setTimeout(func, 400);
        }
    });
}); // end of ready()
