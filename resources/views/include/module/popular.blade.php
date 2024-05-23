@if(count($hotel_swiper)>4)


<div class="p_sw">
    <div class="p_sw__flex">

    <div class="p_sw__left">
        <h2>{{__('Популярные направления')}}</h2>
    </div>
    <div class="p_sw__right">
        <div class="p_nav">
            <button type="button" class="swiper-prev swiper-button-prev-swiper_populars"><span>‹</span></button>
            <button type="button" class="swiper-next swiper-button-next-swiper_populars"><span>›</span></button>
        </div>
    </div>
</div>

    <div class="swiper swiper_populars">
        <div class="swiper-wrapper">

            @foreach($hotel_swiper as $hotel)
                <div class="swiper-slide">
                    <div class="popular_item">
                        <div class="popular_item__top">
                           {{-- <div class="popular_item__sale div_sale_absol">-10%</div>--}}

                            <div class="popular_item__img" style="width:310px; height: 280px ;background-image: url('{{ asset('storage/' . $hotel->img) }}'); background-size: cover"></div>
                        </div>


                        <div class="popular_item__bottom">
                            <div class="popular_item__avia swiper-no-swiping"><span class="p_star">★</span><span class="p_starcount">{{ $hotel->stars }}.0 • Турция</span></div>

                            <div class="popular_item__title swiper-no-swiping">
                                {{ $hotel->title }}
                            </div>

                  {{--          <div class="popular_item__sity">
                                Из Алматы
                            </div>
                            <div class="popular_item__price">
                                582 005₸
                            </div>
                            <div class="popular_item__odred h_order">
                                <a href="" type="submit" class="button button_normal button_green  order_call_js">
                                    Забронировать
                                </a>
                            </div>--}}
                        </div><!--.pad_16-->
                    </div>
                </div><!--.swiper-slide-->

            @endforeach



        </div>
    </div>

</div><!--.p_sw-->
@endif


