<nav>
    <ul class="top_menu">
        <li class="{{ active_linkMenu(env("APP_URL")) }}"><a class="add__mobile_menu  {{ active_linkMenu(env("APP_URL")) }}" href="{{env("APP_URL")}}">{{ __('Главная') }}</a></li>

        <li class="{{ active_linkMenu(asset(config('links.link.search')) , 'find') }}
                   {{ active_linkMenu(asset(config('links.link.search_new')) , 'find') }}
                   {{ active_linkMenu(asset(config('links.link.hotels')) , 'find') }}
                   "><a class="add__mobile_menu {{ active_linkMenu(asset(config('links.link.search')), 'find') }}" href="{{ route('search_tours') }}">{{ __('Поиск тура') }}</a>

        </li>

        <li class="{{ active_linkMenu(asset(config('links.link.countries')), 'find') }}"><a class="add__mobile_menu {{ active_linkMenu(asset(config('links.link.countries')), 'find') }}" href="{{ route('countries') }}">{{ __('Страны') }}</a>

            <ul class="submenu menu_400_px">
                <div class="display_flex">
                <div class="submenu__left">
                    @foreach($top_menu__left as $menu)
                        <li class="{{ active_linkMenu(asset(route('countries') .'/'. $menu['slug']), 'find') }}"><a href="{{ asset(route('countries') .'/'. $menu['slug'])  }}" class="flag"><span><img src="{{asset('storage/'. $menu['imgflag'])}}" width="28" height="18" alt=""></span> {{ $menu['title']  }}</a></li>
                    @endforeach
                </div>
                <div class="submenu__right">
                    @foreach($top_menu__right as $menu)
                        <li class="{{ active_linkMenu(asset(route('countries') .'/'. $menu['slug'])) }}"><a href="{{ asset(route('countries') .'/'. $menu['slug'])  }}" class="flag"><span><img src="{{asset('storage/'. $menu['imgflag'])}}" width="28" height="18" alt=""></span> {{ $menu['title']  }}</a></li>
                    @endforeach

                </div>
                </div>
                <li class="submenu__all-country pad_t7">
                    <a href="{{ route('countries') }}"><span>{{ __('Смотреть все страны') }}</span></a>
                </li>
            </ul>
        </li>
        <li class="{{ active_linkMenu(asset(config('links.link.hottour')), 'find') }}"><a href="#" class="down fire">{{ __('Горящие туры') }}</a>

            <ul class="submenu">
                @foreach($top_menuhottour as $menu)
                    <li class="{{ active_linkMenu(asset(config('links.link.hottour'). '/' . $menu['slug']), 'find') }}"><a class="add__mobile_menu {{ active_linkMenu(asset(config('links.link.hottour'). '/' . $menu['slug']), 'find') }}" href="{{ asset(config('links.link.hottour'). '/' . $menu['slug'])  }}">{{ $menu['title']  }}</a></li>
                @endforeach
            </ul>
        </li>

        <li  class="{{ active_linkMenu(asset(config('links.link.tours')), 'find') }}"><a href="" class="down">Туры</a>
            <ul class="submenu">
                @foreach($top_menutours as $menu)
                    <li class="{{ active_linkMenu(asset(config('links.link.tours'). '/' . $menu['slug']), 'find') }}"><a class="add__mobile_menu {{ active_linkMenu(asset(config('links.link.tours'). '/' . $menu['slug']), 'find') }}" href="{{ asset(config('links.link.tours'). '/' . $menu['slug'])  }}">{{ $menu['title']  }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="{{ active_linkMenu(asset('/cruises')) }}"><a  class="add__mobile_menu {{ active_linkMenu(asset('/cruises')) }}"  href="{{asset('/cruises')}}">{{ __('Круизы') }}</a></li>
        <li class="{{ active_linkMenu(asset(config('links.link.dump')), 'find') }}"><a href="#" class="down">{{ __('Полезное') }}</a>
            <ul class="submenu">
                @foreach($top_menudumps as $menu)
                    <li class="{{ active_linkMenu(asset(config('links.link.dump'). '/' . $menu['slug']), 'find') }}"><a class="add__mobile_menu {{ active_linkMenu(asset(config('links.link.dump'). '/' . $menu['slug']), 'find') }}"  href="{{ asset(config('links.link.dump'). '/' . $menu['slug'])  }}">{{ $menu['title']  }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="{{ active_linkMenu(asset(config('links.link.dump2')), 'find') }}"><a href="#" class="down">{{ __('О нас') }}</a>
            <ul class="submenu">
                @foreach($top_menudump2s as $menu)
                    <li class="{{ active_linkMenu(asset(config('links.link.dump2'). '/' . $menu['slug']), 'find') }}"><a class="add__mobile_menu {{ active_linkMenu(asset(config('links.link.dump2'). '/' . $menu['slug']), 'find') }}"  href="{{ asset(config('links.link.dump2'). '/' . $menu['slug'])  }}">{{ $menu['title']  }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="{{ active_linkMenu(asset(config('links.link.contacts'))) }}"><a class="add__mobile_menu {{ active_linkMenu(asset(config('links.link.contacts'))) }}"  href="{{ asset(config('links.link.contacts')) }}" class="down">{{ __('Контакты') }}</a>

    </ul>
</nav>
