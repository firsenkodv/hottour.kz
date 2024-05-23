@extends('layouts.layout')
<x-seo.meta
    title="{{($item->metatitle)?:$item->title}}"
    description="{{$item->description}}"
    keywords="{{$item->keywords}}"
/>
@section('content')

    <main class="page_site background_f7f7f7">
        <div class="block countries height_100">

            <div class="page_site__flex height_100">
                <div class="page_site__left">
                    <div class="hbox temp_img">
                        <div class="hbox__top pad_b1">
                            <x-breadcrumb.breadcrumb>
                                <li><span>{{__('Горящие туры')}}</span></li>
                                <li><a href="{{ asset(config('links.link.hottour').'/'.$category->slug) }}">{{ $category->title }}</a></li>
                                <li><span>{{$item->title}}</span></li>
                            </x-breadcrumb.breadcrumb>

                            <h1>{{ ($item->subtitle)?: $item->title }}</h1>
                        </div>

                    </div>


                    <div class="hbox__middle country_page ">

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
                                <img src="{{ asset(intervention('892x516', $item->pageimg1, 'travels')) }}" width="892" height="516" loading="lazy"
                                     alt="{{$item->title}}" />
                            </div>
                        @endif

                        @if($item->text2)
                            <div class="desc_text2 desc">
                                {!!  shortcode($item->text2) !!}
                            </div>
                        @endif

                        @if($item->pageimg2)
                            <div class="pageimg2 pad_t16 pad_b16">

                                <img src="{{ asset(intervention('892x516', $item->pageimg2, 'travels')) }}" width="892" height="516" loading="lazy"
                                     alt="{{ ($item->subtitle)?: $item->title }}" />
                            </div>
                        @endif

                        @if($item->text3)
                            <div class="desc_text3 desc">
                                {!!  shortcode($item->text3) !!}
                            </div>
                        @endif

                    </div>


                </div>
                <div class="page_site__right">@include('include.menu.country_menu')</div>
            </div><!--.page_site__flex-->
        </div>

    </main>

@endsection



