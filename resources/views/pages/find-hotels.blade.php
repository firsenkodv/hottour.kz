@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')
    <main class="page_search__wrapper">
        @include('include.search.select.select_search')
        @include('include.search.find-hotel_search')
        <div class="s_page">
            <div class="s_progress"><span class="progress"></span></div>
            <div id="search_loader"><span class="loader"></span></div>
        </div>
        <div class="s_page s_page__hotel s_page__tours" id="resultHotel"></div>
    </main>
@endsection


