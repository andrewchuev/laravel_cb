<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Option;
use App\MoonShine\Pages\Option\OptionIndexPage;
use App\MoonShine\Pages\Option\OptionFormPage;
use App\MoonShine\Pages\Option\OptionDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<Option>
 */
class OptionResource extends ModelResource
{
    protected string $model = Option::class;

    protected string $title = 'Options';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            OptionIndexPage::make($this->title()),
            OptionFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            OptionDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Option $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
