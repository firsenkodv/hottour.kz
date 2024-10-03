<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    {{ config('google.google_tag.head') }}
    <meta name="csrf-token" content="{{{ csrf_token() }}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])
    <link rel="apple-touch-icon" sizes="180x180" href="{{ config('app.url') }}/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ config('app.url') }}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ config('app.url') }}/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ config('app.url') }}/favicon/site.webmanifest">
    <title>@yield('title', config('seo.seo.title'))</title>
    <meta name="description" content="@yield('description',  config('seo.seo.description'))"/>
    <meta name="keywords" content="@yield('keywords',  config('seo.seo.keywords'))"/>
</head>
<body>
{{ config('google.google_tag.body') }}
    <div class="content_ {{ route_name() }}">
        @include('html.mobile.top')
        <x-message.message/>
        <x-message.message_error/>
        @include('include.header', ['route' => route_name()]) {{--{{ 'Для стиля главной' }}--}}
        <x-menu.menu/>
        @yield('content')
    </div><!--.content_-->

@include('include.footer')
@include('html.mobile.bottom')

@include('html.temp_forms.order_call')
@include('html.temp_forms.pick_tour')
@include('html.temp_forms.pink_tour_order_mini')
@include('html.temp_forms.pick_tour2_responce')
@include('html.temp_forms.subscription_tour')
@include('html.temp_forms.promo')
@include('html.temp_forms.survey')
@include('html.temp_forms.survey_user')
@include('html.modals.gr')
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    @yield('jquery-ui')
    @yield('tourvisor')
    @include('include.connect.connect')
    @include('include.custom_js.custom_js')


</body>
</html>

