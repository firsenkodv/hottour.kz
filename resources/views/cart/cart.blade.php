@extends('layouts.layout')
<x-seo.meta
    title="{{__('Корзина')}}"
    description="{{__('Корзина')}}"
    keywords="{{__('Корзина')}}"
/>
@section('content')

    <main class="pad_t46 pad_b46">
        <div class="block__800">

            <div class="cabinet_radius12_fff">
                <div class="c__title_subtitle pad_b1">
                    <h3 class="F_h1">{{ __('Корзина туров') }}</h3>
                    <div class="F_h2 pad_t5"><span>{{ __('Отели с турами которые вы сохранили') }}</span></div>
                </div>
            </div>
        </div>
        <br>
        <br>

        <div class="s_page  s_page__tours" id="resultHotel">

            @if($tour_data)

                @foreach($tour_data as $hotel)

                    @dump($hotel)

                    @if($hotel->site_hotel)

                        <div id="hotel-2904" class="search_result__tour search_tabs_switch"  style="background-color: #fff" data-id="{{ $hotel->site_hotel['slug'] }}" data-key="0"
                             data-rating="{{ $hotel->site_hotel['rating'] }}" data-cost="555555">
                            <div class="search_result__flex"><a rel="nofollow" href="/go-to-the-hotel's-page/{{ $hotel->site_hotel['slug'] }}"
                                                                target="_blank">
                                    <div class="search_result__photo"
                                         style="background:url({{ $hotel->site_hotel['params']['0'] }});">
                                        <ul class="hotel_star search_result__hotel_star">
                                            <li><i class="star">★</i></li>
                                            <li><i class="star">★</i></li>
                                            <li><i class="star">★</i></li>
                                            <li><i class="star">★</i></li>
                                            <li><i class="star">★</i></li>
                                        </ul>
                                        <div class="search_result__rating good">4.5</div>
                                    </div>
                                </a>
                                <div class="search_result__info-wrap">
                                    <div class="search_result__info">
                                        <div class="search_result__hotel"><h3 class="hotel_name" style="text-transform: uppercase">{{ $hotel->site_hotel['title'] }}</h3></div>
                                        <div class="search_result__city"><span class="search_result__city-name">{{ getCountryName($hotel->site_hotel['country_id']) }}, Шарм-Эль-Шейх</span>
                                        </div>
                                        <ul class="search_result__tabs">
                                            <li class="hotel_about__li" data-target="hotel_about">Об отеле</li>
                                            <li class="hotel_map__js" data-target="hotel_map" data-id="2904"
                                                data-coord_x="27.863607" data-coord_y="34.307451">На карте
                                            </li>
                                            <li class="hotel_price__js" data-target="hotel_price">Цены</li>
                                        </ul>
                                        <div class="search_result__text">Отель расположен на второй береговой линии в
                                            районе Ом Эль Сид Хилл, в самом центре набережной Il Mercato, на которой
                                            находятся магазины. Отель удален от пляжа, но на обширной территории
                                            размещены крытые и открытые бассейны, спа и оздоровительный центр. Для
                                            гостей — просторные стильные номера.
                                        </div>
                                    </div>
                                    <div class="search_result__price">
                                        <div class="search_result__coast">от <span>512 124</span> <span
                                                class="c__currency">₸</span></div>
                                        <div class="wrap_button">
                                            <button type="button" data-target="hotel_price"
                                                    class="search_result__button button  search_result__tour_button btnPinkGradient DetailedTourGTM isClick">
                                                Подробнее
                                            </button>
                                        </div>
                                        <div class="favourites"><i></i><span></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="search_result__switch search_choose_switch">
                                <div class="hotel_about">
                                    <div class="hotel_about__photo">
                                        <div class="photo_collage"><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114300.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114300.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114301.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114301.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114302.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114302.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114303.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114303.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114305.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114305.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114308.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114308.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114309.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114309.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114311.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114311.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114312.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114312.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114313.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114313.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114314.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114314.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114315.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114315.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114316.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114316.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114317.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114317.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114318.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114318.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114319.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114319.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114320.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114320.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114321.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114321.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114322.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114322.jpg)"></div>
                                            </a><a
                                                href="//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114323.jpg"
                                                data-fancybox="gallery-2904" class="photo_collage__link">
                                                <div class="photo_collage__img"
                                                     style="background-image: url(//static.tourvisor.ru/hotel_pics/verybig/1/iberotel-il-mercato-1114323.jpg)"></div>
                                            </a></div>
                                    </div>
                                    <div class="hotel_about__text desc"><p><span class="span_block">Расположение:</span>Отель
                                            находится в г. Шарм Эль Шейх. Расстояние до международного аэропорта
                                            Шарм-Эль-Шейха — 19 км. </p>
                                        <p><span>Территория отеля:</span></p>
                                        <ul>
                                            <li>4 бассейна включая бассейн с подогревом в зимний период</li>
                                            <li>2 детских бассейна с подогревом в зимний период</li>
                                            <li>ресторан Giardino рассчитан на 267 гостей (07:00-10:00, 12:30-15:00,
                                                18:30 - 21:00)
                                            </li>
                                            <li>итальянский аля карт ресторан La Seppia рассчитан на 34 гостя
                                                (19:30-20:30/20:45-22:00, за дополнительную плату)
                                            </li>
                                            <li>ресторан Satellite</li>
                                            <li>лобби бар Galleria (10:00-00:00)</li>
                                            <li>бар Terrazzina у бассейна (10:00 до заката солнца/ 20:00-23:00)</li>
                                            <li>кальянная (18:00-00:00, за дополнительную плату)</li>
                                        </ul>
                                        <p><span>Питание:</span></p>
                                        <ul>
                                            <li>AI-все включено</li>
                                        </ul>
                                        <p><span>В номерах:</span></p>
                                        <ul>
                                            <li>ванная комната с ванной или душевой кабиной</li>
                                            <li>фен</li>
                                            <li>тапочки и халаты (для VIP гостей)</li>
                                            <li>центральный или сплит кондиционер</li>
                                            <li>спутниковое телевидение (русские каналы)</li>
                                            <li>телефон</li>
                                            <li>мини бар (согласно концепции отеля)</li>
                                            <li>сейф (бесплатно)</li>
                                            <li>дополнительная кровать (по запросу, бесплатно, ширина 120 см/длина 190
                                                см)
                                            </li>
                                            <li>балкон или окно</li>
                                            <li>ежедневная уборка номера</li>
                                            <li>смена белья (по запросу)</li>
                                            <li>дополнительный сервис номеров (платно)</li>
                                            <li>2 маленькие бутылки минеральной воды (по приезду)</li>
                                        </ul>
                                        <p><span>Пляж:</span></p>Коралловый пляж Palma Beach в 2,5 км от отеля:<br>
                                        <ul>
                                            <li>на пляже есть понтон (длина 70 м)</li>
                                            <li>бесплатный автобус до/из пляжа (с 08:30 до 17:00)</li>
                                        </ul>
                                        Доступный сервис на пляже Palma:<br>
                                        <ul>
                                            <li>неограниченный бесплатный вход на пляж в течение дня</li>
                                            <li>пляжные полотенца</li>
                                            <li>выпечка в ресторане Palma с 16:00-17:00</li>
                                            <li>обед по меню с 13:00-14:30 (за дополнительную плату)</li>
                                            <li>выпечка в баре на пляже Palma с 16:00-17:00</li>
                                            <li>бар Palma: безалкогольные и горячие напитки подаются с 10:00-17:00
                                                (алкогольные коктейли подаются с 16:00-17:00)
                                            </li>
                                            <li>мороженое за дополнительную плату</li>
                                            <li>романтический ужин по запросу (платно)</li>
                                            <li>бесплатный wi-fi</li>
                                            <li>анимационная дневная программа и спортивные мероприятия</li>
                                            <li>дартс, настольный футбол и теннис</li>
                                            <li>пляжный волейбол</li>
                                            <li>массаж (платно)</li>
                                            <li>дайвинг центр и водные виды спорта (платно)</li>
                                        </ul>
                                        <div class="hotel_about__bottom"><a rel="nofollow"
                                                                            href="/go-to-the-hotel's-page/2904"
                                                                            target="_blank" class="hotel_about__link">Подробнее
                                                об отеле</a></div>
                                    </div>
                                </div>
                                <div class="hotel_map">
                                    <div class="hotel_map__item" id="yandexmap-2904"
                                         style="height: 400px;width: 100%;"></div>
                                </div>
                                <div class="hotel_price">
                                    <div class="hotel_price__top">
                                        <div class="hotel_price__title"></div>
                                    </div>
                                    <div class="hotel_price__table" data-page="0">
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">18 июня (вт)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">6 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">24 июня (пн)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Завтрак, Ужин</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:512124,&quot;dateFrom&quot;:&quot;18 июня (вт)&quot;,&quot;dateTo&quot;:&quot;24 июня (пн)&quot;,&quot;nights&quot;:6,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Завтрак, Ужин&quot;,&quot;meal&quot;:&quot;HB&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;EGY. Шарм-Эш-Шейх из Алматы SALE.&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;Selfie Travel (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="993929034433"><span>512&nbsp;124</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">18 июня (вт)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">6 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">24 июня (пн)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Все Включено</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:529553,&quot;dateFrom&quot;:&quot;18 июня (вт)&quot;,&quot;dateTo&quot;:&quot;24 июня (пн)&quot;,&quot;nights&quot;:6,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Все Включено&quot;,&quot;meal&quot;:&quot;AI&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;EGY. Шарм-Эш-Шейх из Алматы SALE.&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;Selfie Travel (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="993929034443"><span>529&nbsp;553</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">18 июня (вт)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">9 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">27 июня (чт)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Завтрак, Ужин</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:576922,&quot;dateFrom&quot;:&quot;18 июня (вт)&quot;,&quot;dateTo&quot;:&quot;27 июня (чт)&quot;,&quot;nights&quot;:9,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Завтрак, Ужин&quot;,&quot;meal&quot;:&quot;HB&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;EGY. Шарм-Эш-Шейх из Алматы SALE.&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;Selfie Travel (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="993595948030"><span>576&nbsp;922</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">18 июня (вт)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">9 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">27 июня (чт)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Все Включено</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:603288,&quot;dateFrom&quot;:&quot;18 июня (вт)&quot;,&quot;dateTo&quot;:&quot;27 июня (чт)&quot;,&quot;nights&quot;:9,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Все Включено&quot;,&quot;meal&quot;:&quot;AI&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;EGY. Шарм-Эш-Шейх из Алматы SALE.&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;Selfie Travel (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="993586921984"><span>603&nbsp;288</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">18 июня (вт)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">8 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">26 июня (ср)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Завтрак, Ужин</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:620716,&quot;dateFrom&quot;:&quot;18 июня (вт)&quot;,&quot;dateTo&quot;:&quot;26 июня (ср)&quot;,&quot;nights&quot;:8,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Завтрак, Ужин&quot;,&quot;meal&quot;:&quot;HB&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;EGY. Шарм-Эш-Шейх из Алматы SALE.&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;Selfie Travel (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="993593012061"><span>620&nbsp;716</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">18 июня (вт)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">8 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">26 июня (ср)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Все Включено</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:644401,&quot;dateFrom&quot;:&quot;18 июня (вт)&quot;,&quot;dateTo&quot;:&quot;26 июня (ср)&quot;,&quot;nights&quot;:8,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Все Включено&quot;,&quot;meal&quot;:&quot;AI&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;EGY. Шарм-Эш-Шейх из Алматы SALE.&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;Selfie Travel (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="993586921968"><span>644&nbsp;401</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">20 июня (чт)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">7 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">27 июня (чт)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Завтрак, Ужин</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:653785,&quot;dateFrom&quot;:&quot;20 июня (чт)&quot;,&quot;dateTo&quot;:&quot;27 июня (чт)&quot;,&quot;nights&quot;:7,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Завтрак, Ужин&quot;,&quot;meal&quot;:&quot;HB&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;EGY. Шарм-Эш-Шейх из Алматы Стандарт&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;Selfie Travel (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="993019851839"><span>653&nbsp;785</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">20 июня (чт)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">7 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">27 июня (чт)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Все Включено</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:674789,&quot;dateFrom&quot;:&quot;20 июня (чт)&quot;,&quot;dateTo&quot;:&quot;27 июня (чт)&quot;,&quot;nights&quot;:7,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Все Включено&quot;,&quot;meal&quot;:&quot;AI&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;EGY. Шарм-Эш-Шейх из Алматы Стандарт&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;Selfie Travel (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="993019851944"><span>674&nbsp;789</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">22 июня (сб)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">7 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">29 июня (сб)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Завтрак, Ужин</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:744177,&quot;dateFrom&quot;:&quot;22 июня (сб)&quot;,&quot;dateTo&quot;:&quot;29 июня (сб)&quot;,&quot;nights&quot;:7,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Завтрак, Ужин&quot;,&quot;meal&quot;:&quot;HB&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;Sharm El Sheikh from Almaty (без позднего выселения) STD&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;FUN&amp;SUN (TUI) (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="9343300437"><span>744&nbsp;177</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">22 июня (сб)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">7 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">29 июня (сб)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Все Включено</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:760335,&quot;dateFrom&quot;:&quot;22 июня (сб)&quot;,&quot;dateTo&quot;:&quot;29 июня (сб)&quot;,&quot;nights&quot;:7,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Все Включено&quot;,&quot;meal&quot;:&quot;AI&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;Sharm El Sheikh from Almaty (без позднего выселения) STD&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;FUN&amp;SUN (TUI) (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="9315167760"><span>760&nbsp;335</span>
                                                    ₸ </a></div>
                                        </div>
                                        <div class="line_info">
                                            <div class="line_info_plane">
                                                <div class="line_info_plane__item line_info_plane__item__up"><p><span
                                                            class="line_info_plane__day">24 июня (пн)</span></p></div>
                                                <div class="line_info_plane__sep">-</div>
                                                <div class="line_info_plane__nights">9 ночей</div>
                                                <div class="line_info_plane__item line_info_plane__item__down"><p><span
                                                            class="line_info_plane__day">03 июля (ср)</span></p></div>
                                            </div>
                                            <div class="line_info_row">
                                                <div class="line_info_ticket"><p class="line_info_ticket__class">
                                                        standard</p>
                                                    <p>Завтрак, Ужин</p>
                                                    <p>DBL</p></div>
                                                <div class="line_info_flight"></div>
                                            </div>
                                            <div class="line_info_btn-wrap"><a href="#reserve_hotel" data-fancybox=""
                                                                               data-tout_data="{&quot;price&quot;:810605,&quot;dateFrom&quot;:&quot;24 июня (пн)&quot;,&quot;dateTo&quot;:&quot;03 июля (ср)&quot;,&quot;nights&quot;:9,&quot;room&quot;:&quot;standard&quot;,&quot;mealrussian&quot;:&quot;Завтрак, Ужин&quot;,&quot;meal&quot;:&quot;HB&quot;,&quot;adults&quot;:2,&quot;child&quot;:0,&quot;tourname&quot;:&quot;Sharm El Sheikh from Almaty (без позднего выселения) STD&quot;,&quot;sity&quot;:&quot;\n                        Алматы&quot;,&quot;hotel&quot;:&quot;IL MERCATO HOTEL (EX. IBEROTEL)&quot;,&quot;country&quot;:&quot;Египет&quot;,&quot;stars&quot;:5,&quot;operatorname&quot;:&quot;FUN&amp;SUN (TUI) (KZ)&quot;,&quot;currency&quot;:&quot;₸&quot;}"
                                                                               class="line_info__link line_info__link--big button button_big btnPinkGradientTour tour_button_js"
                                                                               data-hotelcode="2904"
                                                                               data-tourid="93951163035"><span>810&nbsp;605</span>
                                                    ₸ </a></div>
                                        </div>
                                    </div>
                                    <div class="roll_back roll_back_js"><span>Свернуть</span></div>
                                </div>
                            </div>
                        </div>

                    @else



                    @endif

                @endforeach

            @endif

        </div>

    </main>

@endsection




