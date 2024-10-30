<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\AdditionalService;

use App\Models\Option;
use App\MoonShine\Resources\OptionResource;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\IndexPage;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use Throwable;

class AdditionalServiceIndexPage extends IndexPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        $value = Option::where('key', 'additional_service_type_options')->value('value');
        $typeOptions = json_decode($value, true) ?? [];

        $value = Option::where('key', 'additional_service_using_options')->value('value');
        $usingOptions = json_decode($value, true) ?? [];

        return [
            Text::make('ID', 'id'),
            Text::make('Title', 'title'),
            Select::make('Additional service type', 'type_id')->options(
                $typeOptions
            ),
            Select::make('Additional service using', 'using_id')->options(
                $usingOptions
            ),
            Text::make('Max qty', 'max_qty'),
            Text::make('Price', 'price'),
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
