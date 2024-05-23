<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserRole;

use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<UserRole>
 */
class UserRoleResource extends ModelResource
{
    protected string $model = UserRole::class;

    protected string $title = 'UserRoles';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Name ', 'name'),

            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
