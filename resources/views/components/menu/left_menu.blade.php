<ul class="desktopmenu">
    <li class="desktopmenu__nav_text {{active_linkMenu(asset(config('datastorage.linkTeam'))) }}"><a href="{{ asset(config('datastorage.linkTeam')) }}">О нас</a></li>
    <li class="desktopmenu__nav_text "><a href="#">{{__('Опросы')}}</a></li>

    <li class="desktopmenu__nav_text {{active_linkMenu(asset(config('datastorage.linkContacts'))) }}"><a href="{{ asset(config('datastorage.linkContacts'))}}">{{__('Контаты')}}</a></li>
    <li class="desktopmenu__nav_text {{active_linkMenu(asset('/login')) }}"><a href="{{ asset('/login') }}">{{__('Личный кабинет')}}</a></li>
</ul>
