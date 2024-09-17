@extends('layouts.layout')
<x-seo.meta
    title="{{($category->metatitle)?:$category->title}}"
    description="{{$category->description}}"
    keywords="{{$category->keywords}}"
/>
@section('content')
    <main class="page_site background_f7f7f7">
        <div class="block countries height_100">

            <div class="page_site__flex height_100">
                <div class="page_site__left">
                    <div class="hbox temp_img">
                        <div class="hbox__top pad_b1">
                            <x-breadcrumb.breadcrumb>
                                <li><span>{{$category->title}}</span></li>
                            </x-breadcrumb.breadcrumb>

                            <h1>{{ ($category->subtitle)?: $category->title }}</h1>
                        </div>
                    </div>

                    <div class="hbox__middle country_page pad_t1_important">
                        @if($category->calc)
                            <x-calc.calc :data="(isset($calc)? $calc :'')"/>
                        @endif
                        @if($category->smalltext)
                            <div class="colorGrey smalltext desc">
                                {!!  $category->smalltext !!}
                            </div>
                        @endif

                        @if($category->text)
                            <div class="desc_text desc">
                                {!!  shortcode($category->text) !!}
                            </div>
                        @endif

                        @if($category->pageimg1)
                            <div class="pageimg pad_t16 pad_b16">

                                <img src="{{ asset(intervention('892x516', $category->pageimg1, 'dumps')) }}"
                                     width="892" height="516" loading="lazy"
                                     alt="{{$category->title}}">
                            </div>
                        @endif

                        @if($category->text2)
                            <div class="desc_text2 desc">
                                {!!  shortcode($category->text2) !!}
                            </div>
                        @endif

                        @if($category->pageimg2)
                            <div class="pageimg2 pad_t16 pad_b16">
                                <img src="{{ asset(intervention('892x516', $category->pageimg2, 'dumps')) }}"
                                     width="892" height="516" loading="lazy"
                                     alt="{{ ($category->subtitle)?: $category->title }}">
                            </div>
                        @endif

                        @if($category->text3)
                            <div class="desc_text3 desc">
                                {!!  shortcode($category->text3) !!}
                            </div>
                        @endif

                    </div>

                    <div class="hbox temp_img_tree">

                        @if(count($publs))
                            @if($category->temp)
                                @include('pages.dumps.partial.publs_img')
                            @else
                                @include('pages.dumps.partial.publs')
                            @endif
                        @endif


                    </div>


                </div>


                <div class="page_site__right">@include('include.menu.country_menu')</div>
            </div><!--.page_site__flex-->
        </div>


    </main>

@endsection




