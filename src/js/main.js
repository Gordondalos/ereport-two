// js panel
$(document).ready(function () {
    var h = $(window).height();
    $('.navigation-panel').css('height', "" + h);

    $('.bar').click(function (e) {
        e.preventDefault();
        w = $('.navigation-panel').css('width');
        if (w == '64px') {
            $('.navigation-panel .fa-bars').css('transform', 'rotate(90deg)');
            $('.navigation-panel .fa-bars').css('transition', '.4s ease');
            $('.navigation-panel').find('.links').animate({width: '85%'}, 500);
            $('.navigation-panel').find('.links').fadeIn(500);
            $('.navigation-panel').animate({width: '20rem'}, 400);
            $('.navigation-panel').find('.superlative').fadeIn(400);
        } else {

            $('.navigation-panel .fa-bars').css('transform', 'rotate(0deg)');
            $('.navigation-panel .fa-bars').css('transition', '.4s ease');
            $('.navigation-panel').find('.links').fadeOut(10);
            function func() {
                $('.navigation-panel').find('.superlative').fadeOut(100);
                $('.navigation-panel').animate({width: '4rem'}, 400);
            }

            setTimeout(func, 400);
        }
    });
}); // end of ready()


$(document).ready(function () {

    var gns = $('#gns').find('.records_list').addClass('tablet1');
    var sf = $('#sf').find('.records_list').addClass('tablet2');
    var stat = $('#stat').find('.records_list').addClass('tablet3');

    $('.tablet1').DataTable({
        ordering: true,
        "language": {
            "url": "/dataTables/i18n/ru_ru.lang"
        },
        "order": [[ 0, "desc" ]]
    });
    $('.tablet2').DataTable({
        ordering: true,
        "language": {
            "url": "/dataTables/i18n/ru_ru.lang"
        },
        "order": [[ 0, "desc" ]]
    });
    $('.tablet3').DataTable({
        ordering: true,
        "language": {
            "url": "/dataTables/i18n/ru_ru.lang"
        },
        "order": [[ 0, "desc" ]]
    });


    $('.tablet1').css("width",'100%');
    $('.tablet2').css("width",'100%');
    $('.tablet3').css("width",'100%');

    $('.user_table').DataTable({
        ordering: true,
        "language": {
            "url": "/dataTables/i18n/ru_ru.lang"
        }
    });




}); // end of ready()


// Запуск ск эдитора
$(document).ready(function () {
    if ($('textarea').is('[name = description]')) {
        CKEDITOR.replace('description');
    }

    if ($('form').is('[name = newsbundle_news]')) {
        CKEDITOR.replace('newsbundle_news[newsTitle]');
        CKEDITOR.replace('newsbundle_news[shortNews]');
        CKEDITOR.replace('newsbundle_news[AllNews]');
    }

    if ($('form').is('[name = appbundle_organization]')) {
        CKEDITOR.replace('appbundle_organization[organizationDescription]');

    }
    if ($('form').is('[name = appbundle_baseforms]')) {
        CKEDITOR.replace('appbundle_baseforms[description]');

    }




}); // end of ready()
