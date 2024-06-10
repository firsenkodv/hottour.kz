@extends('layouts.layout')
<x-seo.meta
title="{{($country->metatitle)?:$country->title}}"
description="{{$country->description}}"
keywords="{{$country->keywords}}"
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
                                <li><span>{{ $country->title }}</span></li>
                            </x-breadcrumb.breadcrumb>

                            <h1>@if($country->imgflag)
                                    <span>
                                        <img class="h1_flag"
                                             src="{{asset('storage/'.$country->imgflag)}}"
                                             width="62"
                                             height="40" loading="lazy" alt="{{$country->title}}"/>
                                        </span>
                                @endif
                                {{ ($country->subtitle)?: $country->title }}

                            </h1>
                        </div>


                    </div>

                    <div class="hbox__submenu">
                        <div class="view_subcategories_countries v_s_c ">
                            <div class="flex v_s_c__flex">

                                <div class="v_s_c__item active"><span>{{ __('О стране') }}</span></div>
                                @foreach($subcountries as $subcountry)
                                    <div class="v_s_c__item"><a
                                            href="{{ asset(route('countries').'/'. $country->slug. '/'. $subcountry->slug) }}">{{ ($subcountry->title_for_menu)?:$subcountry->title  }}</a>
                                    </div>

                                @endforeach

                            </div>
                            <div class="view_subcategories_countries__mobile menu_cab_m__js"></div>


                        </div>
                    </div>
                    <div class="hbox__middle country_page ">

                        @if($country->smalltext)
                            <div class="colorGrey smalltext desc">
                                {!!  $country->smalltext !!}
                            </div>
                        @endif

                        @if($country->text)
                            <div class="desc_text desc">
                                {!!  shortcode($country->text) !!}
                            </div>
                        @endif
                        @if($country->pageimg1)
                            <div class="pageimg pad_t16 pad_b16">
                                <img src="{{asset(intervention('892x516', $country->pageimg1)) }}" width="892" height="516" loading="lazy"
                                     alt="{{$country->title}}">
                            </div>
                        @endif

                        @if($country->text2)
                            <div class="desc_text2 desc">
                                {!!  shortcode($country->text2) !!}
                            </div>
                        @endif

                        @if($country->pageimg2)

                                <div class="pageimg pad_t16 pad_b16">
                                    <img src="{{ asset(intervention('892x516', $country->pageimg2)) }}" width="892" height="516" loading="lazy"
                                         alt="{{ ($country->subtitle)?: $country->title }}" />
                                </div>
                        @endif

                        @if($country->text3)
                            <div class="desc_text3 desc">
                                {!!  shortcode($country->text3) !!}
                            </div>
                        @endif

                    </div>


                </div>
                <div class="page_site__right">@include('include.menu.country_menu')</div>
            </div><!--.page_site__flex-->
        </div>


    </main>


@endsection



