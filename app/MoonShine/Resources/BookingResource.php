<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\Number;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Booking>
 */
class BookingResource extends ModelResource
{
    protected string $model = Booking::class;

    protected string $title = 'Bookings';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('name')->sortable(),
                Number::make('booking_status')->required(),
                Number::make('payment_status')->required(),
                Text::make('company')->required(),
                Phone::make('phone_number')->required(),
                Email::make('email')->required(),
                Text::make('job_reference')->required(),
                Number::make('dangerous_goods')->required(),

                Number::make('pickup_detail_id')->required(),
                Number::make('delivery_detail_id')->required(),
                Number::make('final_price')->required(),
                Number::make('total_qty')->required(),
                Number::make('total_spaces')->required(),
                Number::make('total_volume')->required(),
                Number::make('total_weight')->required(),
                Date::make('created_at')->required(),
                Date::make('updated_at')->required(),

            ]),
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
