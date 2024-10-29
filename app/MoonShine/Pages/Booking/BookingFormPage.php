<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Booking;

use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Email;
use MoonShine\Fields\ID;
use MoonShine\Fields\Number;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use Throwable;

class BookingFormPage extends FormPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Tabs::make([

                Tab::make('Statuses', [
                    Select::make('Booking status', 'booking_status')
                        ->options([
                            '0' => 'Awaiting approval',
                            '1' => 'Approved',
                            '2' => 'Rejected',
                        ]),
                    Select::make('Payment status', 'payment_status')
                        ->options([
                            '0' => 'Pending',
                            '1' => 'Completed',
                            '2' => 'Failed',
                        ]),
                ]),

                Tab::make('Customer', [
                    Text::make('Customer name', 'name')->sortable(),
                    Text::make('Company', 'company')->required(),
                    Phone::make('Phone', 'phone_number')->required(),
                    Email::make('Email', 'email')->required(),
                    Text::make('Job reference')->required(),
                ]),

                Tab::make('Pickup Detail', [
                    BelongsTo::make(
                        'Pickup Location',
                        'pickupDetail',
                        fn($item) => "$item->id. $item->address"
                    ),
                ]),

                Tab::make('Delivery Detail', [
                    BelongsTo::make(
                        'Delivery Location',
                        'deliveryDetail',
                        fn($item) => "$item->id. $item->address"
                    ),
                ]),

                Tab::make('Booking info', [
                    Switcher::make('Dangerous goods')->required(),
                ]),

                Tab::make('Booking additional services', [

                ]),

                Tab::make('Booking pallet management', [

                ]),

                Tab::make('Booking Items', [
                    Number::make('Total spaces', 'total_spaces')->required(),
                    Number::make('Total qty', 'total_qty')->required(),
                    Number::make('Final price', 'final_price')->required(),
                ]),
            ]),
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
