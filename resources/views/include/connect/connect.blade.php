@include('include.connect.cart.cart')


<div class="connection_fixed">
<div class="connection_absol">
    <a href="#pick_tour" data-fancybox="" data-touch="false" class="con_item con_item__1">
        <div class="con_item__left"><span>{{__('Заказать тур')}}</span></div>
        <div class="con_item__right"><div class="con_item__palm"></div></div>

    </a>
<a href="#pick_tour2_responce" data-fancybox="" data-touch="false" class="con_item con_item__2">
        <div class="con_item__left"><span>{{__('Оставить отзыв')}}</span></div>
        <div class="con_item__right"><div class="con_item__mail"></div></div>

    </a>
<a href="#subscription_tour" data-fancybox="" data-touch="false" class="con_item con_item__3">
        <div class="con_item__left"><span>{{__('Подписаться на горящие туры')}}</span></div>
        <div class="con_item__right"><div class="con_item__fire"></div></div>

    </a>
<a href="tel:{!! config('site.setting.phone2') !!}"  class="con_item con_item__4">
        <div class="con_item__left"><span>{{__('Позвонить')}}</span></div>
        <div class="con_item__right"><div class="con_item__phone"></div></div>

    </a>
<a href="{!! config('site.setting.whatsapp') !!}" class="con_item con_item__5">
        <div class="con_item__left"><span>{{__('Написать в WhatsApp')}}</span></div>
        <div class="con_item__right"><div class="con_item__whatsapp"></div></div>

    </a>
<a href="{!! config('site.setting.telegram') !!}"  class="con_item con_item__6">
        <div class="con_item__left"><span>{{__('Написать в Telegram')}}</span></div>
        <div class="con_item__right"><div class="con_item__telegram"></div></div>

</a>

</div>
</div>
    <div class="connection">
        <div class="connect_send send"></div>
    </div>



