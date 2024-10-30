<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\AdditionalService;
use App\MoonShine\Pages\AdditionalService\AdditionalServiceDetailPage;
use App\MoonShine\Pages\AdditionalService\AdditionalServiceFormPage;
use App\MoonShine\Pages\AdditionalService\AdditionalServiceIndexPage;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Enums\PageType;
use MoonShine\Pages\Page;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<AdditionalService>
 */
class AdditionalServiceResource extends ModelResource
{
    protected string $model = AdditionalService::class;

    protected string $title = 'AdditionalServices';
    protected ?PageType $redirectAfterSave = PageType::INDEX;

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            AdditionalServiceIndexPage::make($this->title()),
            AdditionalServiceFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            AdditionalServiceDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param AdditionalService $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
