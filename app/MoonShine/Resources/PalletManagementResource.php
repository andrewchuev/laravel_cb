<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\PalletManagement;
use App\MoonShine\Pages\PalletManagement\PalletManagementIndexPage;
use App\MoonShine\Pages\PalletManagement\PalletManagementFormPage;
use App\MoonShine\Pages\PalletManagement\PalletManagementDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<PalletManagement>
 */
class PalletManagementResource extends ModelResource
{
    protected string $model = PalletManagement::class;

    protected string $title = 'PalletManagements';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            PalletManagementIndexPage::make($this->title()),
            PalletManagementFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            PalletManagementDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param PalletManagement $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
