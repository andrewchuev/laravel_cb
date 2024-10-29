<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Consignment;
use App\MoonShine\Pages\Consignment\ConsignmentIndexPage;
use App\MoonShine\Pages\Consignment\ConsignmentFormPage;
use App\MoonShine\Pages\Consignment\ConsignmentDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<Consignment>
 */
class ConsignmentResource extends ModelResource
{
    protected string $model = Consignment::class;

    protected string $title = 'Consignments';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            ConsignmentIndexPage::make($this->title()),
            ConsignmentFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            ConsignmentDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Consignment $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}