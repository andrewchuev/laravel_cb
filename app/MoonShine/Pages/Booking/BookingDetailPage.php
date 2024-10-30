<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Booking;

use MoonShine\Decorations\Divider;
use MoonShine\Fields\Email;
use MoonShine\Fields\ID;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\StackFields;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use Throwable;

class BookingDetailPage extends DetailPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            ID::make('ID', 'id'),
            Text::make('Customer name', 'name'),
            Text::make('Company', 'company'),
            Phone::make('Phone', 'phone_number'),
            Email::make('Email', 'email'),
            Text::make('Job reference'),

            Divider::make('sdsdsds'),
            StackFields::make('Pickup Location')->fields([
                BelongsTo::make(
                    'Pickup Location',
                    'pickupDetail',
                    fn($item) => "Contact name: $item->contact_name<br>
                                  Address: $item->address<br>
                                  Phone: $item->contact_phone<br>
                                  Email: $item->contact_email",
                ),
            ]),


            BelongsTo::make(
                'Delivery Location',
                'deliveryDetail',
                fn($item) => "Contact name: $item->contact_name<br>
                                  Address: $item->address<br>
                                  Phone: $item->contact_phone<br>
                                  Email: $item->contact_email",
            ),

            Number::make('Total volume', 'total_volume'),
            Number::make('Total weight','total_weight'),
            Number::make('Total spaces', 'total_spaces'),
            Number::make('Total qty', 'total_qty'),
            Number::make('Final price', 'final_price'),

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
