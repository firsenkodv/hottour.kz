//todo:jquery
document.addEventListener('DOMContentLoaded', function () {

    if($('.slick_slider__carusel').length) {

        $('.slick_slider__carusel').slick({
            slidesToShow: 5,
            slidesToScroll: 2,
            // centerMode: true,
            swipeToSlide: true,
            variableWidth: true,
            infinite: true,
            speed: 700,
            autoplay: true,
            autoplaySpeed: 7000,
        });
    }

    if($('.slick_slider__popularscarusel').length) {

        $('.slick_slider__popularscarusel').slick({
            slidesToShow: 4,
            slidesToScroll: 3,
            // centerMode: true,
            swipeToSlide: true,
            variableWidth: true,
            infinite: true,
            speed: 700,
            autoplay: true,
            autoplaySpeed: 7000,
        });
    }

    $('body').on('click', '.p_sw .click_slider_p__js', function (event) {
     $('.slick_slider__popularscarusel  .slick-prev').trigger('click');
    });

    $('body').on('click', '.p_sw .click_slider_n__js', function (event) {
     $('.slick_slider__popularscarusel  .slick-next').trigger('click');
    });


    if($('.slick_slider__responcescarusel').length) {

        $('.slick_slider__responcescarusel').slick({
            //  slidesToShow: 4,
            slidesToScroll: 3,
            //    centerMode: true,
            swipeToSlide: true,
            variableWidth: true,
            infinite: true,
            speed: 700,
            autoplay: false,
            autoplaySpeed: 7000,
        });
    }
    $('body').on('click', '.r_sw .click_slider_p__js', function (event) {
        $('.slick_slider__responcescarusel  .slick-prev').trigger('click');
    });

    $('body').on('click', '.r_sw .click_slider_n__js', function (event) {
        $('.slick_slider__responcescarusel  .slick-next').trigger('click');
    });


    $('body').on('click', '.b_nav .click_slider_p__js', function (event) {
        $('.slick_slider__bannercarusel  .slick-prev').trigger('click');
    });

    $('body').on('click', '.b_nav .click_slider_n__js', function (event) {
        $('.slick_slider__bannercarusel  .slick-next').trigger('click');
    });


});

$(document).ready(function () {

    /**
     * input движение label
     * */
    var show = 'show';

    $('.inputClass').each(function (index) {
        let label = $(this).next('label');
        if ($(this).val() != '') {
            label.addClass(show);
        }
    });
    $('.inputClass').change(function () {
        let label = $(this).next('label');
        if ($(this).val() != '') {
            label.addClass(show);
        }

    });


    $('.inputClass').on('checkval', function () {
        let label = $(this).next('label');


        if ($(this).val() != '') {
            label.addClass(show);
        } else {
            label.removeClass(show);
        }


    }).on('keyup', function () {
        $(this).trigger('checkval');
    });

    /* удаление  рамки при error */
    $('input[type="text"], input[type="date"], input[type="password"], input[type="email"]').focus(
        function () {
            $(this).parents('.text_input').find('.errorBlade').text('');
            $(this).removeClass('_is-error');
        }
    );
    /* удаление рамки при error */

    /* управление иконками connect */
    $(document).ready(function () {
        $('body').on('click', '.connection_fixed', function (event) {
            $('.connect_send').removeClass('close');
            $('.connection_fixed').fadeOut();
            $('.connection_absol').slideUp(600);

        });
        $('body').on('click', '.connect_send', function (event) {
            $(this).toggleClass('close');

            if ($('.connect_send').hasClass('close')) {

                $('.connection_fixed').fadeIn();
                $('.connection_absol').slideDown(600);
            } else {

                $('.connection_fixed').fadeOut();
                $('.connection_absol').slideUp(600);
            }

        });

    });


    /* -- страны countrymenu -- */

    $('body').on('click', '.parent__st_after', function (event) {

        //   $('.eee__2021').removeClass('active');
        //   $('.eee__2021').find('.nav_child_st').slideUp();
        $(this).parents('.eee__2021').find('.nav_child_st').slideToggle();
        $(this).parents('.eee__2021').addClass('active');

    });


    /* -- страны countrymenu -- */

    let w_loader = $('.swiper_hottours__wrap').find('.wrapper_loader');
    setTimeout(function () {
        w_loader.removeClass('active');
    }, 1000);


    /* -- закрытие flash  -- */

    $('body').on('click', '.flashClose__js', function (event) {
        $(this).parents('.flashMassege').slideUp(100);
    });

    /* -- закрытие flash  -- */

    if ($('.datepicker-birthdate').length) {
        $('.datepicker-birthdate').dateRangePicker({
            autoClose: true,
            singleDate: true,
            //  startDate: moment().format('DD.MM.YYYY'),
            showShortcuts: false,
            singleMonth: true,
            language: 'ru',
            monthSelect: true,
            startOfWeek: 'monday',// or monday
            yearSelect: [1952, moment().get('year')],


        }).bind('datepicker-change', function (event, obj) {

            console.log(obj.value);
            $('.datepicker-birthdate_result').text(moment(obj.value).format('LL'))

        })
    }



    /* Редактирование important  */
    $('body').on('click', '.survey__absolute .surveyJs', function (event) {
        $(this).prev('.surveyMenuEdit').slideToggle();
    });


    /* Проверка перед отправкой формы */

    $('.checkbox__js form').on('submit', function () {
        const inputArray = [];

        $('.checkbox_change:checkbox:checked').each(function(){
            inputArray.push($(this).val());
        });

        $('#ids').val(inputArray);
         console.log($('#ids').val());

         return true;

    });

    /* Проверка перед отправкой формы */

    /* Открытия значка вопроса*/

    $('body').on('click','.textnohtml_rel', function(event){
        $(this).find('i').slideToggle();
    });

    /* Открытия значка вопроса*/



});

