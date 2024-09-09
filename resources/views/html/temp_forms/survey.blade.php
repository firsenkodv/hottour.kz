    <div class="F_form  F_form_survey" style="display: none" id="survey" data-token="{{ csrf_token() }}">
        <x-forms.loader class="br_12"/>
        @include('html.modals.responce.responce_survey')
        <div class="F_form__body new__temp">
            <div class="new__temp_top">
                <div class="F_form__flex">
                    <div class="F_form__left">
                        <div class="F_h1"><span>{{__('Спасибо за вашу оценку!')}}</span></div>
                        <div class="F_desc F_desc_top">{{ __('Что Вам не понравилось?') }}</div>

                        <div class="survey__c_responce">
                            <div class="survey__checkbox">
                                    <div class="survey__checkbox_checkbox">
                                        <input class="checkbox-flip checkbox_change" name="survey_checkbox" data-checkbox="1" value="1" type="checkbox" id="check_1">
                                        <label for="check_1"><span></span></label>
                                    </div>
                                        <div class="survey__checkbox_text">
                                            <span>Скорость загрузки туров</span>
                                        </div>
                            </div>

                            <div class="survey__checkbox">
                                    <div class="survey__checkbox_checkbox">
                                        <input class="checkbox-flip checkbox_change" name="survey_checkbox" data-checkbox="2" value="2" type="checkbox" id="check_2">
                                        <label for="check_2"><span></span></label>
                                    </div>
                                        <div class="survey__checkbox_text">
                                            <span>Дизайн</span>
                                        </div>
                            </div>

                            <div class="survey__checkbox">
                                    <div class="survey__checkbox_checkbox">
                                        <input class="checkbox-flip checkbox_change" name="survey_checkbox" data-checkbox="3" value="3" type="checkbox" id="check_3">
                                        <label for="check_3"><span></span></label>
                                    </div>
                                        <div class="survey__checkbox_text">
                                            <span>Результаты</span>
                                        </div>
                            </div>

                            <div class="survey__checkbox">
                                    <div class="survey__checkbox_checkbox">
                                        <input class="checkbox-flip checkbox_change" name="survey_checkbox" data-checkbox="4" value="4" type="checkbox" id="check_4">
                                        <label for="check_4"><span></span></label>
                                    </div>
                                        <div  class="survey__checkbox_text">
                                            <span>Мало информации о туре</span>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div><!--.F_form__flex-->
            </div><!--.new__temp_top-->

            <div class="text_input ">
                <x-forms.trick-button class="button_normal survey_mini_js">
                    {{__('Отправить')}}
                </x-forms.trick-button>
            </div>


        </div><!--.F_form__body-->
    </div><!--.F_form-->
