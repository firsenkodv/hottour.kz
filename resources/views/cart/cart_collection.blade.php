@extends('layouts.layout')
<x-seo.meta
    title="{{__('Подборка туров')}}"
    description="{{__('Подборка туров')}}"
    keywords="{{__('Подборка туров')}}"
/>
@section('content')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=43db27ba-be61-4e84-b139-ff37ad4802b8&lang=ru_RU" type="text/javascript"></script>
    @include('html.temp_forms.reserve_hotel')
    <main class="pad_t46 pad_b46" id="MainCart">

            <div class="s_page  s_page__tours" id="resultHotel">
                @if($tour_data)
                    @include('cart.partial.hotels', ['tour_data' =>  $tour_data->params, 'favourites' => ''])
                @endif
            </div>
    </main>
@endsection




