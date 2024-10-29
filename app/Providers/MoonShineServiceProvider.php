<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\AdditionalServiceResource;
use App\MoonShine\Resources\BookingResource;
use App\MoonShine\Resources\ConsignmentResource;
use App\MoonShine\Resources\ConsumableResource;
use App\MoonShine\Resources\DeliveryDetailResource;
use App\MoonShine\Resources\LocationResource;
use App\MoonShine\Resources\PalletManagementResource;
use App\MoonShine\Resources\PickupDetailResource;
use App\MoonShine\Resources\TemperatureModeResource;
use Closure;
use Illuminate\Support\Facades\Vite;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Pages\Page;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{

    /*public function boot(): void
    {
        parent::boot();

        moonShineAssets()->add([
            Vite::asset('resources/js/app.js')
        ]);
    }*/

    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [
            new PickupDetailResource(),
            new DeliveryDetailResource()
        ];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuItem::make('Bookings', new BookingResource()),
            MenuItem::make('Locations', new LocationResource()),
            MenuItem::make('Temperature modes', new TemperatureModeResource()),
            MenuItem::make('Consignments', new ConsignmentResource()),
            MenuItem::make('Consumables', new ConsumableResource()),
            MenuItem::make('Pallet management', new PalletManagementResource()),
            MenuItem::make('Additional services', new AdditionalServiceResource()),
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),

        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
