<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\MoonShine\Pages\Booking\BookingIndexPage;
use App\MoonShine\Pages\Booking\BookingFormPage;
use App\MoonShine\Pages\Booking\BookingDetailPage;

use MoonShine\Resources\ModelResource;
use MoonShine\Pages\Page;

/**
 * @extends ModelResource<Booking>
 */
class BookingResource extends ModelResource
{
    protected string $model = Booking::class;

    protected string $title = 'Bookings';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            BookingIndexPage::make($this->title()),
            BookingFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            BookingDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param Booking $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
