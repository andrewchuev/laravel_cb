<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Location;

use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use Throwable;

class LocationFormPage extends FormPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Text::make('ID','id' ),
            Text::make('Title', 'title'),
            Text::make('Longitude', 'lng'),
            Text::make('Latitude', 'lat'),
            Text::make('Address', 'address'),
            Text::make('City', 'city'),
            Text::make('Postcode', 'postcode'),
            BelongsTo::make(
                'State',
                'state',
                fn($item) => "$item->name"
            ),
            BelongsTo::make(
                'Area',
                'area',
                fn($item) => "$item->name"
            ),
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
