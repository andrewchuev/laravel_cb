<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Booking;

use App\MoonShine\Resources\PickupDetailResource;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Number;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;
use Throwable;

class BookingIndexPage extends IndexPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [

            ID::make('ID', 'id')->sortable(),
            Text::make('Customer name', 'name')->sortable(),
            BelongsTo::make(
                'Pickup Location',
                'pickupDetail',
                fn($item) => "$item->id. $item->address"
            ),
            BelongsTo::make(
                'Delivery Location',
                'deliveryDetail',
                fn($item) => "$item->id. $item->address"
            ),

            Number::make('Total volume', 'total_volume')->required(),
            Number::make('Total weight','total_weight')->required(),

            //Number::make('booking_status')->required(),
            //Number::make('payment_status')->required(),
            /*Text::make('Company', 'company')->required(),
            Phone::make('Phone', 'phone_number')->required(),
            Email::make('Email', 'email')->required(),
            Text::make('job_reference')->required(),
            Number::make('dangerous_goods')->required(),*/


//            Number::make('pickup_detail_id')->required(),
//            Number::make('delivery_detail_id')->required(),
            Number::make('Total spaces', 'total_spaces')->required(),
            Number::make('Total qty', 'total_qty')->required(),
            Number::make('Final price', 'final_price')->required(),



//            Date::make('created_at')->required(),
//            Date::make('updated_at')->required(),


        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
