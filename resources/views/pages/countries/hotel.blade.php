@extends('layouts.layout')
<x-seo.meta
    title="{{($item->metatitle)?:$item->title}}"
    description="{{$item->description}}"
    keywords="{{$item->keywords}}"
/>
@section('content')

    <main class="page_site page_site_hotel background_f7f7f7">
        <div class="block countries height_100">

            <div class="page_site__flex height_100">
                <div class="page_site__left">
                    <div class="hbox temp_img">
                        <div class="hbox__top pad_b1">
                            <x-breadcrumb.breadcrumb>
                                <li><a href="{{ route('countries') }}">{{__('Страны')}}</a></li>
                                <li><a href="{{asset(route('countries')).'/'. $country->slug}}">{{$country->title}}</a>
                                </li>
                                <li>
                                    <a href="{{asset(route('countries')).'/'. $country->slug. '/'.  $hot_category->slug}}">{{$hot_category->title}}</a>
                                </li>
                                <li><span>{{$item->title}}</span></li>
                            </x-breadcrumb.breadcrumb>
                            <div class="h1">@if($country->imgflag)
                                    <span>
                                        <img class="h1_flag"
                                             src="{{asset('storage/'.$country->imgflag)}}"
                                             width="62"
                                             height="40" loading="lazy" alt="{{$country->title}}"/>
                                        </span>
                                @endif
                                {{ ($country->title) }}

                            </div>
                        </div>
                    </div>

                    <div class="hbox__submenu">
                        <div class="view_subcategories_countries v_s_c ">
                            <div class="flex v_s_c__flex">

                                <div class="v_s_c__item"><a
                                        href="{{asset(route('countries')).'/'. $country->slug}}">{{ __('О стране') }}</a>
                                </div>

                                @foreach($subcountries as $subcountry)
                                    {{--  @dd(asset(route('countries').'/'. $country->slug. '/'. $subcountry->slug . '/'. $item->slug))--}}
                                    <div class="v_s_c__item
                                   {{ active_linkMenu(asset(route('countries').'/'. $country->slug. '/'. $subcountry->slug . '/'. $item->slug) ) }}">
                                        <a href="{{ asset(route('countries').'/'. $country->slug. '/'. $subcountry->slug) }}">
                                            {{ ($subcountry->title_for_menu)?:$subcountry->title  }}</a>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="hbox__middle country_page ">
                        <div class="flex hotel__title">
                            <h1>@if($item->imgflag)
                                    <span>
                                        <img class="h1_flag"
                                             src="{{asset('storage/'.$item->imgflag)}}"
                                             width="62"
                                             height="40" loading="lazy" alt="{{$item->title}}"/>
                                        </span>
                                @endif
                                {{ ($item->subtitle)?: $item->title }}
                            </h1>
                            @if($item->stars)
                                <div class="hotel__redstar">
                                    <img width="18" height="18" loading="lazy" alt="hotel__redstar"
                                         src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTE3LjcxNDMgNi41ODcxOEMxNy42MTY2IDYuMjg2NzYgMTcuMzM2NiA2LjA4MzMyIDE3LjAyMDggNi4wODMzMkgxMS40Njk3TDkuNjkxMjYgMC43NDg3NDlDOS41OTIwOSAwLjQ1MTI1IDkuMzEzNTUgMC4yNSA4Ljk5OTI4IDAuMjVDOC42ODUwMSAwLjI1IDguNDA3MiAwLjQ1MDUyIDguMzA3MyAwLjc0ODc0OUw2LjUyODg3IDYuMDgzMzJIMC45NzkxOTRDMC42NjM0NjUgNi4wODMzMiAwLjM4MzQ2NiA2LjI4Njc2IDAuMjg1NzU3IDYuNTg3MThDMC4xODgwNDkgNi44ODc1OSAwLjI5NTIzNyA3LjIxNjQ0IDAuNTUwNDQ0IDcuNDAyMzhMNS4wMDkyOSAxMC42NDU3TDMuMjAzODggMTYuMDYxMkMzLjEwMzk4IDE2LjM2MDkgMy4yMDgyNSAxNi42OTA1IDMuNDYyIDE2Ljg3ODZDMy43MTY0OCAxNy4wNjY3IDQuMDYyMSAxNy4wNjg5IDQuMzE4NzcgMTYuODg1OUw4Ljk5OTI4IDEzLjU0MjdMMTMuNjc5OCAxNi44ODU5QzEzLjgwNjcgMTYuOTc2MyAxMy45NTQ3IDE3LjAyMTUgMTQuMTAzNCAxNy4wMjE1QzE0LjI1NTggMTcuMDIxNSAxNC40MDc1IDE2Ljk3NDEgMTQuNTM2NiAxNi44Nzg2QzE0Ljc5MDMgMTYuNjkxMiAxNC44OTQ2IDE2LjM2MTYgMTQuNzk0NyAxNi4wNjEyTDEyLjk4OTMgMTAuNjQ1N0wxNy40NDgxIDcuNDAyMzhDMTcuNzA0OCA3LjIxNjQ0IDE3LjgxMiA2Ljg4Njg2IDE3LjcxNDMgNi41ODcxOFoiIGZpbGw9IiNFRjUzM0YiLz4KPC9zdmc+Cg==">
                                    <span>{{$item->stars}}</span>.0
                                </div>
                            @endif
                        </div>


                        @if($item->params)

                            <div class="swiper-container__hotelphoto">
                                <div class="swiper-container gallery-thumbs">
                                    <div class="swiper-wrapper">

                                        @foreach($item->params as $img)
                                            <div class="swiper-slide" style="
                                            width: 100%;
                                            height: 106px;
                                            background-position: center;
                                            background-repeat: no-repeat;
                                            background-size: cover;
                                            background-image: url('{{asset($img)}}')"></div>

                                        @endforeach

                                    </div>
                                </div>

                                {{--@if ($loop->first)  @endif--}}
                                <div class="swiper-container gallery-top">
                                    <div class="swiper-wrapper">
                                        @foreach($item->params as $img)

                                            <a href="{{asset($img)}}" data-fancybox="{{$item->id}}" data-caption="{{$item->title}}"
                                               class="swiper-slide hotel__first_photo" style="
                                            width: 100%;
                                            height: 560px;
                                            background-position: center;
                                            background-repeat: no-repeat;
                                            background-size: cover;
                                            background-image: url('{{asset($img)}}')">
                                            </a>

                                        @endforeach
                                    </div>
                                    <div class="swiper_prev_next">
                                        <div class="swiper-prev swiper-button-prev-swiper_banner"><span>‹</span></div>
                                        <div class="swiper-next swiper-button-next-swiper_banner"><span>›</span></div>
                                    </div>
                                </div>

                            </div>
                        @endif


                        @if($item->placement)
                            <div class="philosopher hotel__placement desc">
                                {!!  $item->placement !!}
                            </div>
                        @elseif($item->desc)
                            <div class="philosopher hotel__placement desc">
                                {!!  $item->desc !!}
                            </div>
                        @endif
                        @if($item->coord)
                            <div class="hotel__services">
                                <h3>Отель на карте</h3>
                            </div>
                            <div id="getHotelMap" class="hotel__datamap">
                                <div id="JFormFieldMap"></div>
                            </div>
                        @endif

                        <div class="search_hotel_form__copy active">
                            <x-forms.loader class="br_12"/>
                        </div>

                        <div class="hotel__services">
                            <h3>Удобства и услуги</h3>
                        </div>
                        <div id="getHotelInfo" class="hotel__dataservices" data-token="{{ csrf_token() }}">
                            <x-forms.loader class="br_12"/>
                        </div>


                        <div class="hotel__services">
                            <h3>Туры</h3>
                        </div>

                        <div class="inputs_hotel">
                            <form id="formsearch" name="formsearch">
                                <div class="search_hotel">

                                    {{--      @include('include.search.top_form.s_sity')--}}

                                    <input name="departure" data-departure="{{ departureSity() }}" type="hidden"
                                           value="{{ departureCode() }}"/>
                                    <input name="country" type="hidden" value="{{ $item->country_id }}"/>
                                    <input name="region[]" type="hidden" value="{{ $item->region_id }}"/>
                                    <input name="hotels[]" type="hidden" value="{{ $item->slug }}"/>
                                    <input name="daterange" type="hidden"
                                           value="{{ date('d.m.Y', (strtotime('+1 days'))) }} - {{ date('d.m.Y',(strtotime('+7 days'))) }}">
                                    <input name="nightsfrom" type="hidden" value="6">
                                    <input name="nightsto" type="hidden" value="12">
                                    <input type="hidden" name="adults" value="2" id="adults_input">
                                </div>
                            </form>
                        </div>

                        <div id="resultHotel" class="hotel__datapopulate"></div>

                        <div class="hotel__services">
                            <h3>Отзывы об отеле</h3>
                        </div>
                        <div id="getHotelReviews" class="hotel__datareviews">
                        </div>


                        @if($item->smalltext)
                            <div class="colorGrey smalltext desc">
                                {!!  $item->smalltext !!}
                            </div>
                        @endif

                        @if($item->text)
                            <div class="desc_text desc">
                                {!!  shortcode($item->text) !!}
                            </div>
                        @endif

                        @if($item->pageimg1)
                            <div class="pageimg pad_t16 pad_b16">
                                <img src="{{ asset(intervention('892x516', $item->pageimg1)) }}" width="892"
                                     height="516"
                                     loading="lazy"
                                     alt="{{$item->title}}"/>
                            </div>
                        @endif

                        @if($item->text2)
                            <div class="desc_text2 desc">
                                {!!  shortcode($item->text2) !!}
                            </div>
                        @endif

                        @if($item->pageimg2)
                            <div class="pageimg2 pad_t16 pad_b16">

                                <img src="{{ asset(intervention('892x516', $item->pageimg2)) }}" width="892"
                                     height="516" loading="lazy"
                                     alt="{{ ($item->subtitle)?: $item->title }}"/>
                            </div>
                        @endif

                        @if($item->text3)
                            <div class="desc_text3 desc">
                                {!!  shortcode($item->text3) !!}
                            </div>
                        @endif

                    </div>


                </div>
                <div class="page_site__right">

                    @include('include.search.hotel_form.order')

                </div>
            </div><!--.page_site__flex-->
        </div>


    </main>


    @include('include.search.js.hotel-hotel_js')


    @if($item->coord)
        <script>
            function getYaMap() {

                var myMap = new ymaps.Map("JFormFieldMap", {
                    center: [{{$item->coord}}],
                    zoom: 16,
                    controls: ['zoomControl', 'typeSelector', 'fullscreenControl']
                }, {searchControlProvider: 'yandex#search'});
                myPlacemark = new ymaps.Placemark([{{$item->coord}}], {balloonContent: '<h5>Отель:  {{$item->title}}</h5>'}, {
                    iconLayout: 'default#image',
                    iconImageHref: '{{ asset('/images/myIcon.svg') }}',
                    iconImageSize: [58, 55],
                    iconImageOffset: [-28, -48]
                });

                myMap.setType(`yandex#hybrid`);
                myMap.geoObjects.add(myPlacemark);
            }

            // меняем тип карты на hybrid

        </script>
    @endif
@endsection




