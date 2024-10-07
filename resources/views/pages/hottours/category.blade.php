@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($category->metatitle))?$category->metatitle:$category->title}}"
    description="{{isset($category->description)? $category->description :''}}"
    keywords="{{isset($category->keywords)? $category->keywords : ''}}"
/>
@section('content')

    <main class="page_site background_f7f7f7">
        <div class="block travelcategory height_100">

            <div class="page_site__flex height_100">
                <div class="page_site__left">
                    <div class="hbox temp_img_cat">
                        <div class="hbox__top pad_b1">
                            <x-breadcrumb.breadcrumb>
                                <li><span>{{__('Горящие туры')}}</span></li>
                            </x-breadcrumb.breadcrumb>

                            <h1> {{ ($category->subtitle)?: $category->title }}</h1>
                        </div>


                        <div class="hbox__middle country_page ">

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
                                    <img src="{{ asset(intervention('892x516', $category->pageimg1, 'travels')) }}"
                                         width="892" height="516" loading="lazy"
                                         alt="{{$category->title}}"/>
                                </div>
                            @endif

                            @if($category->text2)
                                <div class="desc_text2 desc">
                                    {!!  shortcode($category->text2) !!}
                                </div>
                            @endif

                            @if($category->pageimg2)
                                <div class="pageimg2 pad_t16 pad_b16">

                                    <img src="{{ asset(intervention('892x516', $category->pageimg2, 'travels')) }}"
                                         width="892" height="516" loading="lazy"
                                         alt="{{ ($category->subtitle)?: $category->title }}"/>
                                </div>
                            @endif

                            @if($category->text3)
                                <div class="desc_text3 desc">
                                    {!!  shortcode($category->text3) !!}
                                </div>
                            @endif

                        </div>


                        @if($items)
                            <div class="hrow">
                                @foreach($items as $item)

                                    <div class="hcol">
                                        <div class="pc_category2">
                                            <a href="{{ asset(config('links.link.hottour').'/'.$category->slug.'/'. $item->slug) }}">
                                                <img class="pc_category_img" width="430" height="230" loading="lazy"
                                                     src="{{ asset(intervention('430x230', $item->img, 'travels')) }}"
                                                     alt="{{$item->title}}">
                                            </a>
                                            <div class="pc_category2__desc">
                                                <h2>{{$item->title}}</h2>
                                                <div class="pc_c2__desc">
                                                    {!!  $item->smalltext !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $items->withQueryString()->links('pagination::default') }}


                            </div>
                        @endif


                    </div>

                </div>
                <div class="page_site__right">@include('include.menu.country_menu')</div>
            </div><!--.page_site__flex-->
        </div>
    </main>

@endsection

