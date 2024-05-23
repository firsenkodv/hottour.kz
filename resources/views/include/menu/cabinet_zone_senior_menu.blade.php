<div class="hbox__submenu hbox__submenuBorder">
    <div class="view_subcategories_countries v_s_c ">
        <div class="flex v_s_c__flex">

            <div class="v_s_c__item {{ active_linkMenu(asset(route('page.senior', ['id' => $item->id])) ) }}"><a href="{{asset(route('page.senior', ['id' => $item->id]))  }}">{{ __('Менеджеры') }}</a></div>

            <div class="v_s_c__item {{ active_linkMenu(asset(route('page.add.manager_from_senior', ['id' => $item->id])) )  }}"><a href="{{asset(route('page.add.manager_from_senior', ['id' => $item->id])) }}">{{ __('Добавить менеджера') }}</a></div>
        </div>
    </div>
</div>
