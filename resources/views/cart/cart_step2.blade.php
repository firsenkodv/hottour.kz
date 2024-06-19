@extends('layouts.layout')
<x-seo.meta
    title="{{__('Корзина')}}"
    description="{{__('Корзина')}}"
    keywords="{{__('Корзина')}}"
/>
@section('content')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=43db27ba-be61-4e84-b139-ff37ad4802b8&lang=ru_RU" type="text/javascript"></script>
    @include('html.temp_forms.reserve_hotel')
    <main class="pad_t46 pad_b46" id="MainCart">

        @if(cart())
        <div class="block__800">

            <div class="cabinet_radius12_fff">
                <div class="c__title_subtitle pad_b1">
                    <h3 class="F_h1">{{ __('Подборка туров') }}</h3>
                    <div class="F_h2 pad_t5">
                        <span>{{ __('Туры, которые вы сохранили. Пока туры находятся в списке, ссылка на них работает.') }}</span></div>
                </div>
            </div>

@dump($orders)

        </div>




        @endif
    </main>


@endsection




