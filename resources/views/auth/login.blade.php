@extends('layouts.layout')
@section('title', ($seo_title) ?? __('Вход по телефону') )
@section('description', ($seo_description)?? __('Вход по телефону') )
@section('keywords', ($seo_keywords)?? __('Вход по телефону') )
@section('content')

    <div class="pageRegister pages_auth">

        <div class="kab_flex axeld_flex axeld100">
            <div class="kab_left color_fff">
                @include('auth.authdesc.desc')
            </div><!--.kab_left-->
            <div class="kab_right">

                @include('auth.forms.f-login')


            </div><!--.kab_right-->
        </div>

    </div>

@endsection
