//todo:jquery
$(document).ready(function () {

    /**
     *
     * */
$('.mobile_version__logo').html($('.header_bottom .logo').html());
$('.mobile_version__social').html($('.header_top .top_social').html());



        $('body').on('click', 'div.m_f', function (event) {

            let mf = $(this).data('mf');

            if($(this).hasClass('active')) {

                $('.tab_plane').hide();
                $('.mob_menu_content').fadeOut();
                $(this).removeClass('active');

            } else {

                $('.tab_plane').hide();

                $('.mob_menu_content_absol .tab_plane').each(function( index ) {
                   if($(this).data('mf') == mf) {
                       $(this).show();
                   }
                });

                $('.mob_menu_content').fadeIn();
                $('.m_f').removeClass('active');
                $(this).addClass('active');
            }
        });







        $('body').on('click', '.m_m_top_close', function (event) {

            $('.mob_menu_content').fadeOut();
            $('.m_f').removeClass('active');

        });

    /* добавляем в мобильное меню пункты у который есть class="add__mobile_menu"  */

    $('.add__mobile_menu').each(function( index ) {
        let active;
        if($(this).hasClass('active')) {
             active = 'active';
        } else {
            active = '';
        }
        $('.fMenu').append('<li><a class="'+ active +'" href="' + $(this).attr('href') + '">'+ $(this).text() +'</a></li>');


    });

    /* добавляем в мобильное меню пункты у который есть class="add__mobile_menu"  */

});
