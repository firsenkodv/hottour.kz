<div class="s_date s_block__3">
    <div class="s_date__label s_label">{{ __('Интервал дат вылета') }}</div>
    <div class="date_input">
        <input type="text" class="datepicker-range" value="{{rusdate(strtotime($daterange[0]))}} - {{ rusdate(strtotime($daterange[1]))}}" readonly="">
        <input type="text" class="datepicker-hidden" name="daterange" value="{{ date('d.m.Y', strtotime($daterange[0]))}} - {{ date('d.m.Y', strtotime($daterange[1]))}}" data-max_span="13" readonly="">
    </div>
</div>
