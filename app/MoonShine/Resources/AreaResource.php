<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use App\MoonShine\Pages\Area\AreaIndexPage;
use App\MoonShine\Pages\Area\AreaFormPage;
use App\MoonShine\Pages\Area\AreaDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<Area>
 */
class AreaResource extends ModelResource
{
    protected string $model = Area::class;

    protected string $title = 'Areas';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            AreaIndexPage::make($this->title()),
            AreaFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            AreaDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Area $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
