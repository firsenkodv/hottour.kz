@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')
    <main class="page_search__wrapper">
        @include('include.search.select.select_search')
        @include('include.module.survey_user')
        @include('include.search.find-tour_search')
        <div class="search_loader">
            <div class="s_progress display_none"><span class="progress"></span></div>
            <div id="search_loader"><span class="loader2"></span></div>
        </div>

        <div class="s_page s_page__tours" id="resultHotel"></div>

    </main>
@endsection



