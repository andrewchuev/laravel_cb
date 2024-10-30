<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\MoonShine\Pages\State\StateIndexPage;
use App\MoonShine\Pages\State\StateFormPage;
use App\MoonShine\Pages\State\StateDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<State>
 */
class StateResource extends ModelResource
{
    protected string $model = State::class;

    protected string $title = 'States';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            StateIndexPage::make($this->title()),
            StateFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            StateDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param State $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
