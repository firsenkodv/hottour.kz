<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Replacement;

use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

/**
 * @extends ModelResource<Replacement>
 */
class ReplacementResource extends ModelResource
{
    protected string $model = Replacement::class;

    protected string $title = 'Replacements';

    public function fields(): array
    {
        return [
            Grid::make([
                Column::make([
                    Block::make([
                        Text::make('Что меняем', 'old_text')
                    ])
                ])->columnSpan(6),
                Column::make([
                    Block::make([
                        Text::make('На что меняем', 'new_text')
                    ])
                ])->columnSpan(6),
            ])
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
