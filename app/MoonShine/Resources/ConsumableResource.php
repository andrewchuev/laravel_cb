<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Consumable;
use App\MoonShine\Pages\Consumable\ConsumableIndexPage;
use App\MoonShine\Pages\Consumable\ConsumableFormPage;
use App\MoonShine\Pages\Consumable\ConsumableDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<Consumable>
 */
class ConsumableResource extends ModelResource
{
    protected string $model = Consumable::class;

    protected string $title = 'Consumables';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            ConsumableIndexPage::make($this->title()),
            ConsumableFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ConsumableDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Consumable $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
