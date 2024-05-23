<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Pages\MoonshineSettingPage;
use App\MoonShine\Pages\ReplacementPage;
use App\MoonShine\Resources\CompanyResource;
use App\MoonShine\Resources\ContactResource;
use App\MoonShine\Resources\CustomerHotTourResource;
use App\MoonShine\Resources\Dump2Resource;
use App\MoonShine\Resources\DumpResource;
use App\MoonShine\Resources\HotCategoryResource;
use App\MoonShine\Resources\HotelResource;
use App\MoonShine\Resources\InfoResource;
use App\MoonShine\Resources\Menudump2Resource;
use App\MoonShine\Resources\MenudumpResource;
use App\MoonShine\Resources\MenuhottourResource;
use App\MoonShine\Resources\MenuResource;
use App\MoonShine\Resources\MenutourResource;
use App\MoonShine\Resources\ModuleResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\PublResource;
use App\MoonShine\Resources\ReplacementResource;
use App\MoonShine\Resources\ResortResource;
use App\MoonShine\Resources\ExcursionResource;
use App\MoonShine\Resources\RoomResource;
use App\MoonShine\Resources\SeoResource;
use App\MoonShine\Resources\TourResource;
use App\MoonShine\Resources\TourvisorCountryResource;
use App\MoonShine\Resources\TravelcategoryResource;
use App\MoonShine\Resources\TravelitemResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
                MenuItem::make(
                    static fn() => __('Пользователи'),
                    new UserResource()
                )->icon('heroicons.outline.flag'),
            ]),

            MenuGroup::make(static fn() => __('Категории'), [

                MenuItem::make(
                    static fn() => __('Страны'),
                    new HotCategoryResource()
                )->icon('heroicons.outline.flag'),

                MenuItem::make(
                    static fn() => __('Горящие туры'),
                    new TravelcategoryResource()
                )->icon('heroicons.outline.fire'),

                MenuItem::make(
                    static fn() => __('Tуры'),
                    new TourResource()
                )->icon('heroicons.outline.list-bullet'),

                MenuItem::make(
                    static fn() => __('Полезное'),
                    new DumpResource()
                )->icon('heroicons.outline.document-text'),

                MenuItem::make(
                    static fn() => __('О нас'),
                    new Dump2Resource()
                )->icon('heroicons.outline.currency-dollar'),

            ]),

            MenuGroup::make(static fn() => __('Материалы'), [

                MenuItem::make(
                    static fn() => __('Курорты'),
                    new ResortResource()
                )->icon('heroicons.sun'),

                MenuItem::make(
                    static fn() => __('Отели'),
                    new HotelResource()
                )->icon('heroicons.building-office'),

                MenuItem::make(
                    static fn() => __('Экскурсии'),
                    new ExcursionResource()
                )->icon('heroicons.ticket'),

                MenuItem::make(
                    static fn() => __('Полезное'),
                    new InfoResource()
                )->icon('heroicons.information-circle'),

                MenuItem::make(
                    static fn() => __('Горящие туры'),
                    new TravelitemResource()
                )->icon('heroicons.fire'),

                MenuItem::make(
                    static fn() => __('Статьи,Услуги...'),
                    new PublResource()
                )->icon('heroicons.newspaper'),

                MenuItem::make(
                    static fn() => __('Отзывы,О нас...'),
                    new CompanyResource()
                )->icon('heroicons.newspaper'),

                MenuItem::make(
                    static fn() => __('Страницы'),
                    new PageResource()
                )->icon('heroicons.bars-3'),
                MenuItem::make(
                    static fn() => __('Контакты'),
                    new ContactResource()
                )->icon('heroicons.outline.map-pin'),


            ]),


            MenuGroup::make(static fn() => __('Меню'), [
                MenuItem::make(
                    static fn() => __('Меню стран'),
                    new MenuResource()
                )->icon('heroicons.bars-3'),

                MenuItem::make(
                    static fn() => __('Меню горящих туров'),
                    new MenuhottourResource()
                )->icon('heroicons.bars-3'),

                MenuItem::make(
                    static fn() => __('Меню туров'),
                    new MenutourResource()
                )->icon('heroicons.bars-3'),

                MenuItem::make(
                    static fn() => __('Меню полезное'),
                    new MenudumpResource()
                )->icon('heroicons.bars-3'),
                MenuItem::make(
                    static fn() => __('Меню о нас'),
                    new Menudump2Resource()
                )->icon('heroicons.bars-3'),

            ]),


            MenuGroup::make(static fn() => __('Служебные'), [

                MenuItem::make(
                    static fn() => __('SEO'),
                    new SeoResource()
                )->icon('heroicons.outline.bug-ant'),

                MenuItem::make(
                    static fn() => __('Замены'),
                    new ReplacementPage()
                )->icon('heroicons.arrow-path'),
                MenuItem::make(
                    static fn() => __('Кредитный калькулятор'),
                    new ModuleResource()
                )->icon('heroicons.calculator'),
                MenuItem::make(
                    static fn() => __('API Горящие туры'),
                    new CustomerHotTourResource()
                )->icon('heroicons.fire'),
                MenuItem::make(
                    static fn() => __('API  Tourvisor'),
                    new TourvisorCountryResource()
                )->icon('heroicons.outline.flag'),

                MenuItem::make(
                    static fn() => __('Настройки'),
                    new MoonshineSettingPage()
                )->icon('heroicons.cog'),



            ]),
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
