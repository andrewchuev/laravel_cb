<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\PickupDetail;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Block;
use MoonShine\Enums\PageType;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<PickupDetail>
 */
class PickupDetailResource extends ModelResource
{
    protected string $model = PickupDetail::class;

    protected string $title = 'PickupDetails';

    protected ?PageType $redirectAfterSave = PageType::INDEX;

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('delivery_type'),
                Text::make('delivery_time_type'),
                Text::make('location_id'),
                Text::make('address'),
                Text::make('lng'),
                Text::make('lat'),
                Text::make('date'),
                Text::make('timeslot_from'),
                Text::make('timeslot_to'),
                Text::make('office_time'),
                Text::make('contact_name'),
                Text::make('contact_phone'),
                Text::make('contact_email'),
            ]),
        ];
    }

    /**
     * @param PickupDetail $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
