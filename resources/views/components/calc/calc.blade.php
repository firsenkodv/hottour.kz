<div class="mod_axeld_credit mod_axeld_credit_192"
     data-banks=' {"banks" : {@foreach(config('site.calculator-credit.banks') as $k => $bank)"bank{{$k++}}" : {"title": "{{  $bank['title']}}","procent": "{{  $bank['procent']}}","koff" : {@foreach($bank['koff'] as $option)"{{$option['month']}}" : "{{$option['procent']}}&{{$option['month_rus']}}"@if(!$loop->last),@endif @endforeach }}@if(!$loop->last),@endif @endforeach}}'>


    <div id="loader_wrapper" class="loader_wrapper active ">
        <x-forms.loader class="br_12 active"/>
    </div>
    <div class="mod_axeld_credit_calculator__form" style="margin-bottom: 40px">

        <div class="mod_axeld_credit_calculator__h3 desc_static">
            <p class="colorGrey pad_t16 pad_b6">{{ __('Покажем точную ставку, сумму и платеж по кредиту от нескольких банков') }}</p>
        </div>

        {{--   @dd(config('site.calculator-credit.banks'))--}}


        <div class="mod_axeld_credit_calculator__block mod_axeld_credit_calculator__block_1">
            <div class="selectBox" style="z-index: 11;">
                <!-- стрелка по правому краю для анимации, показывающая, что div-блок можно развернуть -->
                <img
                    src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTMiIGhlaWdodD0iOCIgdmlld0JveD0iMCAwIDEzIDgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik02LjEwNzA2IDcuNzgwMjlDNi4yNzc5OCA3Ljc4MDI5IDYuNDQ4ODMgNy43MTE5MyA2LjU2NTA5IDcuNTgyMDJMMTEuODU2MSAyLjE2MTE0QzExLjk3MjMgMi4wNDQ5MiAxMi4wNDA3IDEuODk0NTMgMTIuMDQwNyAxLjcyMzY0QzEyLjA0MDcgMS4zNjgxNiAxMS43NzQgMS4wOTQ3MyAxMS40MTg2IDEuMDk0NzNDMTEuMjQ3NyAxLjA5NDczIDExLjA5MDUgMS4xNjMwOSAxMC45NzQyIDEuMjcyNDZMNS43Mzc5MSA2LjYyNUg2LjQ2OTM3TDEuMjMzMDMgMS4yNzI0NkMxLjEyMzY1IDEuMTYzMDkgMC45NjY0MjggMS4wOTQ3MyAwLjc4ODY5OCAxLjA5NDczQzAuNDMzMjI3IDEuMDk0NzMgMC4xNjY2MjYgMS4zNjgxNiAwLjE2NjYyNiAxLjcyMzY0QzAuMTY2NjI2IDEuODk0NTMgMC4yMzQ5ODYgMi4wNDQ5MiAwLjM1MTE5NiAyLjE2Nzk3TDUuNjQyMjEgNy41ODIwMkM1Ljc3MjEgNy43MTE5MyA1LjkyOTMyIDcuNzgwMjkgNi4xMDcwNiA3Ljc4MDI5WiIgZmlsbD0iIzE3MTYxNiIvPgo8L3N2Zz4K"
                    alt="" width="15px" class="arrow">
                <!-- текст, который будет виден в боксе -->
                <p data-label="{{ __('Банк') }}" class="valueTag valueTag_Bank">{{ __('Банк') }}</p>
                <!-- тот самый выпадающий список -->
                <ul class="selectMenuBox selectMenuBox_Bank">

                    @foreach(config('site.calculator-credit.banks') as $k => $bank)

                        <li data-bank="bank{{$k++}}" data-title="{{$bank['title']}}" data-procent="{{$bank['procent']}}"
                            class="option">{{$bank['title']}}</li>

                    @endforeach
                </ul>
            </div> <!-- .selectBox  -->
        </div>

        <div class="mod_axeld_credit_calculator__block mod_axeld_credit_calculator__block_2">
            <div class="selectBox" style="z-index: 11;">
                <!-- стрелка по правому краю для анимации, показывающая, что div-блок можно развернуть -->
                <img
                    src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTMiIGhlaWdodD0iOCIgdmlld0JveD0iMCAwIDEzIDgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik02LjEwNzA2IDcuNzgwMjlDNi4yNzc5OCA3Ljc4MDI5IDYuNDQ4ODMgNy43MTE5MyA2LjU2NTA5IDcuNTgyMDJMMTEuODU2MSAyLjE2MTE0QzExLjk3MjMgMi4wNDQ5MiAxMi4wNDA3IDEuODk0NTMgMTIuMDQwNyAxLjcyMzY0QzEyLjA0MDcgMS4zNjgxNiAxMS43NzQgMS4wOTQ3MyAxMS40MTg2IDEuMDk0NzNDMTEuMjQ3NyAxLjA5NDczIDExLjA5MDUgMS4xNjMwOSAxMC45NzQyIDEuMjcyNDZMNS43Mzc5MSA2LjYyNUg2LjQ2OTM3TDEuMjMzMDMgMS4yNzI0NkMxLjEyMzY1IDEuMTYzMDkgMC45NjY0MjggMS4wOTQ3MyAwLjc4ODY5OCAxLjA5NDczQzAuNDMzMjI3IDEuMDk0NzMgMC4xNjY2MjYgMS4zNjgxNiAwLjE2NjYyNiAxLjcyMzY0QzAuMTY2NjI2IDEuODk0NTMgMC4yMzQ5ODYgMi4wNDQ5MiAwLjM1MTE5NiAyLjE2Nzk3TDUuNjQyMjEgNy41ODIwMkM1Ljc3MjEgNy43MTE5MyA1LjkyOTMyIDcuNzgwMjkgNi4xMDcwNiA3Ljc4MDI5WiIgZmlsbD0iIzE3MTYxNiIvPgo8L3N2Zz4K"
                    alt="arrow" width="15px" class="arrow">
                <!-- текст, который будет виден в боксе -->
                <p data-label="{{ __('Кредит') }}" class="valueTag valueTag_credit">{{ __('Кредит') }}</p>
                <!-- тот самый выпадающий список -->
                <ul class="selectMenuBox selectMenuBox_Credit">

                    @foreach(config('site.calculator-credit.countries') as $k => $country)
                        <li class="option">{{ $country['title'] }}</li>
                    @endforeach

                </ul>
            </div> <!-- .selectBox  -->
        </div>


        <div
            class="mod_axeld_credit_calculator__block mod_axeld_credit_calculator__block_3 mod_axeld_credit_calculator__flex">

            <div class="m_c__c_50 mod_axeld_credit_calculator__slider___block">
                <input type="text" class="mod_c_c_val" data-min="0" data-max="10000000" value="300000">
                <div
                    class="mod_axeld_credit_calculator__slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
      style="left: 2.0202%;"></span></div>
            </div><!--.mod_axeld_credit_calculator__slider___block-->

            <div class="m_c__c_50 mod_axeld_credit_calculator__selectBox___block">

                <div class="selectBox" style="z-index: 98;">
                    <!-- стрелка по правому краю для анимации, показывающая, что div-блок можно развернуть -->
                    <img
                        src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTMiIGhlaWdodD0iOCIgdmlld0JveD0iMCAwIDEzIDgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik02LjEwNzA2IDcuNzgwMjlDNi4yNzc5OCA3Ljc4MDI5IDYuNDQ4ODMgNy43MTE5MyA2LjU2NTA5IDcuNTgyMDJMMTEuODU2MSAyLjE2MTE0QzExLjk3MjMgMi4wNDQ5MiAxMi4wNDA3IDEuODk0NTMgMTIuMDQwNyAxLjcyMzY0QzEyLjA0MDcgMS4zNjgxNiAxMS43NzQgMS4wOTQ3MyAxMS40MTg2IDEuMDk0NzNDMTEuMjQ3NyAxLjA5NDczIDExLjA5MDUgMS4xNjMwOSAxMC45NzQyIDEuMjcyNDZMNS43Mzc5MSA2LjYyNUg2LjQ2OTM3TDEuMjMzMDMgMS4yNzI0NkMxLjEyMzY1IDEuMTYzMDkgMC45NjY0MjggMS4wOTQ3MyAwLjc4ODY5OCAxLjA5NDczQzAuNDMzMjI3IDEuMDk0NzMgMC4xNjY2MjYgMS4zNjgxNiAwLjE2NjYyNiAxLjcyMzY0QzAuMTY2NjI2IDEuODk0NTMgMC4yMzQ5ODYgMi4wNDQ5MiAwLjM1MTE5NiAyLjE2Nzk3TDUuNjQyMjEgNy41ODIwMkM1Ljc3MjEgNy43MTE5MyA1LjkyOTMyIDcuNzgwMjkgNi4xMDcwNiA3Ljc4MDI5WiIgZmlsbD0iIzE3MTYxNiIvPgo8L3N2Zz4K"
                        alt="arrow" width="15px" class="arrow">
                    <!-- текст, который будет виден в боксе -->
                    <p data-label="{{ __('Срок') }}" class="valueTag valueTag_Month">{{ __('Срок') }}</p>
                    <!-- тот самый выпадающий список -->
                    <ul class="selectMenuBox selectMenuBox_Month">

                    </ul>
                </div> <!-- .selectBox  -->

            </div><!--.mod_axeld_credit_calculator__selectBox___block-->
        </div>
        <div class="mod_axeld_credit__hr">
            <hr>
        </div>

        <button class="button button_normal w_30 mod_axeld_credit__start">
            <span>{{__('Расчитать')}}</span>
        </button>

    </div><!--.mod_axeld_credit_calculator__form-->


    <div class="mod_axeld_credit_calculator__result">
        <h2 class="mod_axeld_credit_calculator__h2">{{ __('Результаты расчета') }} <span><a
                    class="mod_axeld_credit__redirect axeld_button "
                    href="{{ url()->previous() }}">{{ __('Пересчитать') }}</a></span></h2>


        <div class="mod_axeld_cс">

            <div class="mod_axeld_cс__bank_wr">
            <span class="mod_axeld_cс__bank mod_axeld_cс__bank__js">Название банка</span> /
            <span class="mod_axeld_cс__country  mod_axeld_cс__country__js">Страна</span>
            </div>
        </div>


        <div class="mod_axeld_credit_calculator__result___wrapp">
            <div class="mod_axeld_credit__labels">
                <div class="mod_axeld_credit__label">
                    <div class="m_a_green"></div>
                    {{ __('Кредит') }}
                </div>
                <div class="mod_axeld_credit__label">
                    <div class="m_a_orange"></div>
                    {{ __('Переплата') }}
                </div>


            </div>

            <div class="mod_axeld_progressbar mod_axeld_progressbar_192"></div>
        </div>

        <div class="mod_axeld_credit_calculator__result___items">

            <div class="mod_axeld_credit_calculator__result___item mod_axeld_c__item_1">
                <div class="m_a_c__label">{{__('Ставка')}}</div>
                <div class="m_a_c__stavka m_a_c__result">-</div>
            </div>
            <div class="mod_axeld_credit_calculator__result___item mod_axeld_c__item_1-1">
                <div class="m_a_c__label">{{ __('Срок') }}</div>
                <div class="m_a_c__srok m_a_c__result">-</div>
            </div>
            <div class="mod_axeld_credit_calculator__result___item mod_axeld_c__item_2">
                <div class="m_a_c__label">{{ __('Ежемесячный платеж') }}</div>
                <div class="m_a_c__platej m_a_c__result">-</div>
            </div>
            <div class="mod_axeld_credit_calculator__result___item mod_axeld_c__item_3">
                <div class="m_a_c__label">{{ __('Переплата по кредиту') }}</div>
                <div class="m_a_c__pereplata m_a_c__result">-</div>
            </div>
            <div class="mod_axeld_credit_calculator__result___item mod_axeld_c__item_4">
                <div class="m_a_c__label">{{ __('Общая выплата') }}</div>
                <div class="m_a_c__vuplata m_a_c__result">-</div>
            </div>
            <div class="m_a_c__price display_none"></div>
        </div>
        <!--@--.mod_axeld_credit_calculator__result___items---->
        <div class="temp_forms_order_mini pad_t16">
            @include('html.temp_forms.calc')
        </div>


    </div><!--.mod_axeld_credit_calculator__result-->
</div>
@section('jquery-ui')
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
@endsection




