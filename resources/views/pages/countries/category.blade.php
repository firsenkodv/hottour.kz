@extends('layouts.layout')
<x-seo.meta
    title="{{($hot_category->metatitle)?:$hot_category->title}}"
    description="{{$hot_category->description}}"
    keywords="{{$hot_category->keywords}}"
/>
@section('content')
    <main class="page_site background_f7f7f7">
        <div class="block countries height_100">

            <div class="page_site__flex height_100">
                <div class="page_site__left">
                    <div class="hbox temp_img">
                        <div class="hbox__top pad_b1">
                            <x-breadcrumb.breadcrumb>
                                <li><a href="{{ route('countries') }}">{{__('Страны')}}</a></li>
                                <li><a href="{{asset(route('countries')).'/'. $country->slug}}">{{$country->title}}</a></li>
                                <li><span>{{$hot_category->title}}</span></li>
                            </x-breadcrumb.breadcrumb>

                            <h1>@if($hot_category->imgflag)
                                    <span>
                                        <img class="h1_flag"
                                             src="{{asset('storage/'.$hot_category->imgflag)}}"
                                             width="62"
                                             height="40" loading="lazy" alt="{{$hot_category->title}}"/>
                                    </span>
                                @endif
                                {{ ($hot_category->subtitle)?: $hot_category->title }}

                            </h1>
                        </div>


                    </div>

                    <div class="hbox__submenu">
                        <div class="view_subcategories_countries v_s_c ">
                            <div class="flex v_s_c__flex">

                                <div class="v_s_c__item"><a
                                        href="{{asset(route('countries')).'/'. $country->slug}}">{{ __('О стране') }}</a>
                                </div>
                                @foreach($subcountries as $subcountry)
                                    <div
                                        class="v_s_c__item {{ active_linkMenu(asset(route('countries').'/'. $country->slug. '/'. $subcountry->slug) ) }}">
                                        <a href="{{ asset(route('countries').'/'. $country->slug. '/'. $subcountry->slug) }}">{{ ($subcountry->title_for_menu)?:$subcountry->title  }}</a>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="hbox__middle country_page ">

                        @if($hot_category->smalltext)
                            <div class="colorGrey smalltext desc">
                                {!!  $hot_category->smalltext !!}
                            </div>
                        @endif

                        @if($hot_category->text)
                            <div class="desc_text desc">
                                {!!  shortcode($hot_category->text) !!}
                            </div>
                        @endif

                        @if($hot_category->pageimg1)
                            <div class="pageimg pad_t16 pad_b16">

                                <img src="{{ asset(intervention('892x516', $hot_category->pageimg1)) }}" width="892" height="516" loading="lazy"
                                     alt="{{$hot_category->title}}">
                            </div>
                        @endif

                        @if($hot_category->text2)
                            <div class="desc_text2 desc">
                                {!!  shortcode($hot_category->text2) !!}
                            </div>
                        @endif

                        @if($hot_category->pageimg2)
                            <div class="pageimg2 pad_t16 pad_b16">
                                <img src="{{ asset(intervention('892x516', $hot_category->pageimg2)) }}" width="892" height="516" loading="lazy"
                                     alt="{{ ($hot_category->subtitle)?: $hot_category->title }}">
                            </div>
                        @endif

                        @if($hot_category->text3)
                            <div class="desc_text3 desc">
                                {!!  shortcode($hot_category->text3) !!}
                            </div>
                        @endif

                    </div>

                    <div class="hbox temp_img_text">
                        <div class="hrow ">

                            @if(count($resorts))
                                @include('pages.countries.partial.resorts')
                            @endif

                            @if(count($excursions))
                                @include('pages.countries.partial.excursions')
                            @endif

                            @if(count($hotels))
                                @include('pages.countries.partial.hotels')
                            @endif

                            @if(count($infos))
                                @include('pages.countries.partial.infos')
                            @endif

                        </div>

                    </div>


                </div>


                <div class="page_site__right">
                    @include('include.menu.country_menu')
                </div>
            </div><!--.page_site__flex-->
        </div>


    </main>

@endsection



