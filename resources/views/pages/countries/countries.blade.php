@extends('layouts.layout')
<x-seo.meta/>
@section('content')

    <main class="page_site background_f7f7f7">
        <div class="block countries height_100">

            <div class="page_site__flex height_100">
                <div class="page_site__left">
                    <div class="hbox temp_img">
                        <div class="hbox__top pad_b1">
                            <x-breadcrumb.breadcrumb>
                                <li><span>{{__('Страны')}}</span></li>
                            </x-breadcrumb.breadcrumb>

                            <h1>{{ __('Страны') }}</h1>
                        </div>
                        <div class="hrow pad_t40_important">
                            @foreach($countries as $country)

                                <div class="hcol">
                                    <div class="pc_category">
                                        <a href="{{ asset(config('links.link.countries').'/'.$country->slug) }}">
                                            <img class="pc_category_img" width="430" height="230" loading="lazy"
                                                 src="{{ asset(intervention('430x230', $country->img)) }}"
                                                 alt="{{$country->title}}">
                                            <img class="pc_category_flag"
                                                 src="{{asset('storage/'.$country->imgflag)}}"
                                                 width="30"
                                                 height="20" loading="lazy" alt="{{$country->title}}">
                                            <h4>{{$country->title}}</h4>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                                {{ $countries->withQueryString()->links('pagination::default') }}


                        </div>

                    </div>

                </div>
                <div class="page_site__right">@include('include.menu.country_menu')</div>
            </div><!--.page_site__flex-->
        </div>
    </main>

@endsection

