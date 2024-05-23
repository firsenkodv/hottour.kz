<div class="mob_menu_content">

    <div class="mob_menu_content_absol">
        <div class="m_m_cont_top m_m_cont_top1">
            <span class="m_m_top_label">{{ __('Меню') }}</span>
            <span class="m_m_top_close"></span>
        </div>
        <div class="m_m_cont_top m_m_cont_top2">
        <span class="m_m_top_lang">
            @include('include.translate.translate')
        </span><!--.m_m_top_lang-->
        </div>
            <div class="fMenu"></div>

    </div>


</div>

<div class="mobile_menu">
    <div class="mob_flex">
        <a class="m_f m_f1" href="/find-tour">
            <div class="m_img"></div>
            <span>{{ __('Поиск') }}</span>
        </a>
        <a class="m_f m_f2  active " href="/">
            <div class="m_img"></div>
            <span>{{ __('Главная') }}</span>
        </a>
        <div class="m_f m_f3">
            <div class="m_img"></div>
            <p>{{ __('Меню') }}</p>
        </div>
        <a class="m_f m_f4" href="{{ asset(config('links.link.contacts')) }}">
            <div class="m_img"></div>
            <span>{{ __('Контакты') }}</span>
        </a>

        <a class="m_f m_f5" href="/login">
            <div class="m_img"></div>
            <span>{{ __('Профиль') }}</span>
        </a>

    </div>
</div>
