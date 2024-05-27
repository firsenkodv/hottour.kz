//todo:jquery
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


            /*        getValue: function()
                    {
                       // console.log(this.innerHTML)
                      //  $('.birthdate').text(this.innerHTML);
                        return this.innerHTML;
                    },
                    setValue: function(s)
                    {
                       // $('.birthdate').text(this.innerHTML);
                       // console.log(this.innerHTML);
                        this.innerHTML = s;
                    }*/

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









