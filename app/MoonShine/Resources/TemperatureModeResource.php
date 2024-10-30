<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\TemperatureMode;
use App\MoonShine\Pages\TemperatureMode\TemperatureModeDetailPage;
use App\MoonShine\Pages\TemperatureMode\TemperatureModeFormPage;
use App\MoonShine\Pages\TemperatureMode\TemperatureModeIndexPage;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Enums\PageType;
use MoonShine\Pages\Page;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<TemperatureMode>
 */
class TemperatureModeResource extends ModelResource
{
    protected string $model = TemperatureMode::class;

    protected string $title = 'TemperatureModes';
    protected ?PageType $redirectAfterSave = PageType::INDEX;

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            TemperatureModeIndexPage::make($this->title()),
            TemperatureModeFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            TemperatureModeDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param TemperatureMode $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
