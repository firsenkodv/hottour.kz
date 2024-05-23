<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\UserRole;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Heading;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Password;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Fields\Preview;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';
    protected string $column = 'name';

    protected string $sortColumn = 'name';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Имя', 'name'),
            Text::make('Email', 'email'),
            Text::make('Телефон', 'phone'),
        ];
    }



    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),

            Image::make(__('Аватар'), 'avatar')
                ->disk('user')
            ,

            Text::make(__('Имя'), 'name')->required(),
            Text::make(__('Email'), 'email')->required(),
            Text::make(__('Телефон'), 'phone')->required(),

            Switcher::make('Публикация', 'published')->updateOnPreview(),


        ];
    }

    /**
     * @return //array, выводим full
     */
    public function formFields(): array
    {
        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Общие настройки'), [
                        Grid::make([
                            Column::make([


                                Collapse::make('Username', [
                                    Text::make('Имя', 'name')->required()->locked(),
                                    Text::make('Телефон', 'phone')->locked(),
                                ]),
                                Collapse::make('Email', [
                                    Text::make('Email', 'email')
                                    ->locked()
                                //   Image::make(__('Аватар'), 'avatar')->disk('user'),
                                ]),


                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Бонусы', [
                                    Text::make('Бонус ', 'bonus'),
                                    Text::make('Балл', 'ball'),
                                    Text::make('Кэшбек', 'cashback'),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ]),

                                BelongsTo::make('Роль', 'parent', resource: new UserResource())->nullable()->searchable(),


                                Date::make(__('День рождения '), 'birthdate')
                                    ->format("d.m.Y")
                                    ->default(now()->toDateTimeString())
                                    ->sortable(),


                            ])
                                ->columnSpan(6)

                        ]),
                        Divider::make(),

                    ]),


                    Tab::make(__('moonshine::ui.resource.password'), [
                        Heading::make('Change password'),

                        Password::make(__('moonshine::ui.resource.password'), 'password')
                            ->customAttributes(['autocomplete' => 'new-password'])
                            ->hideOnIndex()
                            ->eye(),

                        PasswordRepeat::make(__('moonshine::ui.resource.repeat_password'), 'password_repeat')
                            ->customAttributes(['autocomplete' => 'confirm-password'])
                            ->hideOnIndex()
                            ->eye(),
                    ]),
                ]),


            ]),
        ];


    }


    /**
     * @return //array, добавим кнопок для фильтрации
     */
    public function addQueryTags()
    {
      $users_roles = UserRole::query()->get();

        $QueryTag[0] = QueryTag::make(
            __('Все'),
            function  (Builder $query)  {
                return $query;
            }
        )->icon('heroicons.banknotes');

        foreach ($users_roles as $role) {
            $QueryTag[] = QueryTag::make(
                $role->name,
                function  (Builder $query)   use ($role) {

                    return $query->where('user_role_id', $role->id);
                }
            )->icon('heroicons.tag');
        }

        return $QueryTag;

    }


    /**
     * @return //кнопки фильтрации
     */
    public function queryTags(): array
    {


        return $this->addQueryTags();
    }


    public function rules(Model $item): array
    {
        return [
            'name' => 'max:50',
            'email' => 'max:50',
            'password' => $item->exists
                ? 'sometimes|nullable|min:5|required_with:password_repeat|same:password_repeat'
                : 'required|min:5|required_with:password_repeat|same:password_repeat',
        ];
    }
    public function import(): ?ImportHandler
    {
        return null;
    }


    public function export(): ?ExportHandler
    {
        return null;
    }

    public function getActiveActions(): array
    {
        return [/*'create', 'view',*/ 'update', 'delete', 'massDelete'];
    }

}