/**
 * Меню в ЛК menu_cab_m__js
 */

$('body').on('click','.menu_cab_m__js', function(event){

    $(this).parents('.v_s_c').find('.v_s_c__flex').slideToggle();


});




/**
 * Меню в ЛК menu_cab_m__js
 */

/**
 * поиск по чекбоксам
 */


$('#filter_jq').on('keyup', function () {
    var query = this.value.toUpperCase();
    $('#hotels-area .checkbox_choice__item').each(function (i, elem) {
        if ($(this).text().indexOf(query) != -1) {
            $(this).show();
            $(this).prev(':checkbox').show();
        } else {
            $(this).hide();
            $(this).prev(':checkbox').hide();
        }
    });
});


/**
 *  ///поиск по чекбоксам
 */



/**
 *  ///корзина список отелей и туров
 */

$('body').on('click', '.hotel_about__js', function (event) {

    let Parent = $(this).parents('.search_result__tour');
    Parent.find('.hotel_about').slideToggle();
    Parent.find('.hotel_map').slideUp();
    Parent.find('.hotel_price').slideUp();
});

$('body').on('click', '.hotel_map__js', function (event) {

    let Parent = $(this).parents('.search_result__tour');
    Parent.find('.hotel_map').slideToggle();
    Parent.find('.hotel_about').slideUp();
    Parent.find('.hotel_price').slideUp();
});

$('body').on('click', '.hotel_price__js', function (event) {

    let Parent = $(this).parents('.search_result__tour');
    Parent.find('.hotel_price').slideToggle();
    Parent.find('.hotel_about').slideUp();
    Parent.find('.hotel_map').slideUp();

});

$('body').on('click', '.search_result__button', function (event) {

    let Parent = $(this).parents('.search_result__tour');
    Parent.find('.hotel_price').slideToggle();
    Parent.find('.hotel_about').slideUp();
    Parent.find('.hotel_map').slideUp();

});

$('body').on('click', '#MainCart .roll_back_js', function (event) {

    let Parent = $(this).parents('.search_result__tour');
    Parent.find('.hotel_about').slideUp();
    Parent.find('.hotel_map').slideUp();
    Parent.find('.hotel_price').slideUp();

});





/**
 *  ///корзина список отелей и туров
 */


/**
 *  ///удаление отелей из корзины
 */


$('body').on('click', '.favourites2', function (event) {


    $(this).parents('.search_result__tour').remove();

    // our object array
    let big_data = [];

    $('#resultHotel .search_result__tour').each(function( index ) {

            let object = {};

            object.hotel = $(this).data('id');
            big_data.push(object);

    });


    //   console.log($(this).parents('.search_result__tour').data('id'));
    $('.tour_data').attr('value',  JSON.stringify(big_data));

});



/**
 *  ///удаление отелей из корзины
 */


/**
 *  Старый поиск
 */




$('body').on('click','.ss_tours2__js .sst_', function(event){

    $('.ss_tours2__js .sst_').removeClass('active');
    $('.s_result_2 .s_result_relative').removeClass('active');
    $(this).addClass('active');
    var Res = $(this).data('res');
    $('.s_result_2 .'+Res).addClass('active');


});

/**Старый поиск
 */













