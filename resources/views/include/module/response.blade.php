<div class="r_sw">
    <div class="r_sw__flex">

        <div class="r_sw__left">
            <div class="h2">{{__('Отзывы наших туристов')}}</div>
        </div>
        <div class="r_sw__right">
            <div class="r_nav">
                <button type="button" class="swiper-prev swiper-button-prev-swiper_responce"><span>‹</span></button>
                <button type="button" class="swiper-next swiper-button-next-swiper_responce"><span>›</span></button>
            </div>
        </div>

    </div>

    <div class="swiper swiper_responce">
    <div class="swiper-wrapper">
        @foreach($main_otz as $item)
            <div class="swiper-slide">
                <div class="responce_item">
                    <a href="{{ asset(config('links.link.about').'/'.$main_category->slug.'/'.$item->slug) }}" class="responce_item__link">
                        <div class="white_circle responce_item__circle">
                            <span class="white_circle__redplay"></span>
                        </div>


                        <img class="responce_item__img" alt="{{ $item->title }}" loading="lazy" src="{{ asset(intervention('290x200', $item->img, 'dumps')) }}" width="290" height="200">



                        <div class="responce_item__title">{{ $item->title }}</div>
                        <div class="responce_item__desc">{!!  $item->smalltext !!} </div>
                    </a>

                </div>

            </div>
        @endforeach


    </div>
</div>
</div>
